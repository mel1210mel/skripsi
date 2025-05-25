<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockOutController extends Controller
{
    public function index()
    {
        $stockouts = StockOut::with(['item', 'supplier'])->get();
        return view('stockout.index', compact('stockouts'));
    }

    public function create()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('stockout.create', compact('items', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $item = Item::findOrFail($request->item_id);

        if ($request->jumlah > $item->stok) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi.'])->withInput();
        }

        StockOut::create($request->all());

        $item->stok -= $request->jumlah;
        $item->save();

        return redirect()->route('stockout.index')->with('success', 'Data barang keluar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $stockout = StockOut::findOrFail($id);
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('stockout.edit', compact('stockout', 'items', 'suppliers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'jumlah' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
        ]);

        $stockout = StockOut::findOrFail($id);
        $itemLama = Item::find($stockout->item_id);
        $itemBaru = Item::find($request->item_id);

        // Kembalikan stok lama
        $itemLama->stok += $stockout->jumlah;
        $itemLama->save();

        if ($request->jumlah > $itemBaru->stok) {
            return back()->withErrors(['jumlah' => 'Stok tidak mencukupi.'])->withInput();
        }

        $itemBaru->stok -= $request->jumlah;
        $itemBaru->save();

        $stockout->update($request->all());

        return redirect()->route('stockout.index')->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $stockout = StockOut::findOrFail($id);
        $item = Item::find($stockout->item_id);
        $item->stok += $stockout->jumlah;
        $item->save();

        $stockout->delete();

        return redirect()->route('stockout.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\Item;
use App\Models\Supplier;
use Illuminate\Http\Request;

class StockInController extends Controller
{
    public function index()
    {
        $stockIns = StockIn::all();
        return view('stock_in.index', compact('stockIns'));
    }

    public function create()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('stock_in.create', compact('items', 'suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        StockIn::create($request->all());

        $item = Item::findOrFail($request->item_id);
        $item->stok += $request->quantity;
        $item->save();

        return redirect()->route('stock-in.index')->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    public function show($id)
    {
        $stockIn = StockIn::findOrFail($id);
        return view('stock_in.show', compact('stockIn'));
    }

    public function edit($id)
    {
        $stockIn = StockIn::findOrFail($id);
        $items = Item::all();
        return view('stock_in.edit', compact('stockIn', 'items'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|numeric|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        $stockIn = StockIn::findOrFail($id);
        $stockIn->update($request->all());

        return redirect()->route('stock-in.index')->with('success', 'Barang masuk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $stockIn = StockIn::findOrFail($id);
        $item = Item::find($stockIn->item_id);
        $item->stok -= $stockIn->quantity;
        $item->save();

        $stockIn->delete();

        return redirect()->route('stock-in.index')->with('success', 'Barang masuk berhasil dihapus.');
    }
}
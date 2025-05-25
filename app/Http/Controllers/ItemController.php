<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Tampilkan semua barang
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Form tambah barang baru
    public function create()
    {
        return view('items.create');
    }

    // Simpan data barang baru (stok mulai 0)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Item::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'weight' => $request->weight,
            'price' => $request->price,
            'stok' => 0,  // mulai dari stok 0
        ]);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Form edit barang
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Update data barang (tidak mengubah stok)
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string',
            'unit' => 'required|string',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $item->update([
            'name' => $request->name,
            'unit' => $request->unit,
            'weight' => $request->weight,
            'price' => $request->price,
        ]);

        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui.');
    }

    // Hapus barang
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}

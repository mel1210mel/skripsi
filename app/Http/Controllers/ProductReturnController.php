<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReturn;
use App\Models\Item;

class ProductReturnController extends Controller
{
    public function index()
    {
        $returns = ProductReturn::all();
        return view('returns.index', compact('returns'));
    }

    public function create()
    {
    $items = Item::orderBy('name')->get();
    return view('returns.create', compact('items'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'quantity' => 'required|integer',
            'reason' => 'required|string',
            'return_date' => 'required|date',
        ]);

        ProductReturn::create($request->all());

        return redirect()->route('returns.index')->with('success', 'Retur barang berhasil ditambahkan.');
    }

    public function show(ProductReturn $productReturn)
    {
        return view('returns.show', compact('productReturn'));
    }
}

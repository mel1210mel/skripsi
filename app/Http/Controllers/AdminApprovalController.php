<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\StockOut;
use App\Models\Item;
use Illuminate\Http\Request;

class AdminApprovalController extends Controller
{
    public function index()
    {
        $pendingIns = StockIn::where('status', 'pending')->with('item', 'supplierUser')->get();
        $pendingOuts = StockOut::where('status', 'pending')->with('item')->get();

        return view('admin.approvals.index', compact('pendingIns', 'pendingOuts'));
    }

    public function approveStockIn($id)
    {
        $stockIn = StockIn::findOrFail($id);
        $item = $stockIn->item;

        $item->stok += $stockIn->quantity;
        $item->save();

        $stockIn->status = 'approved';
        $stockIn->save();

        return back()->with('success', 'Permintaan barang masuk disetujui.');
    }

    public function approveStockOut($id)
    {
        $stockOut = StockOut::findOrFail($id);
        $item = $stockOut->item;

        if ($item->stok < $stockOut->quantity) {
            return back()->with('error', 'Stok tidak mencukupi untuk disetujui.');
        }

        $item->stok -= $stockOut->quantity;
        $item->save();

        $stockOut->status = 'approved';
        $stockOut->save();

        return back()->with('success', 'Permintaan barang keluar disetujui.');
    }
}

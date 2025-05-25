<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\StockIn;
use App\Models\StockOut;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $month = $request->input('month', null);

        $totalItems = Item::count();
        $totalStockIn = StockIn::whereYear('created_at', $year)
                              ->when($month, function ($query) use ($month) {
                                  $query->whereMonth('created_at', Carbon::parse($month)->month);
                              })
                              ->sum('quantity');

        $totalStockOut = StockOut::whereYear('created_at', $year)
                              ->when($month, function ($query) use ($month) {
                                  $query->whereMonth('created_at', Carbon::parse($month)->month);
                              })
                              ->sum('quantity');

        $revenueMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $revenueData = StockOut::selectRaw('MONTHNAME(created_at) as month, SUM(quantity) as total')
               ->whereYear('created_at', $year)
               ->groupBy('month')
               ->pluck('total');

        $emailMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $emailData = StockIn::selectRaw('MONTHNAME(created_at) as month, SUM(quantity) as total')
               ->whereYear('created_at', $year)
               ->groupBy('month')
               ->pluck('total');


        return view('dashboard', compact('totalItems', 'totalStockIn', 'totalStockOut', 'revenueMonths', 'revenueData', 'emailMonths', 'emailData', 'year', 'month'));

    }
}

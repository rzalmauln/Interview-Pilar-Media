<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('grafik.index');
    }

    public function salesChartData(Request $request)
    {
        $salesData = Sale::selectRaw('YEAR(SalesDate) AS year, MONTH(SalesDate) AS month, SUM(SalesAmount) AS total_sales')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return response()->json($salesData);
    }
}

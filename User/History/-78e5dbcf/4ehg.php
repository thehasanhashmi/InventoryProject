<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataFeed;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Warehouse;


class DashboardController extends Controller
{
    public function index()
    {
        $dataFeed = new DataFeed();
        $warehouses=Warehouse::all()->count();
        $suppliers=Supplier::all()->count();
        $products=Product::all()->count();

        return view('pages/dashboard/dashboard', compact('dataFeed','products','suppliers','warehouses'));
    }

    /**
     * Displays the analytics screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function analytics()
    {
        return view('pages/dashboard/analytics');
    }

    /**
     * Displays the fintech screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function fintech()
    {
        return view('pages/dashboard/fintech');
    }
}

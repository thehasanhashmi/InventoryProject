<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockHistory;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function transferStock(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'from_warehouse_id' => 'required|exists:warehouses,id',
            'to_warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::find($request->product_id);

        // Business logic for stock transfer
        // Reduce stock from 'from_warehouse' and increase in 'to_warehouse'

        // Update stock history
        StockHistory::create([
            'product_id' => $request->product_id,
            'warehouse_id' => $request->from_warehouse_id,
            'quantity' => -$request->quantity,
            'action' => 'transferred',
        ]);

        StockHistory::create([
            'product_id' => $request->product_id,
            'warehouse_id' => $request->to_warehouse_id,
            'quantity' => $request->quantity,
            'action' => 'received',
        ]);

        return response()->json(['message' => 'Stock transferred successfully']);
    }
}

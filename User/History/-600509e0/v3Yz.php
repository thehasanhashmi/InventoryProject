<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
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
        $warehouses = Warehouse::all();

        return response()->json([
            'msg' => 'Warehouses retrieved successfully',
            'status' => 'success',
            'data' => $warehouses
        ], 200); // HTTP 200 for success
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $warehouse = Warehouse::create($validated);

        return response()->json([
            'msg' => 'Warehouse created successfully',
            'status' => 'success',
            'data' => $warehouse
        ], 201); // HTTP 201 for created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return response()->json([
                'msg' => 'Warehouse not found',
                'status' => 'error',
                'data' => null
            ], 404); // HTTP 404 for not found
        }

        return response()->json([
            'msg' => 'Warehouse retrieved successfully',
            'status' => 'success',
            'data' => $warehouse
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return response()->json([
                'msg' => 'Warehouse not found',
                'status' => 'error',
                'data' => null
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $warehouse->update($validated);

        return response()->json([
            'msg' => 'Warehouse updated successfully',
            'status' => 'success',
            'data' => $warehouse
        ], 200); // HTTP 200 for success
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse = Warehouse::find($id);

        if (!$warehouse) {
            return response()->json([
                'msg' => 'Warehouse not found',
                'status' => 'error',
                'data' => null
            ], 404); // HTTP 404 for not found
        }

        $warehouse->delete();

        return response()->json([
            'msg' => 'Warehouse deleted successfully',
            'status' => 'success',
            'data' => null
        ], 204); // HTTP 204 for no content
    }

    /**
     * Transfer stock between warehouses.
     */
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

        return response()->json([
            'msg' => 'Stock transferred successfully',
            'status' => 'success',
            'data' => null
        ], 200); // HTTP 200 for success
    }
    public function addWarehouse()
    {
        $token = auth()->user()->createToken('API Token')->plainTextToken; // If using Passport or Sanctum

        return view('inventory.warehouse.addWarehouse', compact('token'));
    }
    public function editWarehouse($id)
    {
        $warehouse=Warehouse::findOrFail($id);
        return view('inventory.warehouse.editWarehouse',compact('warehouse'));
    }


    public function listWarehouse()
    {
        return view('inventory.warehouse.listWarehouse');
    }
}

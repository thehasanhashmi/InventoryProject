<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return response()->json([
            'msg' => 'Suppliers retrieved successfully',
            'status' => 'success',
            'data' => $suppliers
        ], 200); // HTTP 200 for success
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
        ]);

        $supplier = Supplier::create($validated);

        return response()->json([
            'msg' => 'Supplier created successfully',
            'status' => 'success',
            'data' => $supplier
        ], 201); // HTTP 201 for created
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'msg' => 'Supplier not found',
                'status' => 'error',
                'data' => null
            ], 404); // HTTP 404 for not found
        }

        return response()->json([
            'msg' => 'Supplier retrieved successfully',
            'status' => 'success',
            'data' => $supplier
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'msg' => 'Supplier not found',
                'status' => 'error',
                'data' => null
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'contact_info' => 'required|string|max:255',
        ]);

        $supplier->update($validated);

        return response()->json([
            'msg' => 'Supplier updated successfully',
            'status' => 'success',
            'data' => $supplier
        ], 200); // HTTP 200 for success
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'msg' => 'Supplier not found',
                'status' => 'error',
                'data' => null
            ], 404); // HTTP 404 for not found
        }

        $supplier->delete();

        return response()->json([
            'msg' => 'Supplier deleted successfully',
            'status' => 'success',
            'data' => null
        ], 204); // HTTP 204 for no content
    }

    public function addSupplier()
    {
        $token = auth()->user()->createToken('API Token')->plainTextToken; // If using Passport or Sanctum
        // die();

        return view('inventory.supplier.addSupplier',compact('token'));
    }

    public function editSupplier($id)
    {
        $supplier=Supplier::findOrFail($id);
        $token = auth()->user()->createToken('API Token')->plainTextToken;
        return view('inventory.supplier.editSupplier',compact('supplier','token'));
    }

    public function listSupplier()
    {
        return view('inventory.supplier.listSupplier');
    }
}

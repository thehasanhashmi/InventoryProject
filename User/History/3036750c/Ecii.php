<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Facades\Gate;
use App\Notifications\LowStockNotification;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('supplier')->get();

        return response()->json([
            'msg' => 'Products retrieved successfully',
            'status' => 'success',
            'data' => $products
        ], 200); // HTTP 200 for success
    }

    public function store(Request $request)
    {
        if (Gate::denies('manage-inventory')) {
            return response()->json([
                'msg' => 'Unauthorized access',
                'status' => 'error',
                'data' => null
            ], 403); // HTTP 403 for forbidden
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products',
            'quantity_in_stock' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'msg' => 'Product created successfully',
            'status' => 'success',
            'data' => $product
        ], 201); // HTTP 201 for created
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'quantity_in_stock' => 'required|integer',
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        $product->update($request->all());

        return response()->json([
            'msg' => 'Product updated successfully',
            'status' => 'success',
            'data' => $product
        ], 200); // HTTP 200 for success
    }

    public function show(string $id)
    {
        $product = Product::with('supplier')->find($id);

        if (!$product) {
            return response()->json([
                'msg' => 'product not found',
                'status' => 'error',
                'data' => null
            ], 404); // HTTP 404 for not found
        }

        return response()->json([
            'msg' => 'product retrieved successfully',
            'status' => 'success',
            'data' => $product
        ], 200);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'msg' => 'Product deleted successfully',
            'status' => 'success',
            'data' => null
        ], 204); // HTTP 204 for no content
    }

    public function updateStock(Request $request, Product $product)
    {
        $product->quantity_in_stock = $request->quantity_in_stock;
        $product->save();

        if ($product->quantity_in_stock < 10) {
            // Notify users if stock is low (Implement notification logic)
        }

        return response()->json([
            'msg' => 'Stock updated successfully',
            'status' => 'success',
            'data' => $product
        ], 200); // HTTP 200 for success
    }
    public function addProduct()
    {
        $suppliers = Supplier::all();
        return view('inventory.product.addProduct', compact('suppliers'));
    }
    public function editProduct($id)
    {
        return view('inventory.product.editProduct');
    }
    public function listProduct()
    {
        return view('inventory.product.listProduct');
    }
    public function transferStock()
    {
        $suppliers = Supplier::all();
        return view('inventory.product.transferStock',compact('suppliers'));
    }
}

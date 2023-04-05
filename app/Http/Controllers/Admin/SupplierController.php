<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.stocktaking.suppliers.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
    public function show(Supplier $supplier)
    {
        $products = Product::where('supplier_id', $supplier->id)->orderBy('name', 'asc')->get();
        foreach ($products as $product) {
            if ($product->quantity == 0) {
                $product->claseFila = 'table-danger';
            } elseif ($product->quantity >= 1 && $product->quantity <= 10) {
                $product->claseFila = 'table-warning';
            } else {
                $product->claseFila = 'table-success';
            }
        }
        return view('admin.stocktaking.suppliers.show', compact('supplier', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Buy;
use App\Models\Buydetail;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.stocktaking.buys.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Supplier $supplier)
    {
        /* return view('admin.stocktaking.buys.create', compact('supplier')); */
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'invoice' => 'required',
            'date' => 'required|date|before_or_equal:' . now()->format('Y-m-d'),
            'cost.*' => 'required|numeric|min:1',
            'quantity.*' => 'required|numeric|min:1',
        ]);
        
        $buy = Buy::create([
            'invoice' => $request->invoice,
            'total' => $request->total,
            'date' => $request->date,
            'supplier_id' => $request->supplier_id,
            'user_id' => auth()->id(),
        ]);

        $product_ids = $request->input('product_id');
        $costs = $request->input('cost');
        $quantitys = $request->input('quantity');

        for ($i = 0; $i < count($product_ids); $i++) {
            Buydetail::create([
                'buy_id' => $buy->id,
                'product_id' => $product_ids[$i],
                'quantity' => $quantitys[$i],
                'cost' => $costs[$i],
            ]);

            $cantidadActual = Product::where('id', $product_ids[$i])->value('quantity');
            $cantidadNueva = $cantidadActual + $quantitys[$i];

            $product = Product::findOrFail($product_ids[$i]);
            $product->quantity = $cantidadNueva;
            $product->cost = $costs[$i];
            $product->save();
        }

        session()->forget('cart');

        return view('admin.stocktaking.buys.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function add_buy(Product $product)
    {
        if ($product->image) {
            $image = $product->image->url;
        } else {
            $image = 'No_image';
        }
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "cod" => $product->cod,
                "name" => $product->name,
                "quantity" => 1,
                "cost" => $product->cost,
                "image" => $image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'El producto se ha agregado a la compra, puede seguir agregando más productos o guardar la compra.');
    }

    public function cart(Supplier $supplier)
    {
        return view('admin.stocktaking.buys.cart', compact('supplier'));
    }

    public function update_quantity(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'La cantidad se ha actualizado');
        }
    }

    public function update_cost(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["cost"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'El costo se ha actualizado');
        }
    }

    public function remove_from_cart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Producto eliminado satisfactoriamente');
        }
    }
}

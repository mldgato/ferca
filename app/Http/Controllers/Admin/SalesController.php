<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        return view('admin.shop.sales.index');
    }

    public function add_sale(Product $product)
    {
        if ($product->image) {
            $image = $product->image->url;
        } else {
            $image = 'No_image';
        }
        $cart = session()->get('cart_sale', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "cod" => $product->cod,
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $image
            ];
        }

        session()->put('cart_sale', $cart);
        return redirect()->back()->with('success', 'El producto se ha agregado a la compra, puede seguir agregando más productos o guardar la compra.');
    }

    public function create()
    {
        return view('admin.shop.sales.create');
    }

    public function update_quantity(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart_sale');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart_sale', $cart);
            session()->flash('success', 'La cantidad se ha actualizado');
        }
    }

    public function remove_from_cart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart_sale');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart_sale', $cart);
            }
            session()->flash('success', 'Producto eliminado satisfactoriamente');
        }
    }
}
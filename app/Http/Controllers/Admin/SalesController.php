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
            if ($cart[$product->id]['quantity'] < $product->quantity) {
                $cart[$product->id]['quantity']++;
            } else {
                return redirect()->back()->with(['message' => 'La cantidad excede los productos en bodega', 'title' => '¡Advertencia!', 'class' => 'alert-danger']);
            }
        } else {
            $cart[$product->id] = [
                "cod" => $product->cod,
                "name" => $product->name,
                "quantity" => 1,
                "nowquantity" => $product->quantity,
                "price" => $product->price,
                "image" => $image
            ];
        }

        session()->put('cart_sale', $cart);
        return redirect()->back()->with(['message' => 'El producto se ha agregado a la compra, puede seguir agregando más productos o guardar la compra.', 'title' => '¡Producto agregado!', 'class' => 'alert-warning']);
    }

    public function create()
    {
        return view('admin.shop.sales.create');
    }

    public function update_quantity(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        $cart = session()->get('cart_sale');
        if ($request->id && $request->quantity) {
            if ($request->quantity <= $product->quantity) {
                $cart[$request->id]["quantity"] = $request->quantity;
                session()->put('cart_sale', $cart);
                session()->flash('message', 'La cantidad se ha actualizado');
                session()->flash('title', '¡Producto actualizado!');
                session()->flash('class', 'alert-success');
            } else {
                $cart[$request->id]["quantity"] = $product->quantity;
                session()->put('cart_sale', $cart);
                session()->flash('message', 'La cantidad excede los productos en bodega');
                session()->flash('title', '¡Advertencia!');
                session()->flash('class', 'alert-danger');
            }
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
            session()->flash('message', 'Producto eliminado de la venta satisfactoriamente');
            session()->flash('title', '¡Producto eliminado!');
            session()->flash('class', 'alert-success');
        }
    }
    public function cancel_sale()
    {
        session()->forget('cart_sale');
        session()->flash('deletesale', 'La venta se ha eliminado exitosamente');
    }
}

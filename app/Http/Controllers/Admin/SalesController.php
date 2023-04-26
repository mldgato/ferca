<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Saledetail;
use App\Models\Customer;
use Dompdf\Dompdf;

class SalesController extends Controller
{
    public function index()
    {
        return view('admin.shop.sales.index');
    }

    public function products()
    {
        return view('admin.shop.sales.products');
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
        session()->forget('customer_id');
        session()->forget('customer_nit');
        session()->forget('customer_name');
        session()->forget('customer_address');
        session()->forget('customer_email');
        session()->forget('customer_phone');
        session()->forget('cart_sale');
        session()->flash('deletesale', 'La venta se ha eliminado exitosamente');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nit' => 'numeric',
            'total' => 'required|numeric',
            'pay' => 'required|numeric',
            'price.*' => 'required|numeric|min:1',
            'quantity.*' => 'required|numeric|min:1',
        ]);


        $customer = Customer::find($request->customer_id);
        if ($customer === null) {
            $newCustomer = new Customer();
            $newCustomer->name = $request->name;
            $newCustomer->email = $request->email;
            $newCustomer->nit = $request->nit;
            $newCustomer->address = $request->address;
            $newCustomer->phone = $request->phone;
            $newCustomer->save();

            $sale = Sale::create([
                'invoice' => $request->invoice,
                'total' => $request->total,
                'pay' => $request->pay,
                'date' => date('Y-m-d'),
                'customer_id' => $newCustomer->id,
                'user_id' => auth()->id()
            ]);
        } else {
            $sale = Sale::create([
                'invoice' => $request->invoice,
                'total' => $request->total,
                'pay' => $request->pay,
                'date' => date('Y-m-d'),
                'customer_id' => $request->customer_id,
                'user_id' => auth()->id()
            ]);
        }



        $product_ids = $request->input('product_id');
        $prices = $request->input('price');
        $quantitys = $request->input('quantity');

        for ($i = 0; $i < count($product_ids); $i++) {
            Saledetail::create([
                'sale_id' => $sale->id,
                'product_id' => $product_ids[$i],
                'quantity' => $quantitys[$i],
                'price' => $prices[$i],
            ]);

            $cantidadActual = Product::where('id', $product_ids[$i])->value('quantity');
            $cantidadNueva = $cantidadActual - $quantitys[$i];

            $product = Product::findOrFail($product_ids[$i]);
            $product->quantity = $cantidadNueva;
            $product->save();
        }

        session()->forget('cart_sale');
        session()->forget('customer_id');
        session()->forget('customer_nit');
        session()->forget('customer_name');
        session()->forget('customer_address');
        session()->forget('customer_email');
        session()->forget('customer_phone');
        $sale = Sale::find($sale->id);
        return redirect()->route('admin.shop.sales.show', compact('sale'));
    }

    public function show(Sale $sale)
    {
        return view('admin.shop.sales.show', compact('sale'));
    }

    public function pdf($id)
    {
        $sale = Sale::with('saledetails.product')->find($id);

        $pdf = new Dompdf();
        $pdf->loadView('sales.pdf', compact('sale'));
        return $pdf->stream();
    }
}

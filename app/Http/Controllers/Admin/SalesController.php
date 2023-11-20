<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
            'nit' => ['required', function ($attribute, $value, $fail) {
                if ($value !== 'CF' && !is_numeric($value)) {
                    $fail($attribute . ' must be numeric or "CF".');
                }
            }],
            'pay' => ['required', 'numeric', function ($attribute, $value, $fail) use ($request) {
                if ($value < $request->total) {
                    $fail($attribute . ' must be at least equal to the total.');
                }
            }],
            'price.*' => 'required|numeric|min:1',
            'quantity.*' => 'required|numeric|min:1',
        ]);

        $isNewCustomer = $request->nit === 'CF';

        $customer = null;
        if (!$isNewCustomer) {
            $customer = Customer::find($request->customer_id);
            if ($customer === null) {
                $isNewCustomer = true;
            }
        }

        if ($isNewCustomer) {
            $newCustomerData = [
                'name' => $request->name,
                'email' => $request->email,
                'nit' => $request->nit,
                'address' => $request->address,
                'phone' => $request->phone,
            ];
            $customer = Customer::create($newCustomerData);
        }

        $saleData = [
            'pay' => $request->pay,
            'date' => now(),
            'customer_id' => $customer->id,
            'user_id' => auth()->id(),
        ];
        $sale = Sale::create($saleData);

        foreach ($request->input('product_id') as $index => $productId) {
            $saledetailData = [
                'sale_id' => $sale->id,
                'product_id' => $productId,
                'quantity' => $request->input("quantity.{$index}"),
                'price' => $request->input("price.{$index}"),
            ];
            Saledetail::create($saledetailData);

            $product = Product::findOrFail($productId);
            $product->quantity -= $saledetailData['quantity'];
            $product->save();
        }

        session()->forget([
            'cart_sale',
            'customer_id',
            'customer_nit',
            'customer_name',
            'customer_address',
            'customer_email',
            'customer_phone',
        ]);

        return redirect()->route('admin.shop.sales.show', compact('sale'));
    }


    public function show(Sale $sale)
    {
        // Obtener los detalles de venta asociados a la venta
        $saleDetails = $sale->saledetails;

        // Calcular el total de la venta
        $total = 0;
        foreach ($saleDetails as $detail) {
            $total += $detail->quantity * $detail->price;
        }

        return view('admin.shop.sales.show', compact('sale', 'total'));
    }

    public function list()
    {
        return view('admin.shop.sales.list');
    }

    public function pdf(Sale $sale, Request $request)
    {
        $pdf = new Dompdf();
        $html = view('admin.shop.sales.pdf', compact('sale'))->render();

        $pdf->loadHtml($html);
        $pdf->setPaper('letter', 'portrait');
        $pdf->render();

        if ($request->has('download')) {
            return $pdf->stream('sale-' . $sale->id . '.pdf');
        }

        // Cambiar el Content-Type para indicar que estamos enviando un PDF
        $response = new Response($pdf->output());
        $response->header('Content-Type', 'application/pdf');

        // Abrir el PDF en una nueva pestaña del navegador
        return $response;
    }
}

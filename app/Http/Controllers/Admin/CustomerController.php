<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.shop.customers.index');
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
    public function show(Customer $customer)
    {
        $sales = DB::table('sales')
            ->join('customers', 'customers.id', '=', 'sales.customer_id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->leftJoin('saledetails', 'sales.id', '=', 'saledetails.sale_id')
            ->select('sales.id', 'sales.pay', 'customers.nit', 'users.name', DB::raw("DATE_FORMAT(sales.date, '%d-%m-%Y') as date"), DB::raw('SUM(saledetails.quantity * saledetails.price) as total'))
            ->where('sales.user_id', auth()->user()->id) // Filtrar por el ID del usuario autenticado
            ->where(function ($query) use ($customer) {
                $query->where('sales.customer_id', $customer->id);
            })
            ->groupBy('sales.id', 'sales.pay', 'customers.nit', 'users.name', 'sales.date')
            ->orderBy('sales.id', 'desc')
            ->get();

        return view('admin.shop.customers.show', compact('customer', 'sales'));
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

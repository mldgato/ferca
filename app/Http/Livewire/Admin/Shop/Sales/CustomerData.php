<?php

namespace App\Http\Livewire\Admin\Shop\Sales;

use Livewire\Component;
use App\Models\Customer;

class CustomerData extends Component
{
    public $customer_id;
    public $nit;
    public $name;
    public $address;
    public $email;
    public $phone;
    public $totalMoney;
    public $total;
    public $pay;
    public $changeMoney;
    public $change;
    public $clienteEncontrado = false;

    public function buscarCliente()
    {
        if ($this->nit !== 'CF') {
            $cliente = Customer::where('nit', $this->nit)->first();

            if ($cliente) {
                $this->customer_id = $cliente->id;
                $this->nit = $cliente->nit;
                $this->name = $cliente->name;
                $this->address = $cliente->address;
                $this->email = $cliente->email;
                $this->phone = $cliente->phone;

                session()->put('customer_id', $this->customer_id);
                session()->put('customer_nit', $this->nit);
                session()->put('customer_name', $this->name);
                session()->put('customer_address', $this->address);
                session()->put('customer_email', $this->email);
                session()->put('customer_phone', $this->phone);
                $this->clienteEncontrado = true;
            } else {
                // Restablecer el modo de solo lectura si no se encontró un cliente
                $this->clienteEncontrado = false;
            }
        }
    }


    protected $queryString = [
        'nit' => ['except' => '']
    ];

    public function mount()
    {
        $this->customer_id = session()->get('customer_id', '');
        $this->nit = session()->get('customer_nit', '');
        $this->name = session()->get('customer_name', '');
        $this->address = session()->get('customer_address', '');
        $this->email = session()->get('customer_email', '');
        $this->phone = session()->get('customer_phone', '');
        $total = 0;
        foreach (session('cart_sale') as $id => $details) {
            $total += floatval($details['price']) * $details['quantity'];
        }
        $this->totalMoney = number_format($total, 2, '.', ',');
        $this->total = $total;
    }

    public function render()
    {
        return view('livewire.admin.shop.sales.customer-data');
    }
}

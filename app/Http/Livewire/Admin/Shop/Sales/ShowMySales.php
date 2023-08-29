<?php

namespace App\Http\Livewire\Admin\Shop\Sales;

use App\Models\Sale;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowMySales extends Component
{
    use WithPagination;
    public $sale_id, $pay, $date, $customer_id, $user_id;
    public $search;
    public $sort = 'date';
    public $direction = 'desc';
    public $cant = '10';
    public $readyToLoad = false;
    public $prueba = "";

    protected $paginationTheme = "bootstrap";
    protected $queryString = [
        'cant' => ['except' => '10']
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingCant()
    {
        $this->resetPage();
    }
    public function updatingSort()
    {
        $this->resetPage();
    }
    public function updatingDirection()
    {
        $this->resetPage();
    }


    public function render()
    {
        if ($this->readyToLoad) {
            if ($this->readyToLoad) {
                $sales = DB::table('sales')
                    ->join('customers', 'customers.id', '=', 'sales.customer_id')
                    ->join('users', 'users.id', '=', 'sales.user_id')
                    ->leftJoin('saledetails', 'sales.id', '=', 'saledetails.sale_id')
                    ->select('sales.id', 'sales.pay', 'customers.nit', 'users.name', DB::raw("DATE_FORMAT(sales.date, '%d-%m-%Y') as date"), DB::raw('SUM(saledetails.quantity * saledetails.price) as total'))
                    ->where('sales.user_id', auth()->user()->id)
                    ->where('sales.id', 'LIKE', '%' . $this->search . '%')
                    ->where('sales.pay', 'LIKE', '%' . $this->search . '%')
                    ->where('customers.nit', 'LIKE', '%' . $this->search . '%')
                    ->where('users.name', 'LIKE', '%' . $this->search . '%')
                    ->groupBy('sales.id', 'sales.pay', 'customers.nit', 'users.name', 'buys.date')
                    ->orderBy($this->sort, $this->direction)
                    ->paginate($this->cant);
            } else {
                $sales = [];
            }
        } else {
            $sales = [];
        }
        return view('livewire.admin.shop.sales.show-my-sales', compact('sales'));
    }

    public function loadSales()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}

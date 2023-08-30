<?php

namespace App\Http\Livewire\Admin\Shop\Sales;

use Livewire\Component;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;

class SalesList extends Component
{
    public $startDate;
    public $endDate;
    public $sales;

    public function generateReport()
    {
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

        $this->sales = DB::table('sales')
            ->join('customers', 'customers.id', '=', 'sales.customer_id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->leftJoin('saledetails', 'sales.id', '=', 'saledetails.sale_id')
            ->select('sales.id', 'sales.pay', 'customers.nit', 'users.name', DB::raw("DATE_FORMAT(sales.date, '%d-%m-%Y') as date"), DB::raw('SUM(saledetails.quantity * saledetails.price) as total'))
            ->whereBetween('sales.date', [$this->startDate, $this->endDate]) // Filtrar por rango de fechas
            ->groupBy('sales.id', 'sales.pay', 'customers.nit', 'users.name', 'sales.date')
            ->orderBy('sales.date', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.shop.sales.sales-list');
    }
}

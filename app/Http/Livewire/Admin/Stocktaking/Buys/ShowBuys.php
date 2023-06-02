<?php

namespace App\Http\Livewire\Admin\Stocktaking\Buys;

use App\Models\Buy;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ShowBuys extends Component
{
    use WithPagination;
    public $invoice, $total, $date, $supplier_id, $supplier_name;
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
            $buys = DB::table('buys')
                ->join('suppliers', 'suppliers.id', '=', 'buys.supplier_id')
                ->leftJoin('buydetails', 'buys.id', '=', 'buydetails.buy_id')
                ->select('buys.id', 'suppliers.company', 'buys.invoice', DB::raw("DATE_FORMAT(buys.date, '%d-%m-%Y') as date"), DB::raw('SUM(buydetails.quantity * buydetails.cost) as total'))
                ->where('suppliers.company', 'LIKE', '%' . $this->search . '%')
                ->orWhere('buys.invoice', 'LIKE', '%' . $this->search . '%')
                ->orWhere('buys.date', 'LIKE', '%' . $this->search . '%')
                ->groupBy('buys.id', 'suppliers.company', 'buys.invoice', 'buys.date')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $buys = [];
        }
        return view('livewire.admin.stocktaking.buys.show-buys', compact('buys'));
    }

    public function loadBuys()
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

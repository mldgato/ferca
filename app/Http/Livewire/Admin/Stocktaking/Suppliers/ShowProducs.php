<?php

namespace App\Http\Livewire\Admin\Stocktaking\Suppliers;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ShowProducs extends Component
{
    use WithPagination;
    public $supplier;
    public $search;
    public $sort = 'name';
    public $direction = 'asc';
    public $cant = '10';
    public $readyToLoad = false;

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
        $supplier = $this->supplier;
        if ($this->readyToLoad) {
            $search = $this->search;
            $products = Product::where(function ($query) use ($search) {
                $query->where('cod', 'LIKE', '%' . $search . '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('brand', 'LIKE', '%' . $search . '%');
            })->where('status', '=', '1')
                ->where('supplier_id', '=', $supplier->id)
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);

            foreach ($products as $product) {
                if ($product->quantity == 0) {
                    $product->claseFila = 'table-danger';
                } elseif ($product->quantity >= 1 && $product->quantity <= 10) {
                    $product->claseFila = 'table-warning';
                } else {
                    $product->claseFila = 'table-success';
                }
            }
        } else {
            $products = [];
        }
        return view('livewire.admin.stocktaking.suppliers.show-producs', compact('supplier', 'products'));
    }

    public function loadProducts()
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

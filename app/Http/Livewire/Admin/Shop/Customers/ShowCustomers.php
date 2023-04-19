<?php

namespace App\Http\Livewire\Admin\Shop\Customers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Customer;

class ShowCustomers extends Component
{

    use WithPagination;
    public $name, $email, $nit, $address, $phone;
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
        if ($this->readyToLoad) {
            $customers = Customer::where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('nit', 'LIKE', '%' . $this->search . '%')
                ->orWhere('phone', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $customers = [];
        }
        return view('livewire.admin.shop.customers.show-customers', compact('customers'));
    }

    public function loadCustomers()
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

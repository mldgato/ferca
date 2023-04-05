<?php

namespace App\Http\Livewire\Admin\Stocktaking\Suppliers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;

class ShowSuppliers extends Component
{
    use WithPagination;
    public $taxnumber, $company, $address, $phone, $seller, $supplier_id;
    public $search;
    public $sort = 'company';
    public $direction = 'asc';
    public $cant = '10';
    public $readyToLoad = false;

    protected $paginationTheme = "bootstrap";
    protected $queryString = [
        'cant' => ['except' => '10']
    ];
    protected $listeners = ['render', 'delete'];
    
    //Con Unique quitar esta regla
    protected array $rules = [];
    //Con Unique quitar esta regla
    public function mount()
    {
        $this->rules = $this->rules();
    }
    //Con Unique quitar esta regla
    public function rules()
    {
        return [
            'taxnumber' => 'required|unique:suppliers,taxnumber,' . $this->supplier_id,
            'company' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'seller' => 'required'
        ];
    }
    /*  protected $rules = [
        'taxnumber' => 'required|unique:suppliers,taxnumber'.$this->supplier_id,
        'company' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'seller' => 'required'
    ]; */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
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
            $suppliers = Supplier::where('taxnumber', 'LIKE', '%' . $this->search . '%')
                ->orWhere('company', 'LIKE', '%' . $this->search . '%')
                ->orWhere('seller', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $suppliers = [];
        }
        return view('livewire.admin.stocktaking.suppliers.show-suppliers', compact('suppliers'));
    }
    public function loadSuppliers()
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
    public function resetFields()
    {
        $this->reset([
            'taxnumber',
            'company',
            'address',
            'phone',
            'seller'
        ]);
    }
    public function edit($id)
    {
        $supplier = Supplier::where('id', $id)->first();
        $this->supplier_id = $id;
        $this->taxnumber = $supplier->taxnumber;
        $this->company = $supplier->company;
        $this->address = $supplier->address;
        $this->phone = $supplier->phone;
        $this->seller = $supplier->seller;
    }
    public function update()
    {
        $this->validate();
        if ($this->supplier_id) {
            $supplier = Supplier::find($this->supplier_id);
            $supplier->update([
                'taxnumber' => $this->taxnumber,
                'company' => $this->company,
                'address' => $this->address,
                'phone' => $this->phone,
                'seller' => $this->seller,
            ]);
            $this->resetFields();
            $this->emit('closeModalMessaje', 'Información actualizada', 'Proveedor actualizado exitosamente.', 'success', 'UpdateNewSupplier');
        }
    }
} 
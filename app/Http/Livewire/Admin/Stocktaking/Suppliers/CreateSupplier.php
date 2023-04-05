<?php

namespace App\Http\Livewire\Admin\Stocktaking\Suppliers;

use Livewire\Component;
use App\Models\Supplier;

class CreateSupplier extends Component
{
    public $taxnumber, $company, $address, $phone, $seller;
    protected $rules = [
        'taxnumber' => 'required|unique:suppliers',
        'company' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'seller' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        Supplier::create(
            [
                'taxnumber' => $this->taxnumber,
                'company' => $this->company,
                'address' => $this->address,
                'phone' => $this->phone,
                'seller' => $this->seller
            ]
        );
        $this->resetFields();
        $this->emitTo('admin.stocktaking.suppliers.show-suppliers', 'render');
        $this->emit('closeModalMessaje', 'Información guardada', 'Proveedor creado exitosamente.', 'success', 'CreateNewSupplier');
    }

    public function render()
    {
        return view('livewire.admin.stocktaking.suppliers.create-supplier');
    }

    public function resetFields()
    {
        $this->reset([
            'taxnumber',
            'company',
            'address',
            'phone',
            'seller',
        ]);
    }
}
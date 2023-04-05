<?php

namespace App\Http\Livewire\Admin\Stocktaking\Warehouses;

use Livewire\Component;
use App\Models\Warehouse;

class CreateWarehouse extends Component
{
    public $name, $address;
    protected $rules = [
        'name' => 'required|unique:warehouses',
        'address' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        Warehouse::create(
            [
                'name' => $this->name,
                'address' => $this->address,
            ]
        );
        $this->resetFields();
        $this->emitTo('admin.stocktaking.warehouses.show-warehouses', 'render');
        $this->emit('closeModalMessaje', 'Información guardada', 'Bodega creada exitosamente.', 'success', 'CreateNewWarehouse');
    }

    public function render()
    {
        return view('livewire.admin.stocktaking.warehouses.create-warehouse');
    }

    public function resetFields()
    {
        $this->reset([
            'name',
            'address',
        ]);
    }
}

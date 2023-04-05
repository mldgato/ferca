<?php

namespace App\Http\Livewire\Admin\Stocktaking\Racks;

use Livewire\Component;
use App\Models\Rack;
use App\Models\Warehouse;

class CreateRacks extends Component
{
    public $name, $warehouse_id;
    protected $rules = [
        'name' => 'required',
        'warehouse_id' => 'required'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        Rack::create(
            [
                'name' => $this->name,
                'warehouse_id' => $this->warehouse_id
            ]
        );
        $this->resetFields();
        $this->emitTo('admin.stocktaking.racks.show-racks', 'render');
        $this->emit('closeModalMessaje', 'Información guardada', 'Estante creado exitosamente.', 'success', 'CreateNewRack');
    }

    public function render()
    {
        $warehouses = Warehouse::orderBy('name', 'asc')->get();
        return view('livewire.admin.stocktaking.racks.create-racks', compact('warehouses'));
    }

    public function resetFields()
    {
        $this->reset([
            'name',
            'warehouse_id'
        ]);
    }
}

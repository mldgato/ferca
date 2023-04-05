<?php

namespace App\Http\Livewire\Admin\Stocktaking\Racks;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Rack;
use App\Models\Warehouse;

class ShowRacks extends Component
{

    use WithPagination;
    public $name, $warehouse_id, $rack_id;
    public $search;
    public $sort = 'estante';
    public $direction = 'asc';
    public $cant = '10';
    public $readyToLoad = false;


    protected $paginationTheme = "bootstrap";
    protected $queryString = [
        'cant' => ['except' => '10']
    ];
    protected $listeners = ['render', 'delete'];

    protected $rules = [
        'name' => 'required',
        'warehouse_id' => 'required|numeric',
    ];

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
            $racks = Rack::join('warehouses', 'racks.warehouse_id', 'warehouses.id')
                ->select('racks.id', 'racks.name as estante', 'warehouses.name as bodega')
                ->where('racks.name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('warehouses.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $racks = [];
        }
        $warehouses = Warehouse::orderBy('name', 'asc')->get();
        return view('livewire.admin.stocktaking.racks.show-racks', compact('racks', 'warehouses'));
    }

    public function loadRacks()
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
            'name',
            'warehouse_id',
        ]);
    }

    public function edit($id)
    {
        $rack = Rack::where('id', $id)->first();
        $this->rack_id = $id;
        $this->name = $rack->name;
        $this->warehouse_id = $rack->warehouse_id;
    }

    public function update()
    {
        $this->validate();
        if ($this->rack_id) {
            $rack = Rack::find($this->rack_id);
            $rack->update([
                'name' => $this->name,
                'warehouse_id' => $this->warehouse_id,
            ]);
            $this->resetFields();
            $this->emit('closeModalMessaje', 'Información actualizada', 'Estantería actualizada exitosamente.', 'success', 'UpdateNewRack');
        }
    }
}

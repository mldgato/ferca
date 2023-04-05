<?php

namespace App\Http\Livewire\Admin\Stocktaking\Warehouses;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Warehouse;

class ShowWarehouses extends Component
{
    use WithPagination;
    public $name, $address, $warehouse_id;
    public $search;
    public $sort = 'name';
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
            'name' => 'required|unique:warehouses,name,' . $this->warehouse_id,
            'address' => 'required',
        ];
    }
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
            $warehouses = Warehouse::where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('address', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $warehouses = [];
        }
        return view('livewire.admin.stocktaking.warehouses.show-warehouses', compact('warehouses'));
    }

    public function loadWarehouses()
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
            'address',
        ]);
    }

    public function edit($id)
    {
        $warehouse = Warehouse::where('id', $id)->first();
        $this->warehouse_id = $id;
        $this->name = $warehouse->name;
        $this->address = $warehouse->address;
    }

    public function update()
    {
        $this->validate();
        if ($this->warehouse_id) {
            $warehouse = Warehouse::find($this->warehouse_id);
            $warehouse->update([
                'name' => $this->name,
                'address' => $this->address,
            ]);
            $this->resetFields();
            $this->emit('closeModalMessaje', 'Información actualizada', 'Bodega actualizada exitosamente.', 'success', 'UpdateNewWarehouse');
        }
    }
}

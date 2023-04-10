<?php

namespace App\Http\Livewire\Admin\Stocktaking\Suppliers;

use Livewire\Component;
use App\Models\Supplier;
use App\Models\Measure;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Rack;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    public $supplier;
    public $cod, $name, $brand, $cost, $price, $supplier_id, $measure_id, $warehouse_id, $rack_id, $image, $identificador, $muestra;
    public $status = '0';
    public $quantity = 0;
    public function mount()
    {
        $this->identificador = rand();
        $this->muestra = 'https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg';
    }

    protected $rules = [
        'cod' => 'required|unique:products',
        'name' => 'required',
        'brand' => 'required',
        'quantity' => 'required|numeric|min:0',
        'cost' => 'required|numeric|min:1',
        'price' => 'required|numeric|min:1',
        'measure_id' => 'required|numeric',
        'warehouse_id' => 'required|numeric',
        'rack_id' => 'required|numeric',
        'image' => 'image|max:2048'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();

        $product = Product::create(
            [
                'cod' => $this->cod,
                'name' => $this->name,
                'brand' => $this->brand,
                'quantity' => $this->quantity,
                'cost' => $this->cost,
                'price' => $this->price,
                'status' => $this->status,
                'supplier_id' => $this->supplier,
                'measure_id' => $this->measure_id,
                'warehouse_id' => $this->warehouse_id,
                'rack_id' => $this->rack_id,
            ]
        );

        if ($this->image) {
            $url = Storage::put('products', $this->image);
            $product->image()->create([
                'url' => $url,
            ]);
        }

        $this->image = '';
        $this->resetFields();
        $this->identificador = rand();
        $this->emitTo('admin.stocktaking.suppliers.show-producs', 'render');
        $this->emit('closeModalMessaje', 'Información guardada', 'Producto almacenado exitosamente.', 'success', 'CreateNewSupplier');
    }

    public function render()
    {
        $Thesupplier = Supplier::findOrFail($this->supplier);

        $measures = Measure::orderBy('unit', 'asc')->get();
        $warehouses = Warehouse::orderBy('name', 'asc')->get();
        $racks = Rack::where('warehouse_id', $this->warehouse_id)->orderBy('name', 'asc')->get();
        return view('livewire.admin.stocktaking.suppliers.create-product', compact('Thesupplier', 'measures', 'warehouses', 'racks'));
    }

    public function resetFields()
    {
        $this->reset([
            'cod', 'name', 'brand', 'quantity', 'cost', 'price', 'supplier_id', 'measure_id', 'warehouse_id', 'rack_id'
        ]);
    }
}

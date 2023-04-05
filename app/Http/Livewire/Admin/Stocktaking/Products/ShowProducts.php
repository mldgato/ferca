<?php

namespace App\Http\Livewire\Admin\Stocktaking\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Supplier;
use App\Models\Measure;
use App\Models\Product;
use App\Models\Warehouse;
use App\Models\Rack;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ShowProducts extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $cod, $name, $brand, $quantity, $cost, $price, $supplier_id, $measure_id, $warehouse_id, $rack_id, $product_id, $new_image, $identificador, $muestra, $url;
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
        $this->identificador = rand();
        $this->muestra = 'https://cdn.pixabay.com/photo/2012/02/22/20/02/tools-15539_960_720.jpg';
    }
    //Con Unique quitar esta regla
    public function rules()
    {
        return [
            'cod' => 'required|unique:products,cod,' . $this->product_id,
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required|numeric|min:1',
            'cost' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1',
            'supplier_id' => 'required|numeric',
            'measure_id' => 'required|numeric',
            'warehouse_id' => 'required|numeric',
            'rack_id' => 'required|numeric',
            'new_image' => 'nullable|image|max:2048'
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
        $suppliers = Supplier::orderBy('company', 'asc')->get();
        $measures = Measure::orderBy('unit', 'asc')->get();
        $warehouses = Warehouse::orderBy('name', 'asc')->get();
        $racks = Rack::where('warehouse_id', $this->warehouse_id)->orderBy('name', 'asc')->get();
        if ($this->readyToLoad) {
            $products = Product::where('cod', 'LIKE', '%' . $this->search . '%')
                ->orWhere('name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('brand', 'LIKE', '%' . $this->search . '%')
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
        return view('livewire.admin.stocktaking.products.show-products', compact('products', 'suppliers', 'measures', 'warehouses', 'racks'));
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

    public function resetFields()
    {
        $this->reset([
            'cod',
            'name',
            'brand',
            'quantity',
            'price',
            'supplier_id',
            'measure_id',
            'warehouse_id',
            'rack_id',
        ]);
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $this->product_id = $id;
        $this->cod = $product->cod;
        $this->name = $product->name;
        $this->brand = $product->brand;
        $this->quantity = $product->quantity;
        $this->cost = $product->cost;
        $this->price = $product->price;
        $this->supplier_id = $product->supplier_id;
        $this->measure_id = $product->measure_id;
        $this->warehouse_id = $product->warehouse_id;
        $this->rack_id = $product->rack_id;
    }

    public function update()
    {
        $this->validate();
        if ($this->product_id) {
            $product = Product::find($this->product_id);
            $product->update([
                'cod' => $this->cod,
                'name' => $this->name,
                'brand' => $this->brand,
                'quantity' => $this->quantity,
                'cost' => $this->cost,
                'price' => $this->price,
                'supplier_id' => $this->supplier_id,
                'measure_id' => $this->measure_id,
                'warehouse_id' => $this->warehouse_id,
                'rack_id' => $this->rack_id,
            ]);

            if ($this->new_image) {
                $url = Storage::put('products', $this->new_image);
                if ($product->image) {
                    Storage::delete($product->image->url);
                    $product->image()->update([
                        'url' => $url,
                    ]);
                } else {
                    $product->image()->create([
                        'url' => $url,
                    ]);
                }
            }

            $this->resetFields();
            $this->emit('closeModalMessaje', 'Información actualizada', 'Producto actualizado exitosamente.', 'success', 'UpdateNewSupplier');
        }
    }
}

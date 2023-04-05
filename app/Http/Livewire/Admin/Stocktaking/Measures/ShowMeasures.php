<?php

namespace App\Http\Livewire\Admin\Stocktaking\Measures;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Measure;

class ShowMeasures extends Component
{
    use WithPagination;
    public $unit, $measure_id;
    public $search;
    public $sort = 'unit';
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
            'unit' => 'required|unique:measures,unit,' . $this->measure_id
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
            $measures = Measure::where('unit', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $measures = [];
        }
        return view('livewire.admin.stocktaking.measures.show-measures', compact('measures'));
    }

    public function loadMeasures()
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
            'unit',
        ]);
    }

    public function edit($id)
    {
        $measure = Measure::where('id', $id)->first();
        $this->measure_id = $id;
        $this->unit = $measure->unit;
    }

    public function update()
    {
        $this->validate();
        if ($this->measure_id) {
            $measure = Measure::find($this->measure_id);
            $measure->update([
                'unit' => $this->unit,
            ]);
            $this->resetFields();
            $this->emit('closeModalMessaje', 'Información actualizada', 'Medida actualizada exitosamente.', 'success', 'UpdateNewMeasure');
        }
    }
}

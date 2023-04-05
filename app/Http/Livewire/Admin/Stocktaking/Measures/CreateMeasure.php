<?php

namespace App\Http\Livewire\Admin\Stocktaking\Measures;

use Livewire\Component;
use App\Models\Measure;

class CreateMeasure extends Component
{
    public $unit;
    protected $rules = [
        'unit' => 'required|unique:measures',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        Measure::create(
            [
                'unit' => $this->unit,
            ]
        );
        $this->resetFields();
        $this->emitTo('admin.stocktaking.measures.show-measures', 'render');
        $this->emit('closeModalMessaje', 'Información guardada', 'Medida creada exitosamente.', 'success', 'CreateNewMeasure');
    }

    public function render()
    {
        return view('livewire.admin.stocktaking.measures.create-measure');
    }

    public function resetFields()
    {
        $this->reset([
            'unit',
        ]);
    }
}

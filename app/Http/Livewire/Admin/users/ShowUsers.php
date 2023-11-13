<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class ShowUsers extends Component
{
    use WithPagination;
    public $name, $email, $password, $password_repeat, $status, $user_id;
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
            $users = User::where('status', '1')
                ->where(function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%')
                        ->orWhere('email', 'LIKE', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $users = [];
        }

        return view('livewire.admin.users.show-users', compact('users'));
    }


    public function loadUsers()
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
            'email',
            'password',
            'password_repeat'
        ]);
    }

    protected array $rules = [];

    public function mount()
    {
        $this->rules = $this->rules();
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $validar = $this->validate([
            'name' => 'required',
            'email' => "required|email|unique:users,email,$this->user_id",
        ]);

        if ($validar) {
            if ($this->user_id) {
                $user = User::find($this->user_id);
                $user->update([
                    'name' => $this->name,
                    'email' => $this->email
                ]);
                $this->resetFields();
                $this->emit('closeModalMessaje', 'Información actualizada', 'Usuario actualizado exitosamente.', 'success', 'UpdateUserData');
            }
        }
    }

    public function updatePass()
    {
        $validar = $this->validate([
            'password' => 'required|min:8',
            'password_repeat' => 'required|same:password'
        ]);

        if ($validar) {
            if ($this->user_id) {
                $user = User::find($this->user_id);
                $user->update([
                    'password' => $this->password
                ]);
                $this->resetFields();
                $this->emit('closeModalMessaje', 'Información actualizada', 'Usuario actualizado exitosamente.', 'success', 'UpdateUserPass');
            }
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);
            $user->update([
                'status' => '0'
            ]);
            $this->emit('closeModalMessaje', 'Información', 'Usuario eliminado exitósamente.', 'info', 'null');
        } catch (\Exception $e) {
            $this->emit('closeModalMessaje', 'Información', 'No se ha podido eliminar error: ' . $e->getMessage(), 'error', 'null');
        }
    }
}

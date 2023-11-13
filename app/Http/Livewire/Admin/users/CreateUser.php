<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;

class CreateUser extends Component
{
    public $name, $email, $password, $password_repeat;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'password_repeat' => 'required|same:password'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        User::create(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]
        );
        $this->resetFields();
        $this->emitTo('admin.users.show-users', 'render');
        $this->emit('closeModalMessaje', 'Información guardada', 'Usuarios creado exitosamente.', 'success', 'CreateNewUser');
    }

    public function render()
    {
        return view('livewire.admin.users.create-user');
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
}

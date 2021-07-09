<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CreateRoles extends Component
{
    public $title;
    public $selected = [];
    protected $rules=[
        'title'=>'required',
    ];
    public function mount()
    {
        if(Gate::denies('role_create')){
            return redirect()->route('dashboard');
        }
    }
    public function Add()
    {
        $this->validate();
        $role = Role::create([
            'title'=>$this->title,
        ]);
        $role->permissions()->sync($this->selected);
        return redirect()->route('admin.roles.index');
    }
    public function render()
    {
        return view('livewire.admin.roles.create-roles',[
            'permissions'=>Permission::all()
        ])->extends('layouts.admin');
    }
}

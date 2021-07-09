<?php

namespace App\Http\Livewire\Admin\Permissions;

use App\Models\Admin\Permission;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CreatePermission extends Component
{
    public $title;
    public function mount()
    {
        if(Gate::denies('permission_create')){
            redirect()->route('dashboard');
        }
    }
    protected $rules=[
        'title'=>'required',
    ];
    public function Add()
    {
        $this->validate();
        Permission::create([
            'title'=>$this->title,
        ]);
        $this->title = '';
        return redirect()->route('admin.permissions.index');
    }
    public function render()
    {
        return view('livewire.admin.permissions.create-permission')->extends('layouts.admin');
    }
}

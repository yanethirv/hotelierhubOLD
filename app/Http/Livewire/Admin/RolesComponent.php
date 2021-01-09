<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use DB;

class RolesComponent extends Component
{
  use WithPagination;

  public $name, $role_id;
  public $searchTerm;
  public $rolePermissions;
  public $createMode = false;
  public $updateMode = false;
  public $permissionsList = [];
  public $permissions = [];

  public function render()
  {
      if(strlen($this->searchTerm) > 0)
      {
        $roles = Role::where('name', 'LIKE', '%' . $this->searchTerm . '%')->paginate(5);
        return view('livewire.admin.roles.index', ['roles' => $roles]);
      }
      else{
        return view('livewire.admin.roles.index', ['roles' => Role::orderBy('id')->paginate(5)]);
      }

  }

  //Para búsqueda con paginación
  public function updatingSearch(): void
  {
    $this->gotoPage(1);
  }

  private function resetInputFields(){
      $this->name = '';
      $this->permissions = '';
      $this->permissionsList = '';
      $this->rolePermissions = '';
      $this->searchTerm='';
  }

  public function create()
  {
    $this->createMode = true;
    $this->updateMode = false;

    $this->permissionsList = Permission::orderBy('name')->get()->pluck('id', 'name')->all();
  }

  public function store()
  {
      $validatedDate = $this->validate([
          'name' => 'required',
          'permissions' => 'required',
      ]);

      $role = Role::create($validatedDate);
      $role->permissions()->sync($this->permissions);

      $this->createMode = false;
      $this->updateMode = false;

      $this->resetInputFields();

      session()->flash('message',  __("Role created successfully."));
  }

  public function cancel()
  {
      $this->updateMode = false;
      $this->createMode = false;

      $this->resetInputFields();
  }

  public function destroy($id)
  {
      if($id){
          Role::where('id',$id)->delete();
          session()->flash('message',  __("Registration successfully removed."));
      }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];

}
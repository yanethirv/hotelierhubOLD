<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Type;
use Illuminate\Validation\Rule;

class TypesComponent extends Component
{
  use WithPagination;

  //public properties
  public $name;
  public $selected_id;
  public $searchTerm;
  public $action = 1;
  private $pagination = 5;

  //Es el primero que se ejecutar al iniciarse el componente
  public function mount(){
    //Inicializar variables
  }

  //Se ejecuta después del mount
  public function render()
  {
    if(strlen($this->searchTerm) > 0)
    {
      $types = Type::where('name', 'LIKE', '%' . $this->searchTerm . '%')->paginate(5);
      return view('livewire.admin.types.types-component', ['types' => $types]);
    }
    else{
      return view('livewire.admin.types.types-component', ['types' => Type::orderBy('id')->paginate(5)]);
    }
  }

  //Para búsqueda con paginación
  public function updatingSearch(): void
  {
    $this->gotoPage(1);
  }

  //Para movernos entre ventanas
  public function doAction($action)
  {
    $this->action = $action;
  }

  //Para limpiar propiedades
  public function resetInput()
  {
    $this->name = '';
    $this->selected_id = null;
    $this->action = 1;
    $this->searchTerm = '';
  }

  //Para mosntra información del registro
  public function edit($id)
  {
    $record = Type::findOrFail($id);
    $this->name = $record->name;
    $this->selected_id = $record->id;
    $this->action = 2;
  }

  //Para crear o editar elementos
  public function StoreOrUpdate()
  {
    //Validar nombre
    $this->validate([
      'name' => ['required','max:200', Rule::unique('types')->ignore($this->selected_id)],
    ]);

    if($this->selected_id <= 0) {
      //Creamos el registro
      $record = Type::create([
        'name' => $this->name
      ]);
    }
    else{
      //Buscamos el registro
      $record = Type::findOrFail($this->selected_id);

      //Actualizamos la información
      $record->update([
        'name' => $this->name
      ]);
    }

    if($this->selected_id)
      session()->flash('message', __("Updated type successfully."));
    else
      session()->flash('message', __("Type created successfully."));

    //Limpiar campos
    $this->resetInput();
  }

  //Eliminar registros
  public function destroy($id)
  {
    if($id) {
      $record = Type::find($id);
      $record->delete();
      $this->resetInput();
      session()->flash('message',  __("Registration successfully removed."));
    }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];
}
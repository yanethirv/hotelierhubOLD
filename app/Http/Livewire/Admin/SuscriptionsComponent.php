<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Plan;
use Illuminate\Validation\Rule;

class SuscriptionsComponent extends Component
{
  use WithPagination;

  //public properties
  public $selected_id;
  public $searchTerm;
  public $createMode = false;
  public $updateMode = false;
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
      $suscriptions = Plan::where('slug', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('amount', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('cost', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('type_name', 'LIKE', '%' . $this->searchTerm . '%')
                          ->paginate(25);
      return view('livewire.admin.suscriptions.index', ['suscriptions' => $suscriptions]);
    }
    else{
      return view('livewire.admin.suscriptions.index', ['suscriptions' => Plan::orderBy('id')->paginate(25)]);
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
    $this->selected_id = null;
    $this->action = 1;
    $this->searchTerm = '';
  }

  //Eliminar registros
  public function destroy($id)
  {
    if($id) {
      $record = Plan::find($id);
      $record->delete();
      $this->resetInput();
      session()->flash('message', __("Registration successfully removed."));
    }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];
}
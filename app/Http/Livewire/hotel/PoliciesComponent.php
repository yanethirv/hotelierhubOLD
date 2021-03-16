<?php

namespace App\Http\Livewire\Hotel;

use Livewire\Component;
use Livewire\WithPagination;
use App\Policy;
use Illuminate\Validation\Rule;

class PoliciesComponent extends Component
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
      $policies = Policy::where('description', 'LIKE', '%' . $this->searchTerm . '%')->paginate(20);
      return view('livewire.hotel.policies-component', ['policies' => $policies]);
    }
    else{
      return view('livewire.hotel.policies-component', ['policies' => Policy::orderBy('id')->paginate(20)]);
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

  //Eliminar registros
  public function destroy($id)
  {
    if($id) {
      Policy::where('id',$id)->delete();
      $this->resetInput();
      session()->flash('message',  __("Policy successfully removed."));
    }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];
}
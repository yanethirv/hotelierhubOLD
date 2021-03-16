<?php

namespace App\Http\Livewire\hotel;

use App\Documenthotel;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

class DocumentshotelComponent extends Component
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
      $documents = Documenthotel::where('name', 'LIKE', '%' . $this->searchTerm . '%')->paginate(20);
      return view('livewire.hotel.documentshotel-component', ['documents' => $documents]);
    }
    else{
      return view('livewire.hotel.documentshotel-component', ['documents' => Documenthotel::orderBy('id')->paginate(20)]);
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
      $record = Documenthotel::find($id);
      $filename = public_path($record->document);
      File::delete($filename);
      $record->delete();
      $this->resetInput();
      session()->flash('message', __("Document successfully removed."));
    }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];
}
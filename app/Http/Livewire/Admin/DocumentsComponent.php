<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Document;
use Illuminate\Validation\Rule;

class DocumentsComponent extends Component
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
      $documents = Document::where('name', 'LIKE', '%' . $this->searchTerm . '%')->paginate(20);
      return view('livewire.admin.documents.documents-component', ['documents' => $documents]);
    }
    else{
      return view('livewire.admin.documents.documents-component', ['documents' => Document::orderBy('id')->paginate(20)]);
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
    $record = Document::findOrFail($id);
    $this->name = $record->name;
    $this->selected_id = $record->id;
    $this->action = 2;
  }

  //Para crear o editar elementos
  public function StoreOrUpdate()
  {
    //Validar nombre
    $this->validate([
      'name' => ['required','max:200', Rule::unique('documents')->ignore($this->selected_id)],
    ]);

    if($this->selected_id <= 0) {
      //Creamos el registro
      $record = Document::create([
        'name' => $this->name
      ]);
    }
    else{
      //Buscamos el registro
      $record = Document::findOrFail($this->selected_id);

      //Actualizamos la información
      $record->update([
        'name' => $this->name
      ]);
    }

    if($this->selected_id)
      session()->flash('message', __("Updated resource successfully."));
    else
      session()->flash('message', __("Resource created successfully."));

    //Limpiar campos
    $this->resetInput();
  }

  //Eliminar registros
  public function destroy($id)
  {
    if($id) {
      $record = Document::find($id);
      $record->delete();
      $this->resetInput();
      session()->flash('message',  __("Resource successfully removed."));
    }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];
}
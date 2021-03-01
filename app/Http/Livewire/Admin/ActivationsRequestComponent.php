<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Activation;
use App\Product;
use App\Type;
use Illuminate\Validation\Rule;
use DB;

class ActivationsRequestComponent extends Component
{
  use WithPagination;

  //public properties
  public $name;
  public $description;
  public $type;
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
      $activationServices = Activation::where('status', 'LIKE', '%' . $this->searchTerm . '%')->paginate(25);

      $activationServices = Activation::where('product_name', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('hostname', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
                          ->paginate(25);

      return view('livewire.admin.activations-request.activations-request-component', ['activationServices' => $activationServices]);
    }
    else{
      return view('livewire.admin.activations-request.activations-request-component', ['activationServices' => Activation::orderBy('id')->paginate(25)]);
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

  //Para mosntra información del registro
  public function edit($id)
  {
    $record = Activation::findOrFail($id);
    $this->selected_id = $record->id;
    $this->action = 2;
  }

  //Para crear o editar elementos
  public function StoreOrUpdate()
  {
    //Validar nombre
    $this->validate([
      'name' => ['required','max:30', Rule::unique('products')->ignore($this->selected_id)],
      'price' => ['required','numeric'],
      'cost' => ['required','numeric'],
      'type' => ['required','string','max:30'],
      'description' => ['required','string','max:250'],
    ]);

    if($this->selected_id <= 0) {
      //Creamos el registro
      $record = Product::create([
        'name' => $this->name,
        'price' => $this->price,
        'cost' => $this->cost,
        'type' => $this->type,
        'description' => $this->description
      ]);
    }
    else{
      //Buscamos el registro
      $record = Product::findOrFail($this->selected_id);

      //Actualizamos la información
      $record->update([
        'name' => $this->name,
        'price' => $this->price,
        'cost' => $this->cost,
        'type' => $this->type,
        'description' => $this->description
      ]);
    }

    if($this->selected_id)
      session()->flash('message', __("Updated product"));
    else
      session()->flash('message', __("Product created"));

    //Limpiar campos
    $this->resetInput();
  }

  //Eliminar registros
  public function destroy($id)
  {
    if($id) {
      $record = Product::find($id);
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
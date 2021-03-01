<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Product;
use App\Type;
use Illuminate\Validation\Rule;

class ProductsComponent extends Component
{
  use WithPagination;

  //public properties
  public $name;
  public $description;
  public $price;
  public $cost;
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

      $products = Product::where('name', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('description', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('price', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('cost', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
                          ->orWhere('type_name', 'LIKE', '%' . $this->searchTerm . '%')
                          ->paginate(25);
      return view('livewire.admin.products.products-component', ['products' => $products]);
    }
    else{
      
      return view('livewire.admin.products.products-component', ['products' => Product::orderBy('id')->paginate(25)]);
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
    $this->description = '';
    $this->price = '';
    $this->cost = '';
    $this->type = '';
    $this->selected_id = null;
    $this->action = 1;
    $this->searchTerm = '';
  }

  //Eliminar registros
  public function destroy($id)
  {
    //if($id) {
    //  $record = Product::find($id);
    //  $record->delete();
    //  $this->resetInput();
    //  session()->flash('message', __("Registration successfully removed."));
    //}
    try {
      //Eliminar registro
      $record = Product::find($id);
      $record->delete();
      $this->resetInput();
      session()->flash('message', __("Service successfully removed."));
    } catch (\Exception $e) {
        session()->flash('msg-error', __("Service cannot be removed, as it has a related transaction."));
    }
  }

  //Listeners - Escuchar eventos y ejecutar acciones
  protected $listeners = [
    'deleteRow' => 'destroy'
  ];
}
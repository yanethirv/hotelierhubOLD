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

  //Para mosntra información del registro
  public function edit($id)
  {
    $record = Product::findOrFail($id);
    $this->name = $record->name;
    $this->description = $record->description;
    $this->price = $record->price;
    $this->cost = $record->cost;
    $this->type = $record->type;
    $this->name_type = $record->name_type;
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

      $valor = $this->type;
      $typeName = Type::select('name')
                              ->where('id', '=', $valor)
                              ->get();


      //Creamos el registro
      $record = Product::create([
        'name' => $this->name,
        'price' => $this->price,
        'cost' => $this->cost,
        'type' => $this->type,
        'type_name' => 'typeName',
        'description' => $this->description
      ]);
    }
    else{
      //Buscamos el registro
      $record = Product::findOrFail($this->selected_id);

      $valor = $this->type;

      $recordType = Type::select('name')->where('id', $valor)->first();

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
      session()->flash('message', __("Updated Service"));
    else
      session()->flash('message', __("Service created"));

    //Limpiar campos
    $this->resetInput();
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
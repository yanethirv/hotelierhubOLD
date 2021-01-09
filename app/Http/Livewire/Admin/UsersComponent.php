<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use DB;
use Hash;

class UsersComponent extends Component
{
    public $searchTerm;
    public $createMode = false;
    public $updateMode = false;

    public function render()
    {
        if(strlen($this->searchTerm) > 0)
        {
            $users = User::where('name', 'LIKE', '%' . $this->searchTerm . '%')
                ->orWhere('email', 'LIKE', '%' . $this->searchTerm . '%')
                ->orWhere('type', 'LIKE', '%' . $this->searchTerm . '%')
                ->orWhere('status', 'LIKE', '%' . $this->searchTerm . '%')
                ->paginate(25);

            return view('livewire.admin.users.index', ['users' => $users]);
        }
        else{
            return view('livewire.admin.users.index', ['users' => User::orderBy('id')->paginate(25)]);
        }
    }

    //Para búsqueda con paginación
    public function updatingSearch(): void
    {
        $this->gotoPage(1);
    }

    public function destroy($id)
    {
        if($id){
            User::where('id',$id)->delete();
            session()->flash('message', __("Registration successfully removed."));
        }
    }

    //Listeners - Escuchar eventos y ejecutar acciones
    protected $listeners = [
        'deleteRow' => 'destroy'
    ];
}

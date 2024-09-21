<?php

namespace App\Livewire;
use App\Models\User;
use App\Models\Personal;
use Auth;
use Hash;
use Livewire\WithPagination;

use Livewire\Component;

class AdmUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
	public  $empls;

    function mount(){	
        $empls = Personal::all();
        $this->empls = $empls;
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.adm-users', compact('users'));
    }

    public function Statud($id){    
        $user = User::where('id','=', $id)->first();
        $this->userSelec = $user->statud;
        if($user->statud == 1){
            $user->statud = 0;
            $user->save();
        }else{
            $user->statud = 1;
            $user->save();
        }
        $this->mount();
        return back()->with('change_user','Usuario ahora actualizado');
    }
}

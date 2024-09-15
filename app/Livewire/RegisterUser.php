<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use Hash;
use DateTime;
use App\Models\User;
use App\Models\Personal;
use Carbon\Carbon;

class RegisterUser extends Component
{
    public  $users, $UserEmpl, $IdUserAuth, $VerifEmail,
    $cedula, $name,  $last_name,$email, $IdEmpl, $empDBUser, $privilege, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.register-user');
    }


    protected $rules = [
        'cedula' => ['required','exists:personals,cedula'],
        'email' => ['required', 'email', 'exists:personals,email', 'unique:users'],
        'privilege' => ['required'],
        'password' => ['required', 'min:8', 'confirmed'],
    ];

    public function verif(){
        $emp = Personal::where('cedula','=',$this->cedula)->first();
        $this->emp = $emp;
        if ($emp)  {
            $this->name = $emp['name'];
            $this->last_name = $emp['last_name'];
            $this->IdEmpl = $emp['id'];
            $empDBUser = User::where('personal_id', '=', $emp['id'])->first();
            if ($empDBUser){
                return back()->with('error','Este empleado ya tiene un usuario registrado');
            }
        }else{
            return back()->with('error','Esta persona NO se encuentra registrado');
        }
    
    }

    public function VerifUser(){
        if ($this->validate()){
            return back();
        }
    }
    public function ValidEmail(){
        if ($this->validate()){
            return back();
        }
    }
    

    public function create(){
        $this->validate();    
        $RegistUser = User::create([
            'personal_id' => $this->IdEmpl,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'privilege' => $this->privilege,
            'statud' => 1,
            'email_verified_at' =>  Carbon::now(),
            'user_created' =>  Auth::user()->id,
        ]);
    
        $RegistUser->save();
        $this->clear();
        $this->refresh();
        return back()->with('mensaje','Usuario Registrado con exito');
    }

    public function clear(){
        $this->cedula ='';
        $this->name = '';
        $this->last_name = '';
        $this->IdEmpl = '';
        $this->email = '';
        $this->privilege = '';
        $this->password = '';
        $this->password_confirmation = '';
    }
    
    function refresh(){
       //view tool
        $users = User::all();
        $this->users = $users;
    }
    function ClearPassw(){
        $this->password='';
        $this->password_confirmation='';
    }
    

}

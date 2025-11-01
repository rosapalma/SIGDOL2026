<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use Hash;
use DateTime;
use App\Models\User;
use App\Models\Personal;
use App\Models\ps;
use Carbon\Carbon;

class RegisterUser extends Component
{
    public  $users, $UserEmp, $IdUserAuth, $VerifEmail,$pss,
    $cedula, $full_name, $email,$ps1_id,$ps2_id, $resp1,$resp2, $IdEmpl, $empDBUser, $privilege, $password, $password_confirmation;
    function mount(){ 
        $pss=ps::all(); 
        $this->pss = $pss;
    }
        

    public function render()
    {

        return view('livewire.register-user');
    }


    protected $rules = [
        'cedula' => ['required','exists:personals,cedula'],
        'email' => ['required', 'email', 'unique:users'],
        'privilege' => ['required'],
        'password' => ['required', 'min:8', 'confirmed'],
    ];

    public function verif(){
        $emp = Personal::where('cedula','=',$this->cedula)->first();
        $this->emp = $emp;
        if ($emp)  {
            $this->full_name = $emp['full_name'];
            $this->IdEmpl = $emp['id'];
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
            'ps1_id' => $this->ps1_id,
            'ps2_id' => $this->ps2_id,
            'resp1' => Hash::make($this->resp1),
            'resp2' => Hash::make($this->resp2),
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
        $this->full_name = '';
        $this->IdEmpl = '';
        $this->ps ='';
        $this->resp ='';
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

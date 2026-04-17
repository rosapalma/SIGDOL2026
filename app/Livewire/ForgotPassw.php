<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\ps;
use Hash;
use Auth;



class ForgotPassw extends Component
{
    public $user, $user_id, $cedula, $nombre, $pregunta1, $pregunta2, $errorResp, $respuestaN1, $respuestaN2, $resp1db, $resp2db, $contraseña, $contraseña_confirmation;
    public $restorePsw=false;

    public function render()
    {
        return view('livewire.forgot-passw');
    }

     protected $rules = [
        'contraseña' => ['required', 'min:8', 'confirmed'],
    ];

    public  function SendUsuario()
    {
       $this->validate([
                'cedula' => ['required','exists:users,cedula',],
            ]);
        $user = User::where('cedula','=',$this->cedula)->first();
        $this->cedula= $user->cedula;               
        $arraypersonal = $user->personal()->get();  //nombre 
        foreach ($arraypersonal as $pers) {
            $this->nombre=$pers['full_name'];
        }
            //pregunta-seguridad del user
        $ps1 = ps::where('id','=',$user->ps1_id)->first(); 
        $ps2 = ps::where('id','=',$user->ps2_id)->first(); 
        $this->pregunta1 = $ps1->pregunta;
        $this->pregunta2 = $ps2->pregunta; 
        $this->user = $user;
        $this->user_id = $user->id;        
    }

    public function ValidarPS()
    {  
        $this->validate([
            'respuestaN1' => ['required'],
            'respuestaN2' => ['required'],
        ]);
       
        $user = User::where('id','=',$this->user_id)->first(); 
        $resp1db= $user->resp1;      
        $resp2db= $user->resp2;

        if (Hash::check($this->respuestaN1 ,$resp1db)and (Hash::check($this->respuestaN2 ,$resp2db))) { 
            $this->restorePsw=true;
        }else{
            $this->errorResp = true;              
        }
    }

    public function UpdatePassw(){      
        $this->validate();
        $user = User::where('id','=',$this->user_id)->first(); 
        $user->update([               
             'password' => Hash::make($this->contraseña),
        ]);
        $user->save();
        $this->clear();
        return redirect('/login'); 
    }

        public function clear(){
        $this->cedula ='';
        $this->resp1db = '';
        $this->resp2db = '';
        $this->user_id='';
        $this->nombre ='';
        $this->pregunta1='';
        $this->pregunta2='';
        $this->errorResp='';
        $this->respuestaN1='';
        $this->respuestaN2='';
        $this->user ='';
        $this->contraseña = '';
        $this->contraseña_confirmation = '';
    }


}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ps;
use Illuminate\Support\Facades\Hash;

class ForgotPassw extends Controller
{
    public function index()
    {
            return view('auth.ForgotPassw.index');    
    }


    public function SendEmail(Request $request)
    {
         $request->validate([
                'email' => ['required','email','exists:users,email',],
            ]);
       
            $user =  User::where('email','=',$request->email)->first(); 
            if($user){                
                $user_email= $user->email;//email                 
                $arraypersonal = $user->personal()->get();  //nombre 
                  foreach ($arraypersonal as $pers) {
                    $nombre=$pers['full_name'];
                }
                 //pregunta-seguridad del user
                $ps1 = ps::where('id','=',$user->ps1_id)->first(); 
                $ps2 = ps::where('id','=',$user->ps2_id)->first(); 
                $pregunta1 = $ps1->pregunta;
                $pregunta2 = $ps2->pregunta;  
                $error = false;         
                return view('auth.ForgotPassw.validando', compact ('user','nombre','pregunta1','pregunta2','error')); 
            }
           
    }



    public function VerifPS(Request $request){
      $request->validate([
            'resp1' => ['required'],
            'resp2' => ['required'],
        ]);
        $resp1=$request->resp1; 
        $resp2=$request->resp2; 
        $user = User::where('id','=',$request->user_id)->first();        
        $resp1db= $user->resp1;         
        $resp2db= $user->resp2;
        if ((Hash::check($resp1 ,$resp1db)) and (Hash::check($resp2 ,$resp2db))) {
            return view('auth.ForgotPassw.restablecer-password',compact('user'));
        }else {
            //recuperar nombre de usuario
            $arraypersonal = $user->personal()->get();  
            foreach ($arraypersonal as $pers) {
                $nombre=$pers['full_name'];
            }
            //recuperar preguntas de seguridad
            $ps1 = ps::where('id','=',$user->ps1_id)->first(); 
            $ps2 = ps::where('id','=',$user->ps2_id)->first(); 
            $pregunta1 = $ps1->pregunta;
            $pregunta2 = $ps2->pregunta; 
            $error = true;
            //return view('auth.update-psw.perfil', compact ('user','nombre','pregunta1','pregunta2','error')); 
            return view('auth.ForgotPassw.validando', compact ('user','nombre','pregunta1','pregunta2','error')); 
        } 
    }

    public function UpdatePassw(Request $request){
      
         $request->validate([
                'password' => ['required', 'min:8', 'confirmed'],
            ]);
            $user = User::where('id','=',$request->user)->first(); 
            $user->update([               
                 'password' => Hash::make($request->password),
                ]);
                $user->save();

            return view('auth.login'); 
    }
}

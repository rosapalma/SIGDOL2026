<div>
    @section('title','Restablecer-Contraseña')
    <x-authentication-card>
        <x-slot name="logo">            
           <x-authentication-card-logo />    
        </x-slot>
        <div class="mb-4 text-sm text-gray-600">
            @if(!($user))
              @include("auth.ForgotPassw.index")  
            @endif 
            @if($user and !($restorePsw)) 
              @include("auth.ForgotPassw.validando")           
            @endif
            @if($restorePsw)
                @include("auth.ForgotPassw.restablecer-contraseña")
            @endif
            <br>
            <a href="/login" class="underline" style="float: right; color: blue;">Salir</a>
        </div>
    </x-authentication-card>
</div>

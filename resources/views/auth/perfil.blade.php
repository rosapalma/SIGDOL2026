<x-guest-layout>
    @section('title','Restablecer Contraseña')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div>
            <form method="POST" action="{{ route('verif') }}" class="form-horizontal">
                @csrf
                <div class="text-center">
                    <p class="display-6">{{$nombre}}</p>
                    <p class="display-7">{{$user->email}}</p>
                </div><br>
                @if($error)
                    <label>
                        <div class=" text-red-600">{{ __('¡Ups! Algo salió mal.') }} parece que tus respuestas son incorrectas, ¡intenta de nuevo!</div>
                    </label>
                @endif
                <div class="text-center display-6 text-dange">  

                    <p class="">{{$pregunta1}}</p>
                    <input type="text" name="resp1" class="form-control" placeholder="TU RESPUESTA" autofocus>
                        <hr>
                     <p class="">{{$pregunta2}}</p>
                    <input type="text" name="resp2" class="form-control" placeholder="TU RESPUESTA" > 

                  

                    <x-button >      {{ __('VALIDAR') }}      </x-button> 
                   
                </div>  
                 <input type="text" name="user_id" class="hidden-input"  value="{{$user->id}}" >         
          </form>
        </div>
        

    </x-authentication-card>
</x-guest-layout>
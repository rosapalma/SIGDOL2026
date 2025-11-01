<x-guest-layout>
    @section('title','Restablecer Contraseña')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? Ningún problema. Simplemente háganos saber su dirección de correo electrónico e indiqueno su respuesta a la ¡pregunta secreta de seguridad! que establecio cuando realizo su registro ..') }}
        

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('ver-perfil')}}">
            @csrf

                <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="DIRECCION DE CORREO"/>
                <br><br>
                <div align="center">
                    <x-button>{{ __('Enviar') }}</x-button>
                </div>
              
             </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
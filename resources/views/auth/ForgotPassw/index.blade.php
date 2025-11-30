<x-guest-layout>
    @section('title','Restablecer Contraseña')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña? Ingrese el correo electrónico con el que se registro') }}
        
             @if (session('error'))
            <div style="margin-top: 1%; color:red; text-align: center; font-style:italic" class="alert alert-danger">
                {{ session('error') }}
            </div>
             @endif


            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('SendEmail')}}">
            @csrf

                <x-input id="email" exists:users class="form-control" type="input" name="email" :value="old('email')" autofocus autocomplete="username" placeholder="DIRECCION DE CORREO"/>
                <br><br>
                <div align="center">
                    <x-button>{{ __('Enviar') }}</x-button>
                </div>
              
             </form>
             <a href="/login" class="underline" style="float: right; color: blue;">Ir Atras</a>
        </div>
    </x-authentication-card>
</x-guest-layout>
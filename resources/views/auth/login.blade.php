<x-guest-layout>
    @section('title','SIGDOL -> Acceder')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('error'))
            <div style="margin-top: 1%; color:red; text-align: center; font-style:italic" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

       
    <div class="tool">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mt-4">
                <!-- <x-label for="cedula" value="{{ __('cedula') }}" /> -->
                <x-input id="cedula" class="block mt-1 w-full py-2" type="cedula" name="cedula" required autofocus  autocomplete="username" placeholder=" CEDULA" />
            </div>

            <div class="mt-4">
                <!--<x-label for="password" value="{{ __('CONTRASEÑA') }}" /> -->
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="CONTRASEÑA" />
            </div><br>
            <div align="center"> 
                <x-button>
                    {{ __('ACCEDER') }}
                </x-button></div>
            <div>
                         
        </form>
    </div>
    <div class="center">
        <a class="underline" href="{{ route('restore-passw') }}" style="padding: 10%;"> {{ __('Olvido su contraseña?') }}   </a>                 
        <a href="{{ url('/register') }}" aling="left" class="display-7 text-primary font-weight-bold fst-italic"  >Registrarme</a>
    </div>

    </x-authentication-card>
</x-guest-layout>

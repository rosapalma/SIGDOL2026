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
              <div>
                <!-- <x-label for="email" value="{{ __('EMAIL') }}" /> -->
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="CORREO ELECTRONICO" />
            </div>

            <div class="mt-4"><!-- 
                <x-label for="password" value="{{ __('CONTRASEÑA') }}" /> -->
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
        <a class="underline" href="{{ route('SendEmail') }}" style="padding: 10%;"> {{ __('Olvido su contraseña?') }}   </a>                 
        <a href="{{ url('/register') }}" aling="left" class="display-7 text-primary font-weight-bold fst-italic"  >Registrarme</a>
    </div>

    </x-authentication-card>
</x-guest-layout>

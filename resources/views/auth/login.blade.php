<x-guest-layout>
    @section('title','Acceder')

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



              {{-- <div class="fadeIn first">
                  <h1>Iniciar Sección</h1>
                <img src="{{asset('images/ICONS/loguear.png')}}" id="icon">
              </div> --}}
              <div class="tool">

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Recordarme') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Olvido su contraseña?') }}
                    </a>&nbsp; &nbsp;
                @endif

                <x-button class="ms-4 bg-primary">
                    {{ __('Entrar') }}
                </x-button>
            </div>
        </form>

        <br>
        <a href="{{ url('/register') }}" aling="left" class="display-7 text-primary font-weight-bold"  >Registrarme</a>
    </div>
    </x-authentication-card>
</x-guest-layout>

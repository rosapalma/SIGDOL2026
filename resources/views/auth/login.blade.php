<x-guest-layout>
    @section('title','Acceder')

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
       
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
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Olvido su contraseña?') }}
                    </a>&nbsp; &nbsp;
                @endif

               <x-button>
                    {{ __('ACCEDER') }}
                </x-button>
            </div>
        </form>

        <br>
        <a href="{{ url('/register') }}" aling="left" class="display-7 text-primary font-weight-bold fst-italic"  >Registrarme</a>
    </div>
    </x-authentication-card>
</x-guest-layout>

<x-guest-layout>
    @section('title','Registro')
    <x-authentication-card>
        <x-slot name="logo">
            <x-title >
                REGISTRO DE USUARIOS
            </x-title>
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div align="center">
                <x-input id="cedula" type="text" exists:personals class=" block mt-1 w-full" name="cedula" value="{{ old('cedula') }}" placeholder="CÉDULA" autofocus />
            </div>

            <div class="mt-4">                
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email"  placeholder="CORREO ELECTRONICO"/>
            </div>
            
           <!--  <div class="mt-4">                
                <x-input id="username" class="block mt-1 w-full" type="username"  name="username" :value="old('username')" required autocomplete="username"  placeholder="NOMBRE DE USUARIO"/>
            </div> -->

            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"  placeholder="CONTRASEÑA"/>
            </div>

            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="CONFIRMAR CONTRASEÑA" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Ya estoy registrado') }}
                </a>

                <x-button>
                    {{ __('REGISTRARME') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

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
                <x-input id="cedula" type="text" exists:personals class=" block mt-1 w-full" name="cedula" value="{{ old('cedula') }}" placeholder="CÉDULA" required autofocus />
            </div>

            <div class="mt-4">                
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email"  placeholder="CORREO ELECTRONICO"/>
            </div>
            
           <!--  <div class="mt-4">                
                <x-input id="username" class="block mt-1 w-full" type="username"  name="username" :value="old('username')" required autocomplete="username"  placeholder="NOMBRE DE USUARIO"/>
            </div> -->
            <br>
            <div class="container-ps" >
                <select name="ps1" class="form-select-lg block mt-1 w-full" id="inputGroupSelect01" aria-label=".form-select-lg example" :value="old('ps1')" required>
                    <option value="">PREGUNTA DE SEGURIDAD</option>
                    <option value="1" {{ old('ps1') == 1 ? 'selected':''}}>Marca de tu primer auto</option>
                    <option value="2" {{ old('ps1') == 2 ? 'selected':''}}>Nombre de tu primera mascota</option>
                    <option value="3" {{ old('ps1') == 3 ? 'selected':''}}>Lugar favorito donde te gusta ir de vacaciones</option>
                    <option value="4" {{ old('ps1') == 4 ? 'selected':''}}>Deporte favorito</option>
                    <option value="5" {{ old('ps1') == 5 ? 'selected':''}}>Comida Favorita</option>
                    <option value="6" {{ old('ps1') == 6 ? 'selected':''}}>Nombre de tu mejor amigo(a) de la infancia</option>
              </select>           
                <input id="resp1" type="text"   name="resp1" required placeholder="RESPUESTA" :value="old('resp1')" class="form-control"  />
            <hr>
                 <select name="ps2" class="form-select-lg block mt-1 w-full" id="inputGroupSelect01" aria-label=".form-select-lg example" :value="old('ps2')" required>
                    <option value="">PREGUNTA DE SEGURIDAD</option>
                    <option value="1" {{ old('ps2') == 1 ? 'selected':''}}>Marca o Modelo de tu primer auto</option>
                    <option value="2" {{ old('ps2') == 2 ? 'selected':''}}>Nombre de tu primera mascota</option>
                    <option value="3" {{ old('ps2') == 3 ? 'selected':''}}>Lugar favorito donde te gusta ir de vacaciones</option>
                    <option value="4" {{ old('ps2') == 4 ? 'selected':''}}>Deporte favorito</option>
                    <option value="5" {{ old('ps2') == 5 ? 'selected':''}}>Comida Favorita</option>
                    <option value="6" {{ old('ps2') == 6 ? 'selected':''}}>Nombre de tu mejor amigo(a) de la infancia</option>
              </select>     
                <x-input id="resp2" type="text"   name="resp2" required placeholder="RESPUESTA" :value="old('resp2')" class="form-control" style="padding-top:0;"/>

            </div>



            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"  placeholder="CONTRASEÑA"/>
                <label class="text-muted">
                  Tu contraseña debe contener 8 o mas caracteres.
                </label>
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" style="padding-right: 5%;">
                    {{ __('Ya estoy registrado') }} 
                </a>

                <x-button>
                    {{ __('REGISTRARME') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<x-guest-layout>
    @section('title','Restablecer Contraseña')
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('UpdatePassw') }}">
            @csrf
             <label class="text-muted">
                  Tu contraseña debe contener 8 o mas caracteres.
                </label>
            <div class="mt-4">
                <x-label for="password" value="{{ __('Nueva Contraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
               <label class="text-muted">
                  Tu contraseña debe contener 8 o mas caracteres.
                </label>
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Restablecer contraseña') }}
                </x-button>            </div>
            <input type="text" name="user" value="{{$user->id}}" class="hidden-input">
        </form>
    </x-authentication-card>
</x-guest-layout>
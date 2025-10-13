<x-app-layout>
@section('title','Mi cuenta...')
    <x-slot name="page">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Cuenta') }}
        </h2>
    </x-slot> 
<div class="container-borde-form" >
    <div class="" >
        <div class="">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    @livewire('profile.update-password-form')
            @endif

{{--       eliminar cuenta
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif --}}
        </div>
    </div>
</div>

</x-app-layout>

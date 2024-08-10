<x-form-section submit="updateProfileInformation">
    <x-slot name="title" style="background-color: red;">
        {{ __('Informacion de su cuenta') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Nombre - Apellido y su direccion de correo institucional.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Nombre y Apellido(s)') }}" />
            <?php echo  strtoupper (Auth::user()->personal['name']); echo strtoupper (Auth::user()->personal['last_name']); ?>
        </div>
        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
             <?php echo  Auth::user()->personal['email']; ?>
        </div>
    </x-slot>

  
</x-form-section>

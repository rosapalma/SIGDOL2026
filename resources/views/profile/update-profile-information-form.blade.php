<x-form-section submit="updateProfileInformation">
    <x-slot name="form">
        <div align="center">
            <div class="title">Información de la Cuenta</div>
            <div><br>
                <label>Nombre y Apellido(s) </label>
                <div>
                    <?php echo  strtoupper (Auth::user()->personal['name']); echo strtoupper (Auth::user()->personal['last_name']); ?>
                </div>
            </div><br>
            <div><label class="label">Email</label> 
                <div  style=" ">
                    <?php echo  Auth::user()->personal['email']; ?>
                </div>
            </div>
        </div>
    </x-slot>
</x-form-section>

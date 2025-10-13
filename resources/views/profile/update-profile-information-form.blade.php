<x-form-section submit="updateProfileInformation">
    <x-slot name="form">
        <div align="center">
            <div class="title">Información de la Cuenta</div>
            <div><br>
                <div class="display-7">
                    <?php echo  strtoupper (Auth::user()->personal['full_name']); ?>
                </div>
            </div><br>
            <div><label class="label">Email -></label> 
                    <?php echo  Auth::user()->email; ?>      
            </div>
        </div>
    </x-slot>
</x-form-section>
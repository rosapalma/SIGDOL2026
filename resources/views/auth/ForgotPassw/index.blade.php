<div>
        {{ __('¿Olvidaste tu contraseña? Ingrese el correo electrónico con el que se registro') }}
        <x-validation-errors class="mb-4" />            
        <div class="input-group mb-3">
           <input type="text" class="form-control" wire:model.live="correo"  placeholder="DIRECCION DE CORREO" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete>
            <div class="input-group-append">
                 <button class="btn btn-outline-secondary" type="button" id="button-addon2" wire:click="SendCorreo">Buscar</button>
            </div>
        </div> 
</div>
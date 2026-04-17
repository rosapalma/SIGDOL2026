<div>
        {{ __('¿Olvidaste tu contraseña? Ingrese el Usuario') }}
        <x-validation-errors class="mb-4" />            
        <div class="input-group mb-3">
           <input type="text" class="form-control" wire:model.live="cedula"  placeholder="CEDULA" aria-label="Recipient's username" aria-describedby="button-addon2" autofocus autocomplete>
            <div class="input-group-append">
                 <button class="btn btn-outline-secondary" type="button" id="button-addon2" wire:click="SendUsuario">Enviar</button>
            </div>
        </div> 
</div>
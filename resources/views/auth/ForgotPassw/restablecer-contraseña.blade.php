<div>
    <x-validation-errors class="mb-4" />
 


         <!-- ------------PASSWORD/CONFIRMED------------ -->

        <label-ayuda class="text-muted">
            Tu contraseña debe contener 8 o mas caracteres.
        </label-ayuda>
       
        <div class="mt-4">
            <x-input type="txt" wire:model.live="contraseña" placeholder="CONTRASEÑA"  class="form-control form-control-sm" required />             
        </div>   
        
        <div class="mt-4">
            <x-input  type="txt" class="form-control form-control-sm" wire:model.live="contraseña_confirmation" placeholder="CONFIRMAR" required />
        </div> <br>



    <div class="flex items-center justify-end mt-4">
        <x-button wire:click="UpdatePassw">
            {{ __('Restablecer contraseña') }}
        </x-button>            
    </div>
</div>
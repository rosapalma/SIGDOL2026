<!-- MODAL Editar y reiniciar USUARIO -->
        <x-validation-errors class="mb-4" />
<div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
        

        <x-validation-errors class="mb-4" />
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4"> Actualizar Usuario</h2>
        <div>
        <div class="container-center">        
            <input type="text" wire:model.live="cedula"  wire:change="Shear"  placeholder="Cédula de Identidad" autofocus class="text-center text-primary"><br>
            <div wire:ignore.self class="text-info font-weight-bold display-7">{{$full_name}}<br>{{$email}}
            </div>
            
            @error('cedula')
                <div class="alert-danger">Indique Cedula</div>
            @enderror
        </div>
        
        <div class="display-6 text-muted text-center"><label class="text-danger">Actualizar</label><br>
            <input type="checkbox" wire:model.live="Actpriv" value="1"  >privilegios
            <input type="checkbox" wire:model.live="Actcont" value="2"  >contraseña
        </div>
        @if($Actpriv)
            <div>
                <select wire:model.live="privilege">
                    <option value="3">Usuario de recursos</option>                  
                    <option value="2">Usuario con privilegios</option>
                    <option value="1">Administrador</option>   
                </select>
            </div> 
        @endif
        @if($Actcont)
                <!-- ------------PASSWORD/CONFIRMED------------ -->
                <div class="col-md-8">
                        <input type="txt" wire:model.live="contraseña" placeholder="CONTRASEÑA"  class="form-control text-bold" required>                   
                </div>   
                <label-ayuda class="text-muted">
                    Tu contraseña debe contener 8 o mas caracteres.
                </label-ayuda>

                <div class="col-md-8">
                        <input  type="txt" class="form-control text-bold text-primary" wire:model.live="contraseña_confirmation" placeholder="CONFIRMAR" required>
                        @error('passwort-bold text-primary"d_confirmation') 
                        <span class="text-danger text-center">{{ $message }}</span> @enderror
                </div> <br><br>
            @endif


            <div class="p-4 bg-gray-50 flex justify-end">
                <button type="button" wire:click="close" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-success" wire:click="update"> Guardar</button>
            </div>

    </div>
</div>

  

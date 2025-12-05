
<div>
    <!-- hacer etiqueta e input en una misma linea -->
    <div>
            <label class="formulario-item text-center">NUEVO RESPONSABLE </label><br>
        
            <input type="text" wire:model.live="cedula"  wire:change="Shear"  placeholder="Cédula de Identidad" autofocus class="text-center text-primary"><br>
            <p wire:ignore.self class="text-info font-weight-bold display-7">{{ $full_name }}</p>
            @error('cedula')
                <div class="alert-danger">Indique Cedula</div>
            @enderror
    </div> <br><br>
{{$ruta}}
         
        <div>
            <label class="formulario-item text-center">SUBIR ARCHIVO DE AUTENTICACIÓN</label>

            <input type="file" wire:model.live="autentication" required accept="image/png" />
        </div>
        <!-- <img src="{{ asset('storage/' . $ruta) }}" alt="Vista previa de imagen"> -->

<br>
                
<x-button wire:click="Save" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()">
    {{ __('Registrar') }}
</x-button>

@if (session('error'))
    <div class="text-danger">
        {{ session('error') }}
    </div>
@endif




</div>
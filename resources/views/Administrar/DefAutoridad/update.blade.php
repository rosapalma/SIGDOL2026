
<div>
    <!-- hacer etiqueta e input en una misma linea -->
    <div class="flex">
        <div class="formulario-container">
            <label class="formulario-item text-center">NUEVO RESPONSABLE </label>
        </div>
    <div>
        <input type="text" wire:model="cedula"  wire:change="Shear"  placeholder="Cédula de Identidad" autofocus class="text-center text-primary">
    </div>
    </div>

         <h3 wire:ignore.self class="text-center text-success display-7">{{ $full_name }}</h3>
        @error('cedula')
        	<div class="alert-danger">Indique Cedula</div>
        @enderror

   


<br>
                
<x-button    wire:click="Save" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()">Guardar</x-button>

@if (session('error'))
    <div class="text-danger">
        {{ session('error') }}
    </div>
@endif

</div>
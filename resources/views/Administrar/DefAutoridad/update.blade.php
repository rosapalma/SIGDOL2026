
<input type="text" wire:model="cedula"  wire:change="Shear"  placeholder="Cédula de Identidad" autofocus class="form-control text-bold text-primary">
<h3 wire:ignore.self class="text-center text-success display-7">{{ $name }}&nbsp; {{ $last_name }}</h3>
@error('cedula')
	<div class="alert-danger">Indique Cedula</div>
@enderror

<br>
                
<button class="btn  btn-lg btn-primary btn-block"  wire:click="Save" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()">Guardar</button>

@if (session('error'))
    <div class="text-danger">
        {{ session('error') }}
    </div>
@endif


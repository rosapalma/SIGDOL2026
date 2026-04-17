<div>
    <div class="text-center">
        <p class="display-6">{{$nombre}}</p>
    </div><br>
    <x-validation-errors class="mb-4" />    
    @if($errorResp)
        <label>
            <div class=" text-red-600">{{ __('¡Ups! Algo salió mal.') }} parece que tus respuestas son incorrectas, ¡intenta de nuevo!</div>
        </label>
    @endif
    <div class="text-center display-6 text-dange">  
        <p class="">{{$pregunta1}}</p>
        <input type="text" wire:model.live="respuestaN1" class="form-control" placeholder="TU RESPUESTA" autofocus>
        <br> 
        <p class="">{{$pregunta2}}</p>
        <input type="text" wire:model.live="respuestaN2" class="form-control" placeholder="TU RESPUESTA" >
        <input type="text" wire:model.live="user_id" class="hidden-input"  value="{{$user->id}}" >
        <br>
        <x-button wire:click="ValidarPS">
            {{ __('Validar') }}
        </x-button>                    
    </div>  
</div>

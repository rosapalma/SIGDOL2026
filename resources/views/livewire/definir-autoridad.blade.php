<div class="back-autoridad" >
    <x-container-full>
    @section('title','Def. Autoridad')
        
    @if (Auth::user()->privilege == 1)
         <x-title>ASIGNAR RESPONSABLE</x-title><br><br>
        @include("Administrar.DefAutoridad.index")
    @else
        <br><br><br>
        <p class="display-5">NO ESTA AUTORIZADO A VISITAR ESTA PAGINA</p>
    @endif
    </x-container-full>
</div>


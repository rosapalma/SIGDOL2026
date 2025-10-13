<div class="back-autoridad" >
    
    @section('title','Def. Autoridad')
        
    @if (Auth::user()->privilege == 1)
         @include("Administrar.DefAutoridad.index")
    @else
        <br><br>
        <p class="display-5">NO ESTA AUTORIZADO A VISITAR ESTA PAGINA</p>
    @endif
</div>


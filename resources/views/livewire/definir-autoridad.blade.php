<div style="padding-top:2%">
    @section('title','Def. Autoridad')
        
    @if (Auth::user()->privilege == 1)
         <p class="display-5 text-center">Autoridad Definida</p>
        @include("Administrar.DefAutoridad.index")
    @else
        <br><br><br>
        <p class="display-5">No esta autorizado a visitar este sitio</p>
    @endif
</div>
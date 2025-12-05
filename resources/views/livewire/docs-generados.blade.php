<div style="padding-top:2%;" class="back-doc-generados"><!--  -->
    @section('title','Docs. Generados')
        
    @if (Auth::user()->privilege < 3)
        @include("Administrar.DocsGenerados.index")
    @else
        <br><br><br>
        <p class="display-5">No esta autorizado a visitar este sitio</p>
    @endif
</div>
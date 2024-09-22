<div style="padding-top:2%">
    @section('title','Administ. Users')
        
    @if (Auth::user()->privilege == 1)
        <p class="display-5 text-center">USUARIOS REGISTRADOS</p>
        @include("Administrar.AdmUsers.index")
    @else
        <br><br><br>
        <p class="display-5">No esta autorizado a visitar este sitio</p>
    @endif
</div>

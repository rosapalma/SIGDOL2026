<div style="padding-top:2%;" class="back-usuarios">
    @section('title','Administ. Users')
        
    @if (Auth::user()->privilege < 3)
        <p class="title text-center">USUARIOS REGISTRADOS</p>
        @include("Administrar.AdmUsers.index")
    @else
        <br><br><br>
        <p class="title text-center">No esta autorizado a visitar este sitio</p>
    @endif
</div>
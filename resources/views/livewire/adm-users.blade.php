<div>
@section('title','Adm. Users')
    <div class="container">
        <div class="row justify-content-center" >
            @if (Auth::user()->privilege == 1)
                <div class="col-md-15" style="margin-top:2%">
                    <p class="display-5 text-center">USUARIOS REGISTRADOS</p>
                    <div class="card">
                        @include("Administrar.AdmUsers.index") 
                    </div>
                </div>
            @else
                <br><br><br>
                <p class="display-5">No esta autorizado a visitar este sitio</p>
            @endif
        </div>
    </div>
</div>

<div class="back-autoridad" >
    <div class="container-borde-form overflow-auto">
        <div class="container">
            <div class="box">    
                @section('title','Def. Autoridad')
                    
                @if (Auth::user()->privilege == 1)
                     @include("Administrar.DefAutoridad.index")
                @else
                  <br><br>
                  <p class="display-7 text-center text-bold" style="padding-top: 20%;">
                    NO ESTA AUTORIZADO A VISITAR ESTA PAGINA
                  </p>
                @endif
            </div>
        </div>
    </div>
</div>


<div class="back-autoridad" >
    
    @section('title','Def. Autoridad')
        
    @if (Auth::user()->privilege == 1)
         @include("Administrar.DefAutoridad.index")
    @else
        <br><br>
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <p class="text-break display-5">NO ESTA AUTORIZADO A VISITAR ESTA PAGINA</p>
            </div>
          </div>
        </div>
    @endif
</div>


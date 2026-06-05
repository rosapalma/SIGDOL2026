<div class="" style="padding-top:2%">
    
       
  <div class="justify-content-center" >
 
    <div class="container-borde" > 
        @if (session('mensaje'))
          <div class="alert alert-success">
            {{ session('mensaje') }}
          </div>
        @endif
      
      <p class="title text-center">USUARIOS REGISTRADOS</p>
    @if (session('change_user'))
      <div class="alert alert-success"> {{ session('change_user') }} </div>
    @endif
    @if (session('change_user_find'))
        <div class="alert alert-danger"> {{ session('change_user_find') }} </div>
    @endif
      @if  (Auth::user()->privilege==1)
      <div style="padding-left:10%">
        <a wire:click="Editar" class="img-btn-new" title="Editar Usuario" >
          <img src="{{asset('images/ICONS/editar.png')}}" ></a>&nbsp;&nbsp;
        <a href="{{ url('/registro-usuarios') }}"  title="Nuevo Usuario" class="img-btn-new"><img src="{{asset('images/ICONS/bt-new.png')}}" ></a>
      </div>
      @endif 

      @include("Administrar.AdmUsers.tool") 

      <br><br>

		</div>
    @if($edita)
      @include("Administrar.AdmUsers.editar")
    @endif
  </div>
</div>



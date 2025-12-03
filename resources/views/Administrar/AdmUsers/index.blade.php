<div class="" style="padding-top:2%">
    
       
  <div class="justify-content-center" >
 
    <div class="container-borde" > 
        @if (session('mensaje'))
          <div class="alert alert-success">
            {{ session('mensaje') }}
          </div>
        @endif
      
      <p class="title text-center">USUARIOS REGISTRADOS</p>
       @if  (Auth::user()->privilege==1)
      <a href="{{ url('/registro-usuarios') }}"  title="Nuevo Usuario" class="img-btn-new">
        <img src="{{asset('images/ICONS/bt-new.png')}}" >
      </a>
  @endif  
        @include("Administrar.AdmUsers.tool")
      <br><br>
		</div>
  </div>
</div>



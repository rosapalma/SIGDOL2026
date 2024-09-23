<div class="container" style="padding-top:2%">
  @if  (Auth::user()->privilege==1)
      <a href="{{ url('/registro-usuarios') }}"  title="Nuevo Usuario" class="img-btn-new">
        <img src="{{asset('images/ICONS/bt-new.png')}}" >
      </a>
  @endif
  <div class="row justify-content-center">
    <div class="container-fond">
        @include("Administrar.AdmUsers.tool")
      <br><br>
		</div>
  </div>
</div>


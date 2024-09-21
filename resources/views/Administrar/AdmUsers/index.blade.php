<div class="container" style="padding-top:2%">
  @if  (Auth::user()->privilege==1)
    <div class="img-btn-new">
      <a href="{{ url('/registro-usuarios') }}"  title="Nuevo Usuario"><img src="{{asset('images/ICONS/bt-new.png')}}" ></a>
    </div>
  @endif
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        @include("Administrar.AdmUsers.tool")
      </div>
		</div>
  </div>
</div>


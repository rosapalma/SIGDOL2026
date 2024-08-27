<!-- Modal Actualizar Data -->
<div class="modal fade" id="ImportNominaExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Importar Nómina
            {{-- <img src="{{asset('images/Modals/update.jpg')}}" width="60">--}}
          </h5>
          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true close-btn"><img src="{{asset('images/ICONS/close.png')}}" width="30"></span>
          </button>

        </div>
        <div class="modal-body">
            <div class="text-danger display-6" aling="center" style="margin: 2%">
                <small> Debes tener en cuenta que los datos personal ya deben estar previamente cargados en la base de datos. ya que ambas guardan una extrecha relación</small>
            </div>
            <form action="{{ url('/importNominaExcel') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="file" name="file" class="form-control" required>
                  <br>
                  {{-- <div>
                      Eliminar registros anteriores y volver a cargar todos &nbsp;&nbsp;
                      <input type="checkbox" name="vaciarDB" value="">
                  </div> --}}
                  <BR>
                  <button class="btn btn-success">Importar</button>
          </form>
          @if (isset($errors) && $errors->any()) <!--validacion de BD desde el Import-->
              <div class="alert alert-danger" role="alert">
                  @foreach ($errors->all() as $error)
                      {{$error}}
                  @endforeach
              </div>
          @endif
        </div>

      </div>
    </div>
  </div>

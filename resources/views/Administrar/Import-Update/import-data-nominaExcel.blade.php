<!-- Modal Actualizar Data -->
<div class="modal fade" id="ImportNominaExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <x-header-modal>
          Importar Nómina
        </x-header-modal>        
        <div class="modal-body">
            <div class="text-danger display-6" aling="center">
                <small> Debes tener en cuenta que los datos del personal ya deben estar previamente cargados en la base de datos, ya que ambas guardan una estrecha relación.</small>
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
                <x-button class="ms-4">
                  {{ __('Importar') }}
                </x-button>
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

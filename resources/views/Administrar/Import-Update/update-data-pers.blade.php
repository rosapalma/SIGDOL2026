
<!-- Modal Actualizar Data -->
<div class="modal fade" id="UpDataModalPers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <x-header-modal>
          Importar Datos de Personal
        </x-header-modal> 
      <div class="modal-body">
        <form action="{{ url('/importpers') }}" method="POST" enctype="multipart/form-data">
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

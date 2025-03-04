
<!-----MODAL RECIBO DE PAGO-->
<div class="modal fade" id="RecPagModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel">Solicitar Recibo de Pago </h5>
          {{-- <img src="{{asset('images/Modals/pago-peq.jpeg')}}"  style="width: 60%; height: 20%"></h5> --}}
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <img src="{{asset('images/ICONS/close.png')}}"  class="img-close"  align="right"title="Cerrar"></span>
        </button>
      </div>
      <div>

       <div class="modal-body">
{{-- {{ route('GeneralRecibo') }}" --}}
        <form class="form-horizontal" method="post" action="/recibo-de-pago" name="formulario" id="Miform">
              {{ csrf_field() }}
           <div align="center" >
            <input type="text"  name="cedula"  class="" style="font-size: 2rem" onkeyUp="return ValNumero(this);" placeholder="Cédula de Identidad" autofocus>
           </div><br>
           <div align="center" required class="form-group">
             <select name="anio" class=" form-select-lg mb-3" aria-label=".form-select-lg example" >
                <option value="">Año</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
             </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <select name="mes" class="form-select-lg mb-3" aria-label=".form-select-lg example" >
                  <option value="">Mes</option>
                  <option value="1">Enero</option>
                  <option value="2">Febrero</option>
                  <option value="3">Marzo</option>
                  <option value="4">Abril</option>
                  <option value="5">Mayo</option>
                  <option value="6">Junio</option>
                  <option value="7">Julio</option>
                  <option value="8">Agosto</option>
                  <option value="9">Septiembre</option>
                  <option value="10">Octubre</option>
                  <option value="11">Noviembre</option>
                  <option value="12">Diciembre</option>
                </select>
           </div><br>

           <div class="form-group">
              <x-button class="ms-4">
                    {{ __('Ver | Descargar | imprimir ') }}
              </x-button>
           </div>

       </form>

      </div>

        </div>

    </div>
  </div>
</div>

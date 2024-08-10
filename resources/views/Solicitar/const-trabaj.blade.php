
<!-- --------MODAL CONSTANCIA DE TRABAJO -->
<div class="modal fade" id="ConstModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel">Solicitar Constancia de Trabajo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <img src="{{asset('images/ICONS/close.png')}}"  class="img-close"  align="right"title="Cerrar"></span>
        </button>

      </div>

      <div class="modal-body">
      {{-- {{ route('GeneralConst') }} --}}

        <form class="form-horizontal" method="post" action="">
        {{--  {{ csrf_field() }} --}}
            <div>


          </div>
            <div align="center">
              <input type="text" id="inputname" name="cedula"  class="" style="font-size: 2rem" onkeyUp="return ValNumero(this);" placeholder="Cédula de Identidad" autofocus required>
            </div>  <br>
            <div align="center">
              <select name="tipo"  class="form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option value="">Tipo de Constancia.</option>
                <option value="1">Básica</option>
                <option value="2">Con Sueldo Base</option>
                <option value="3">Con Sueldo Integral</option>
                <option value="4">Para Jubilado(a) || Pensionado</option>
                <option value="5">Para Sobreviviente</option>
              </select>
            </div>
            <div>
              <input type="checkbox" id="TS" name="TS"  class="check" value="1"/>
              <label>&nbsp;&nbsp;<b>TIEMPO DE SERVICIO</b></label>
            </div>
            <br>
              <div class="form-group">
                <div class="col-md-12 text-center">
                  <button type="submit" name="btnsave" class="btn btn-primary btn-block" style="font-size: 2rem">Ver | Descargar | imprimir </button>
                </div>
              </div>
        </form> 
        </div><!--close Body-->


    </div> <!--close conter-->
  </div>  <!--close dialog-->
</div>    <!--close fade, id-->

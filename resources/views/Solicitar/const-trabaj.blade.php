
<!-- --------MODAL CONSTANCIA DE TRABAJO -->
<div class="modal fade" id="ConstModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <x-header-modal>
        Solicitar Constancia de Trabajo   
      </x-header-modal>

      <div class="modal-body">
        <form method="POST" action="/contancia-de-trabajo" class="form-horizontal">
            @csrf

               <div align="center">
             @if (Auth::user()->privilege < 3)
              <input type="text" id="inputname" name="cedula"  class="form-control" style="font-size: 2rem" onkeyUp="return ValNumero(this);" placeholder="Cédula del empleado" autofocus required>
            @else 
            <h2 class="display-6 title">  {{ Auth::user()->personal['full_name'] }}</h2>
              <input type="text" id="inputname" name="cedula"  disabled class="form-control" style="font-size: 2rem" onkeyUp="return ValNumero(this);" value="{{ Auth::user()->personal['cedula'] }}" placeholder="Cédula del empleado" autofocus required>            
            @endif
          </div> <br>

            <div align="center">
              <select id="SelectTipoConst" name="tipo"  class="form-select-lg mb-3" aria-label=".form-select-lg example" required>
                <option value="">Tipo de Constancia.</option>
                <option value="1">Básica</option>
                <option value="2">Sueldo Base</option>
                <option value="3">Sueldo Integral</option>
                <option value="4">Jubilado(a) || Pensionado</option>
                <option value="5">Sobreviviente</option>
              </select>
            </div><br>
         
<!-- 
          <div>
              <input type="text" id="inputBenef" name="cedulaBenef"  class="form-control" style="font-size: 2rem" onkeyUp="return ValNumero(this);" placeholder="Cédula del Beneficiario">
          </div> -->
          <!--   <div>
              <input type="checkbox" id="TS" name="TS"  class="check" value="1"/>
              <label style="margin-left:2%"><b>TIEMPO DE SERVICIO</b></label>
            </div> -->
            <br> 
              <div class="form-group">
                <div class="col-md-12 text-center">
                <x-button class="ms-4">
                    {{ __('Ver | Descargar | imprimir ') }}
                </x-button>
                  {{-- <button type="submit" name="btnsave" class="btn btn-primary btn-block" style="font-size: 2rem">Ver | Descargar | imprimir </button> --}}
                </div>
              </div>
        </form> 
        </div><!--close Body-->


    </div> <!--close conter-->
  </div>  <!--close dialog-->
</div>    <!--close fade, id-->


<!-- <script>
//USANDO EL SELECT
    inputBenef.style.display = 'none'; // Ocultar

    const select = document.getElementById("SelectTipoConst");
   // console.log(tipo);
    select.addEventListener("change", function() {
        const valor= this.value;
        //alert("valor =" +valor);
        if (valor == 5){
            inputBenef.style.display = 'block'; // Mostrar
           // alert("valor =" +valor);
        }else{
          inputBenef.style.display = 'none'; // Ocultar
        }
        
    });
</script> -->
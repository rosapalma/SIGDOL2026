<div>
     <a wire:click="Editar" class="img-btn-new" title="Revertir cambios" >
          <img src="{{asset('images/ICONS/editar.png')}}" ></a>


@if($edita)
    <div class="fixed inset-0 flex items-center justify-center z-50">
    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full z-50">
        

        <x-validation-errors class="mb-4" /> 
         <a href="{{ url('/viewimport') }}" style="float: right;">
                <img src="{{asset('images/ICONS/close.png') }}" title="salir" width="40" cursor: pointer;>
            </a>
        <div class="p-6">
            <h2 class="text-lg font-bold mb-4"> Eliminar Nomina</h2>
          
        <div>

            
              
            <input type="radio" wire:model.live="list" value="1">
                <label for="css">Por personal</label><br>
            <input type="radio"  wire:model.live="list" value="2" >
                <label for="html">Por Mes|Año</label><br>
            <input type="radio"  wire:model.live="list" value="3">
                <label for="html" wire:change="Todas" >Todas</label><br>
                    
        </div><br>
      

        @if($list==1)

        <input type="text" wire:model.live="cedula"  wire:change="Shear"  placeholder="Cédula de Identidad" autofocus class="text-center text-primary">
        <div wire:ignore.self class="text-info font-weight-bold display-7">
            {{$full_name}}
        </div>
        
        <?php if (!is_null($nominas) && (is_array($nominas) || is_object($nominas))) {
            echo 'Nomina(s) cargada(s)';
                ?>
            @foreach ($nominas as $item)
                <br> <input type="radio"  wire:model.live="Nomina" value="{{$item->id}}">
                        <label for="html">Del Mes:{{$item['mes']}} -- Año: {{$item['anio']}}</label>
            @endforeach
            <br>
        <?php echo 'Total: ', count($nominas);} ?>

        
    </ol>
       

        </ul>
        @elseif ($list==2)
            <div wire:ignore.self class="text-info font-weight-bold display-7">
                <select wire:model.live="anio" class="form-select-lg mb-3" aria-label=".form-select-lg example" >
                    <option value="">Año</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                     </select>&nbsp;&nbsp;&nbsp;
                <select wire:model.live="mes" class="form-select-lg mb-3" aria-label=".form-select-lg example" wire:change="ShearMesAnio">
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
           </div>
             <?php if (!is_null($nominas) && (is_array($nominas) || is_object($nominas))) {
                        echo '<b> Nomina(s) cargada(s): ', count($nominas),'<b>';} ?>
        @elseif ($list==3)
              <?php if (!is_null($nominas) && (is_array($nominas) || is_object($nominas))) {
                        echo '<b> Nomina(s) cargada(s): ', count($nominas),'<b>';} ?>
        @endif

    @if (session('mensaje'))
        <div class="alert alert-success">      {{ session('mensaje') }}    </div>
    @endif
    @if (session('alert'))
        <div class="alert alert-warning">      {{ session('alert') }}    </div>
    @endif<br>
            <div class="p-4 bg-gray-50 flex justify-end">
                <button type="button" wire:click="close" class="btn btn-danger">Cancelar</button>&nbsp;&nbsp;
                <button type="submit" class="btn btn-success" wire:click="Save" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()"> Guardar</button>
            </div>

    </div>
</div>
@endif

</div>


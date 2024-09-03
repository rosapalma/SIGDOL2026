<div aling="center">
  <label class="display-5 text-center" >CONSTANCIAS DE TRABAJO</label>
</div>
<table class="table table-striped">
  <thead class="thead-dark">
    <tr align="center">
      <th>Empleado</th>
      <th>En Fecha</th>
      <th>Tipo de Constancia</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($conts as $CG )
      <tr align="center" >
        <td><b>{{$CG->empleado['last_name']}}, {{$CG->empleado['name']}}</b></td>
        <td>{{$CG['fechaEmi']}}</td>
        <td>@if ($CG['typeConst']==1)Básica
              @elseif ($CG['typeConst']==2)Con Sueldo Base
              @elseif ($CG['typeConst']==3)Con Sueldo Integral
              @elseif ($CG['typeConst']==4)Para Jubilado(a) | Pensionado
              {{-- @elseif ($CG['typeConst']==5)Para Sobreviviente --}}
            @endif</td>
      </tr>
    @endforeach
  </tbody>
</table>
@if($conts->count())
  <div style="color:blue;">
    {{ $conts->links() }}    
  </div>
@endif



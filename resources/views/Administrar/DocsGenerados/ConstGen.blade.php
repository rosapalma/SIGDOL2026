<div class="display-5 text-center" >CONSTANCIAS DE TRABAJO</div>
<div  class="" style="margin-left:0; margin-right: 10%;">
<table class="table" >
  <thead class="thead-dark">
    <tr align="center">
      <th>NOMBRE</th>
      <th>EN FECHA</th>
      <th>TIPO DE CONSTANCIA</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($conts as $CG )
      <tr align="center" >
        <td><b>{{$CG->empleado['full_name']}}</b></td>
        <td>{{$CG['fechaEmi']}}</td>
        <td>@if ($CG['typeConst']==1)Básica
              @elseif ($CG['typeConst']==2)Con Sueldo Base
              @elseif ($CG['typeConst']==3)Con Sueldo Integral
              {{-- @elseif ($CG['typeConst']==4)Para Sobreviviente --}}
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
</div>




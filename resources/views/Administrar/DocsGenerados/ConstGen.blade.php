<div class="text-center">
  <label class="display-5" >
    CONSTANCIAS DE TRABAJO
  </label>
</div>
<div  class="contenedor-tabla"  style="margin-left:0; margin-right: 10%;">
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

</div>
<BR>
<div style="color:red; float: left;">
  @if($conts->count())  
    {{ $conts->links() }}   
@endif
</div>




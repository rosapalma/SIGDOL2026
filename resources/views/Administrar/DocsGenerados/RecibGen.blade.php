    <div class="text-center">
        <label class="display-5" >RECIBOS DE PAGO</label>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <tr align="center">
                <th>Empleado</th>
                <th>En fecha</th>
            </tr>
        </thead>
    <tbody>
        @foreach ($recibs as $RG )
            <tr align="center" >
                <td><b>{{$RG->empleado['full_name']}}</b></td>
                <td>{{$RG['fechaEmi']}}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    @if($recibs->count())
        <div style="color:blue;">     {{ $recibs->links() }}    </div>
    @endif


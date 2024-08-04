<html xmlns="http://www.w3.org/1999/xhtml">
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<!--     <title>Recibo de pago</title> -->
<style type="text/css">
	body{
	 background-image: url("images/fond-recibo.jpg");
	}
	table{ border: 0.5px solid  #222425; width: 100%; }
	.title{ font-weight: bold; font-size: 1.5rem; font-variant:small-caps;text-transform:uppercase;
  align-content: center;}
	.title2{ font-size: 1.5rem; margin-top: 2%; color:  #8f9294;}

	/*.celda{		height: auto;		width: 200px;	}*/
   .firma{ align-content: center; font-weight: bold; font-size: 1rem;}

        footer {

			 position: relative;
			 text-align: right;
            margin-top: 5%;
            font-size: 0.5rem;
        }

</style>
</head>

<body>

<div style="margin-top: 25%; margin-left: 12%;">
	<div align="center"  class="title">Recibo de pago</div>
	<div align="center"  class="title2">Datos Personales</div>
</div>

<div style="margin-left: 12%; display: flex;">
	<div style=" padding: 2%;">
		<small style="text-transform: uppercase;">
			<b>{{$personal->name}}&nbsp;{{$personal->last_name}}</b></small><br>
		<small><b>Cedula de Identidad:  V- {{$personal->cedula}}</b></small><br>
		<small><b>Dependencia </b> {{$spacework}}</small><br>
		<small><b>Personal </b> {{$typepers}}</small><br>
		<small><b>Cargo </b>{{$cargo}}</small><br>
		<small><b>Sueldo base:</b> <?php $monto = $salario['monto']; echo number_format($monto,2);?></small><!--acomodar seria SUELDO-->
	</div>
		<div style="margin-left: 70%" >
			<small><b>Cod. recibo:</b> <?php echo $cod; ?></small><br>
			<small><b>Año: </b><?php echo $anio ?></small>&nbsp;&nbsp;&nbsp;&nbsp;<small><b>Mes: </b>
				<?php	$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
					foreach ($meses as $key => $value) {
						$key = $key+1;	//echo $value;
						if ($mes == $key){
							echo $value;
						}
					}
				?>
			</small><br>
			<small><b>Fecha de emision:</b> <?php echo Date('d/m/Y'); ?>
		</div>


</div>

<div align="center" class="title2">Relacion de Pago</div>
<div style="margin-left: 12%;">
	<!-- ASIGNACIONES -->
	<div>
		<table style="width: 100%">
			<thead>
			<tr align="center" style="background: #7ffa7b; border: 0.5px solid  red;  ">
				<th class="">Asignacion(es)</th>
				<th style="">Monto</th>
			</tr>
			</thead>
			<tbody align="left" >   <?php $ai = 0;  $suma_asig=0;?>
				@foreach($array_asigns as $asig)
					@if($asig)
						<tr style="border: 1px solid red">
							<td ><b>{{$asig['codigo']}}</b>  {{$asig['description']}}</td>


				            <td><?php $total_asig = ($salario['monto'] * $asig['monto'])/100;
				            				 echo $total_asig?> </td>  <!--aplicando regla de tres a monto obtenido {{$asig['monto']}}-->



						</tr>
						<?php $suma =  floatval($asig['monto']);
							$ai = $ai+1;
							$suma_asig = $suma_asig + $total_asig;
						?>
					@endif
				@endforeach
			   	<tr style="background:  #d0f8a0 ;">
			        <td align="center">Nª.  <b><?php echo $ai; ?></b></td>
			        <td><b><?php echo 'Total:'.$suma_asig; ?></b></td>
			    </tr>
		 	</tbody>
		</table>
	</div>

	<!-- DEDUCCIONES -->
	<div>
		<table style="">
			<thead class="thead-dark">
			<tr align="center" style="background:#d8d543">
				<th>Deducion(es)</th>
				<th style="">Monto</th>
			</tr>
			</thead>
			<tbody align="left" >   <?php $ai = 0;  $suma_deduc=0;?>
				@foreach($array_deducns as $deduc)
					@if($deduc)
						<tr>
							<td><b>{{$deduc['codigo']}}</b>  {{$deduc['description']}}</td>
				            <td> <?php $total_deduc = ($salario['monto'] * $deduc['monto'])/100; echo $total_deduc;?> </td>  <!--aplicando regla de tres a monto obtenido {{$asig['monto']}}-->
						</tr>
						<?php
							$suma =  floatval($deduc['monto']);
							$ai = $ai+1;
							$suma_deduc = $suma_deduc + $total_deduc;
						?>
					@endif
				@endforeach
		 		<tr style="background:  #fbf295 ">
			        <td align="center">Nª.  <b><?php echo $ai; ?></b></td>
			        <td><b><?php echo 'Total:'.$suma_deduc; ?></b></td>
			    </tr>
		 	</tbody>
		</table>
	</div>

	<!-- CALCULO DE QNAs -->
		<?php $salario_base =  floatval($salario['monto']);
			$neto = $salario_base + $suma_asig - $suma_deduc;
			$qna1 = $neto / 2;
			$qna2 = $neto / 2;
		?>
	<!-- QUINCENAS  -->
	<div align="center" style="background:    #63b4f3; margin-top:2%; margin-left: 10%; margin-right: 10%; width: 70%;">
		<DIV>Total a pagar: <?php echo $neto; ?></DIV>
	    <label style="padding-right: 10%">Primera quincena: <?php echo $qna1; ?></label>
	    <label>Segunda quincena: <?php echo $qna2; ?></label>
	</div>
</div>


<p style="font-size: 0.8rem; color: #6b6867" align="center">* Este documento es de caracter informativo. Para fines legales debe ser autenticado por la Unidad de Personal </p>

	<div class="firma" align="center" style="margin-top: 10%">
		{{$jeve}}
		<p>Jefe de la Unidad de Personal</p>
	</div>


</div>
	<footer>
			 <p><?php echo $direc;  ?></p>
		 		  <p>{{$phone}}</p>
		</footer>

</body>
</html>

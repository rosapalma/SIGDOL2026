<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contancia de trabajo</title>

</head>


<style type="text/css">
	body{background-image: url("images/Backs/docs/fond.jpg");}
	.title{ font-weight: bold; font-size: 1.5rem; letter-spacing: 1px; font-variant:small-caps;text-transform:uppercase;align-content: center;}
	/*.clasdiv {margin-left: 3%; margin-right: 2.5%;}*/
	.firma{ align-content: center; font-weight: bold; font-size: 1rem;}
    footer {position: relative; text-align: right; margin-top: 20%; font-size: 0.5rem; }
    .text-bold{  font-weight: bold;        	}
    .text-uppercase{ text-transform: uppercase; }
    .text-mute{ color:  #c3b9b7; }
</style>

<body>
    <section>
		<div style="margin-top: 25%;">
			<p class="title" align="center">
				@if ($condicion->id == 1 || $condicion->id == 2)
					CONSTANCIA DE TRABAJO
				@else
					CONSTANCIA
				@endif
			</p>

            <p style="margin-top: 8%; margin-left: 12%; text-align: justify-all;">
				&nbsp;&nbsp;&nbsp;Quien suscribe, Jefe de la Unidad de Personal del Instituto
				Pedagógico de Maturín "Antonio Lira Alcalá", hace constar por medio de la
				presente que el(la) ciudadano(a) <b class="text-bold text-uppercase">
					{{$personal->full_name}}</b>,
					cédula de Identidad <b class="text-bold upercase">V-{{$personal->cedula}}</b>.

				@if ($condicion->id == 1)  <!--ACTIVO -->
					Labora
				@elseif ($condicion->id == 2)  <!-- CONTRATADO-->
					@if ($statudContrato)
						Labora, en condicion CONTRATADO(A)
					@else
						Laboró, en condicion DE CONTRATADO(A)
					@endif
				@elseif ($condicion->id == 3 || $condicion->id == 4 || $condicion->id == 5 )  <!--JUBILADO, PENSIONADA O SOBREVIVIENTE -->
					Laboró
				@endif
				en este instituto como miembro del personal <b>{{$typepers}}.</b>
				Desempeñando el cargo de <b class="text-bold text-uppercase">{{$cargo}}</b>.
                @if ($personal->jerarquia)
                Actualmente delega funciones como <b class="text-bold text-uppercase">{{$personal->jerarquia}}.</b><br>
				@endif
				Ingresando en fecha <b>{{$personal->fec_ing}}</b>
				@if($personal->fec_egre)
				, hasta <b>{{$personal->fec_egre}}</b>
				@endif
				.
				@if ($tipoConst == 2) <!-- con sueldo base -->
					<?php $sueldo = $sueldo['salario_base'];?>
					Devengando un sueldo mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo  '(Bs. '.number_format($sueldo,2).').';?>
				@endif
				@if ($tipoConst == 3)  <!-- con sueldo integral -->
                    <?php $sueldo = $sueldo['salario_integral'];?>
					Con una remuneración mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo ' (Bs. '.number_format($sueldo,2).').'; ?>
				@endif

				<br><br>
				@if ($tiemp)
					<b>TIEMPO DE SERVICIO:
					<?php printf('%d año(s), %d mes(es) y %d día(s)', $tiemp->y, $tiemp->m, $tiemp->d);?>
                    </b>
				@endif


				<br><br>
				<?php setlocale(LC_TIME, 'es_ES.UTF-8');		//DEBERIA IMPRIMIR MES EN ESPAÑOL
					echo 'Constancia que se expide a solicitud de la parte interesada en '.$sedeEmp->city.' a los '.strftime(" %d dias del mes de %B del %Y." ).'<br/>';
				?>

			</p>
		</div>
    
		<div class="firma" align="center" style="margin-top: 20%">
			{{-- <hr style="width: 30%"> --}}
			<span style="text-transform:uppercase">{{ $autoridad }}</span><br>
			<span style="">Jefe de la Unidad de Personal</span>
		</div>
        @if ($tipoConst == 5)
		<div style="margin-top: 8%; margin-left: 18%; text-align: justify-all;">
			<p><b>Beneficiarios</b></p>
			@foreach($beneficiarios as $bene)
				<li>{{$bene->name}}{{$bene->last_name}}, cedula: {{$bene->cedula}} </li>
			@endforeach
		</div>
		@endif
            <footer>
                <p><?php echo $sedeEmp->direc;  ?></p>
                <p>{{$sedeEmp->phone}}</p>
            </footer>
    </section>
</body>
</html>


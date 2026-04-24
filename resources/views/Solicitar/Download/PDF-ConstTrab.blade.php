<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contancia de trabajo</title>

</head>


<style type="text/css">
html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}
header {
  background-image: url("images/backs/docs/arriba.png");
  background-repeat: no-repeat;
  width: 100%; 
  height: 15%;
  margin: 0;
}
   

#page-container {
  /*position: relative;*/
  /*min-height: 100vh;*/
}

#content-wrap {
  padding-bottom: 0.5rem;    /* altura de pie de página */
  
}

th,td{
  text-align: left;
  padding: 3px;
}
.div-table{
	margin-left: 5%;
 	margin-right: 5%;
 	margin-top: 0;
}
 table {

  border: 0.5px solid black;
  border-collapse: collapse ;
}

footer {
  background-image: url("images/backs/docs/abajo.png");
  background-repeat: no-repeat; 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 15%; 
  margin-top: auto;  
}
/*#firma{  
	background-image: url("images/backs/docs/firma.png");
  background-repeat: no-repeat;
  margin-left: 30%;
  margin-top: 5%;
  width: 100%;
  height: 15%;
  }*/

	.title{ 
		font-weight: bold; 
		font-size: 1.5rem; 
		letter-spacing: 1px;
		font-variant:small-caps;
		text-transform:uppercase;
		align-content: center;
	}
	.content{
		margin-top: 5%; 
		margin-left: 5%; 
		text-align: justify;
	}
  .text-bold{  
  	font-weight: bold;        	
  }
  .text-uppercase{ 
  	text-transform: uppercase; 
  }
  .text-mute{ 
  	color:  #c3b9b7; 
  }
</style>

<body>
	<header></header>
  <div id="page-container"> 
      
   <div id="content-wrap">
    	
		<p class="title" align="center" ><BR>
		@if($tipoConst <=3)
				CONSTANCIA DE TRABAJO
		@else
			CONSTANCIA
		@endif
		</p>

    <p class="content">
			&nbsp;&nbsp;Quien suscribe, Jefe de la Unidad de Personal del Instituto Pedagógico de Maturín "Antonio Lira Alcalá", hace constar por medio de la	presente que el(la) ciudadano(a) <b class="text-bold text-uppercase">{{$personal->full_name}}</b>,	cédula de Identidad <b class="text-bold upercase">V-{{$personal->cedula}}</b>.
				@if ($condicion->id == 1)  <!--ACTIVO -->
					Labora
				@elseif ($condicion->id == 2)  <!-- CONTRATADO-->
					@if ($statudContrato)
						Labora, en condicion CONTRATADO(A)
					@else
						Laboró, en condicion DE CONTRATADO(A)
					@endif
				@elseif ($condicion->id == 3 || $condicion->id == 4) <!--JUB-PENS-->
					Laboró
				@endif
				en este instituto como miembro del personal <b class="text-bold text-uppercase">{{$typepers}}</b>
				@if ($typepersid == 1)
					<b class="text-bold text-uppercase">{{$dedicacion}}</b>
				@else
					. Desempeñando el cargo de <b class="text-bold text-uppercase">{{$cargo}}.</b>
				@endif
        @if ($personal->jerarquia)
        	Con funciones de<b class="text-bold text-uppercase">{{$personal->jerarquia}}.</b>
				@endif
				<!-- INGESO Y EGRESO -->
				@if($personal->fec_egre)
				  Ingresando en esta institucion, en fecha <b>{{$personal->fec_ing}}</b>, hasta <b>{{$personal->fec_egre}}.</b>
				@else
					Ingresando en esta institucion, en fecha <b>{{$personal->fec_ing}}</b>.
				@endif
				
				<!-- SUELDO BASE & INTG -->
				@if ($tipoConst == 2) <!-- con sueldo base -->
					<?php $sueldo = $sueldo['salario_basico'];?>
					Devengando un sueldo mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo  '(Bs. '.number_format($sueldo,2).').';?>
				@endif
				@if ($tipoConst >= 3)  <!-- con sueldo integral -->
                    <?php $sueldo = $sueldo['salario_integral'];?>
					Con una remuneración mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo ' (Bs. '.number_format($sueldo,2).').'; ?>
				@endif
				<br>
				<!-- TIEMPO DE SERVICIO -->
				@if ($tiemp)
					<br><b>TIEMPO DE SERVICIO:
					<?php printf('%d año(s), %d mes(es)', $tiemp->y, $tiemp->m);?></b>
				@endif
				<!--SOBREVIVIENTE-->
				@if ($tipoConst == 5 ) 
				<br>
				<div class="div-table">
				<small class="text-bold text-uppercase" style="padding: 0"> BENEFICIARIO(S)</small>
						<table>
							<thead>
								<tr>
									<th>Cedula</th>
									<th>Nombre Y Apellido</th>
									<th>Fecha Nac.</th>
									<th>Porcentaje '%'</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($beneficiarios as $bene)
									<tr>
										<td>{{$bene->cedula}}</td>
										<td>{{$bene->full_name}}</td>
										<td>{{$bene->fec_nac}}</td>
										<td style=" text-align: center;">{{$bene->porcentaje}}%</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@endif
				<!-- FECHAS DE EMISION -->
				<br><br>
				<?php setlocale(LC_TIME, 'es_ES.UTF-8');		//DEBERIA IMPRIMIR MES EN ESPAÑOL
					echo 'Constancia que se expide a solicitud de la parte interesada en '.$sedeEmp->city.' a los '.strftime(" %d dias del mes de %B del %Y." );
				?>
      </p>
			
	</div>
   

 </div>
 <!-- AUTENTICACION -->
      <div align="center">
        <p><img src="storage/autenticaciones/<?php echo $autentication; ?>"></p>
        <span  style="text-transform:uppercase">{{ $autoridadName }}</span><br>
        <span style="">Jefe de la Unidad de Personal</span>
    </div>
    <footer></footer>
</body>
</html>


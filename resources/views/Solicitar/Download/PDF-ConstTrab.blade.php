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


footer {
  background-image: url("images/backs/docs/abajo.png");
  background-repeat: no-repeat; 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 15%; 
  margin-top: auto;  
}
#firma{  
	background-image: url("images/backs/docs/firma.png");
  background-repeat: no-repeat;
  margin-left: 30%;
  margin-top: 5%;
  width: 100%;
  height: 15%;
  }

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
			@if ($condicion->id == 1 || $condicion->id == 2)
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
				en este instituto como miembro del personal <b>{{$typepers}}</b>
				@if ($typepersid == 1)
					<b class="text-bold text-uppercase">{{$dedicacion}}</b>
				@else
					. Desempeñando el cargo de <b class="text-bold text-uppercase">{{$cargo}}.</b>
				@endif
        @if (($personal->jerarquia) && ($personal->fec_egre))
        	Con funciones como <b class="text-bold text-uppercase">{{$personal->jerarquia}}.</b><br>
        @else
            Actualmente delega funciones como <b class="text-bold text-uppercase">{{$personal->jerarquia}}.</b><br>
				@endif
				<!-- INGESO Y EGRESO -->
				@if($personal->fec_egre)
				  Ingresando en esta institucion, en fecha <b>{{$personal->fec_ing}},</b>hasta <b>{{$personal->fec_egre}}.</b>
				@else
					Ingresando en esta institucion, en fecha <b>{{$personal->fec_ing}}.
				@endif
				
				<!-- SUELDO BASE & INTG -->
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
				<br>
				<!-- TIEMPO DE SERVICIO -->
				@if ($tiemp)
					<b>TIEMPO DE SERVICIO:
					<?php printf('%d año(s), %d mes(es)', $tiemp->y, $tiemp->m);?></b>
				@endif
				<!-- FECHAS DE EMISION -->
				<br><br>
				<?php setlocale(LC_TIME, 'es_ES.UTF-8');		//DEBERIA IMPRIMIR MES EN ESPAÑOL
					echo 'Constancia que se expide a solicitud de la parte interesada en '.$sedeEmp->city.' a los '.strftime(" %d dias del mes de %B del %Y." ).'<br/>';
				?>
      </p>
			
	</div>
   

 </div>
  <div id="firma"></div>
     <div align="center">
			{{-- <hr style="width: 30%"> --}}
			<span style="text-transform:uppercase">{{ $autoridad }}</span><br>
	 		<span style="">Jefe de la Unidad de Personal</span>
	 	</div>
  <footer></footer>
</body>
</html>


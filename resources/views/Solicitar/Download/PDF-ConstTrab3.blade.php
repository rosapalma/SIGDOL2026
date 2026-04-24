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
			&nbsp;&nbsp;Quien suscribe, Jefe de la Unidad de Talento Humano del Instituto Pedagógico de Maturín, Nucleo de la Universidad Pedagógica Experimental Libertado, hago constar por medio de la	presente que el(la) ciudadano(a) <b class="text-bold text-uppercase">{{$personal->full_name}}</b>, titula de la cédula de identidad <b class="text-bold upercase">V-{{$personal->cedula}}</b> es miembro del Personal 
			<b>{{$typepers}}&nbsp;{{$condicion->name}}</b> de esta Universidad, con
			@if ($condicion->id == 1 || $condicion->id == 2)
				el cargo de <b class="text-bold text-uppercase">{{$cargo}}, </b>
			@else
				la Categoria de <b class="text-bold text-uppercase"> TITULAR A {{$dedicacion}} </b>
			@endif  
			<!-- SUELDO BASE & INTG -->
			@if ($tipoConst == 2) <!-- con sueldo base -->
				<?php $sueldo = $sueldo['salario_basico'];?>
				con un Sueldo Mensual de
				<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
				<?php echo  '(Bs. '.number_format($sueldo,2).').';?>
			@endif
			<!-- con sueldo integral -->
			<?php var_dump($tipoConst); ?>
		<!-- 	@if ($tipoConst != 1 && $tipoConst != 2)  
                    <?php $sueldo = $sueldo['salario_integral'];?>
					con un Sueldo Integral Mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo ' (Bs. '.number_format($sueldo,2).').'; ?>
				@endif -->



				<!-- INGESO Y EGRESO -->
				@if($personal->fec_egre)
				  Ingresó en esta institucion, el <b>{{$personal->fec_ing}}</b>, hasta <b>{{$personal->fec_egre}}</b>.
				@else
					Ingresó en esta institucion, el <b>{{$personal->fec_ing}}</b>.
				@endif		
				<br>
		
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
        <b><span  style="text-transform:uppercase">{{ $autoridadName }}</span><br>
        <span style="">JEFE DE LA UNIDAD DE TALENTO HUMANO</span></b>
    </div>
    <footer></footer>
</body>
</html>


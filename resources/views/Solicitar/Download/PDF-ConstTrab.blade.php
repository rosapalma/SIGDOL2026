<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contancia de trabajo</title>

</head>


<style type="text/css">
/*html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}*/
/*header {
  background-image: url("images/backs/docs/arriba.png");
  background-repeat: no-repeat;
  width: 100%; 
  height: 15%;
  margin: 0;
}*/
      @page {
        margin: 100px 25px; /* Margen superior e inferior para dejar espacio al header/footer */
    }

    header {
    	  background-image: url("images/backs/docs/arriba.png");
    	  background-repeat: no-repeat;
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 15%;
        text-align: center;
    }

    footer {
    	 	background-image: url("images/backs/docs/abajo.png");
  			background-repeat: no-repeat; 
        position: fixed; 
        bottom: -40px; 
        left: 0px; 
        right: 0px;
        height: 15%; 
        text-align: center;
        line-height: 35px;
    } 

#page-container {
  /*position: relative;*/
  /*min-height: 100vh;*/
}

#content-wrap {
  padding-bottom: 0.5rem;    /* altura de pie de página */
  
}

th,td{
  text-align: center;
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

/*footer {
  background-image: url("images/backs/docs/abajo.png");
  background-repeat: no-repeat; 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 15%; 
  margin-top: auto;  
}*/
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
		padding-top: 5%;
	}
	.content{
		margin-top: 10%; 
		margin-left: 5%; 
		margin-right: 5%;
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

    <footer></footer>
<main>

<div id="page-container">       
  <div id="content-wrap">    	
		<p class="title" align="center" ><BR><br>
			@if ($tipoConst == 5)
				CONSTANCIA
			@else
				@if($personal->fec_egre)
						CONSTANCIA
				@else
					CONSTANCIA DE TRABAJO
				@endif
			@endif

		</p>
    <p class="content">
			&nbsp;&nbsp;&nbsp;&nbsp;Quien suscribe, Jefe de la Unidad de Talento Humano del Instituto Pedagógico de Maturín, Núcleo de la Universidad Pedagógica Experimental Libertador, hago constar por medio de la presente que el(la) ciudadano(a) <b class="text-bold text-uppercase">{{$personal->full_name}}</b>, titular de la	cédula de identidad <b class="text-bold upercase">V-{{$personal->cedula}}</b> es miembro del Personal <b class="text-bold text-uppercase">{{$typepers}}</b>
		<!--VALIDAR QUE CONDICION LABORAL ESTE VACIA O NO X ACA VOY-->
			@if ($condicion)
				<b class="text-bold text-uppercase"> {{$condicion->name}} </b>
			@endif
			de esta Universidad,
			@if ($typepersid == 1)
				con la Categoria de <b class="text-bold text-uppercase">{{$personal->categoria}} a {{$personal->dedication}}</b>	
			@else <!--COMO SERIA EN CASO DE UN JUBILADO -->
				desempeñando el cargo de <b class="text-bold text-uppercase">{{$cargo}}.</b>
			@endif  
						
      @if ($personal->jerarquia)
        	 Con funciones de <b class="text-bold text-uppercase">{{$personal->jerarquia}}.</b>
			@endif
				<!-- INGESO Y EGRESO -->			
				   Ingresando en esta institucion en fecha <b>{{$personal->fec_ing}}</b>	
				  @if($personal->fec_egre)
				  	al <b>{{$personal->fec_egre}}</b>
				  @endif
				@if ($tipoConst == 5)
				  Quedando como sobreviviente <b class="text-bold text-uppercase">{{$sobrev->full_name}}</b> titular de la cedula de identidad <b class="text-bold text-uppercase"> V-{{$sobrev->cedula}}</b>, devengando una Pension de Sobreviviente del {{$sobrev->porcentaje}}% de 
				  <?php $sueldo = $sobrev['total_pension'];?> 
				  <small class="text-bold text-uppercase">{{ $ALetras }}</small>
					<?php echo  '(Bs. '.number_format($sueldo,2).').';?> 

					@if ($sobrev->fec_pension)
 						Fecha de pension {{$sobrev->fec_pension}}.
 					@endif
				
				@endif
				<!-- SUELDO BASE & INTG -->
				@if ($tipoConst == 2) <!-- con sueldo base -->
					<?php $sueldo = $sueldo['salario_basico'];?>
					. Devengando un sueldo mensual de
					<small class="text-bold text-uppercase">{{ $ALetras }}</small>
					<?php echo  '(Bs. '.number_format($sueldo,2).').';?>. 
				@endif
				@if ($tipoConst == 3)  <!-- con sueldo integral -->
                    <?php $sueldo = $sueldo['salario_integral'];?>
					 Con una remuneración mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo ' (Bs. '.number_format($sueldo,2).').'; ?>
				@endif
				@if ($tipoConst == 4)  <!-- con sueldo integral -->
                    <?php $sueldo = $sueldo['salario_integral'];?>
					 Con una remuneración mensual de
					<small class="text-bold text-uppercase"> {{ $ALetras }}</small>
					<?php echo ' (Bs. '.number_format($sueldo,2).').'; ?>
				@endif
				<!-- TIEMPO DE SERVICIO -->
				@if($tiemp > 0)
					<br><br><b>TIEMPO DE SERVICIO: {{$tiemp}} años.</b>
				@endif
				<!-- FECHAS DE EMISION -->
				<br><br><br>
				<p style="margin-left: 5%;margin-right: 5%;"> Constancia que se expide a solicitud de la parte interesada en 
				<?php setlocale(LC_TIME, 'es_ES.UTF-8');		//DEBERIA IMPRIMIR MES EN ESPAÑOL
					echo $sedeEmp->city.' a los '.strftime(" %d dias del mes de %B del %Y." );
				?></p>
      </p>
			
	</div>
   

 </div>
 <!-- AUTENTICACION -->
      <div align="center">
        <p><img src="storage/autenticaciones/<?php echo $autentication; ?>"></p>
        <span  style="text-transform:uppercase">{{ $autoridadName }}</span><br>
        <span style="">Jefe de Unidad de Talento Humano</span>
   		</div>
</main>

    <script type="text/php">
    if ( isset($pdf) ) {
        // Obtener el objeto fontMetrics
        $font = $fontMetrics->get_font("Arial", "Helvetica", "normal");        
        // Configurar el tamaño de la fuente
        $size = 10;
        $pageText = 'Página {PAGE_NUM} de {PAGE_COUNT}';
        
        // Definir posición: x=500, y=800 (ajustar según el pie de página)
        $pdf->page_text(500, 800, $pageText, $font, $size, array(0,0,0));
    }
</script>
</body>
</html>


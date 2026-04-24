<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale.0">
        <meta http-equiv="X-UA-Compatible" content="ie+edge">
        <title>PRUEBA</title>
	</head>
<body>
	@for($i=0; $i<50; $i++)
	   	<p>
	   		{{ $fake->text(rand(100,500))}}
	   	</p>
    @endfor 

    
	<script type="text/php">
	if (isset($pdf)) {
	    $font = $fontMetrics->getFont("helvetica", "bold");
	    // Asegúrate de pasar al menos 5 argumentos: x, y, texto, fuente, tamaño
	    $pdf->page_text(520, 820, "Página {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0));
	}
	</script>

    

    </body>
</html>




<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale.0">
        <meta http-equiv="X-UA-Compatible" content="ie+edge">
        <title>PRUEBA</title>
	</head>
	evitar pagina en blanco dompdf laravel
Para evitar que Dompdf genere páginas en blanco al final o entre secciones de tu PDF en Laravel, el problema suele estar relacionado con el manejo de márgenes, elementos flotantes o saltos de página forzados en el CSS.
1. Controlar saltos de página automáticos
Si tienes elementos grandes (como tablas o contenedores div) que fuerzan una nueva página innecesariamente, usa la propiedad page-break-inside.

    Evitar saltos dentro de un elemento: Aplica esto a filas de tablas o secciones que no deben dividirse, ya que Dompdf a veces crea una página nueva si el elemento no cabe "perfectamente" en el espacio restante.
    css

    .evitar-salto {
        page-break-inside: avoid;
    }

    Usa el código con precaución.
     
    Forzar saltos solo cuando sea necesario: Evita usar page-break-after: always; en el último elemento de un bucle, ya que esto siempre añadirá una página en blanco al final. 

2. Ajustar márgenes y dimensiones
Una de las causas más comunes de una página en blanco final es que el contenido roza el límite del margen inferior definido en @page.

    Asegúrate de que el margen del cuerpo sea menor que el margen de la página.
    Evita usar height: 100%; en el selector body o html, ya que Dompdf puede interpretar esto como un desbordamiento hacia la siguiente página.

3. Eliminar espacios en blanco en el HTML
Dompdf procesa los espacios y saltos de línea literales en tu archivo Blade.

    Asegúrate de que no haya etiquetas <div> vacías o múltiples saltos de línea (<br>) al final de tu documento.
    En tu controlador, asegúrate de que no estás enviando caracteres accidentales (como un echo o un espacio antes del return $pdf->stream()), ya que esto corrompe la salida y puede generar hojas vacías. 

4. Configuración en Laravel
Si el problema persiste al usar tablas largas, puedes intentar publicar y ajustar la configuración de Barryvdh\DomPDF:

    Ejecuta php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider".
    En config/dompdf.php, revisa que la opción enable_php esté en false si no la usas, y verifica el tamaño de papel predeterminado (paper => 'letter' o 'a4'). 

¿El problema ocurre específicamente al final del documento o después de una tabla larga? Esto me ayudaría a darte el código CSS exacto para corregirlo.

    Problema de salto de página de Dompdf - Laracasts
    Traducido — Tras una búsqueda rápida, encontré esta respuesta. El uso de page-break-inside: auto; básicamente le indica a dompdf que "haga lo ...
    Laracasts
    Laravel DomPDF: Cómo agregar números de página
    Traducido — Globalmente, se puede configurar en config/dompdf.php estableciendo options.enable_php en true . config/dompdf.php : devolver [. /
    Laravel Daily
    Uso de DOMPDF para generar PDF con PHP, HTML y CSS
    14 sept. 2014 — que tal amigo fijate que yo cree una archivo php para que me genere un reporte en pdf lo genera y todo pero al abrirlo me dice que...
    oscargascon.es

Mostrar todo
enviar foter siempre al final
Para lograr que el footer se mantenga siempre en la parte inferior de cada página (o de la última) en Dompdf, el método más fiable es usar posicionamiento fijo y definir los márgenes del documento correctamente.
Aquí tienes la estructura recomendada para tu archivo Blade:
1. Definir el CSS
Dompdf trata los elementos con position: fixed como elementos que se repiten en todas las páginas.
html

<style>
    @page {
        margin: 100px 25px; /* Margen superior e inferior para dejar espacio al header/footer */
    }

    header {
        position: fixed;
        top: -60px;
        left: 0px;
        right: 0px;
        height: 50px;
        text-align: center;
    }

    footer {
        position: fixed; 
        bottom: -60px; 
        left: 0px; 
        right: 0px;
        height: 50px; 
        text-align: center;
        line-height: 35px;
    }
</style>

<body>

	<header>
    <!-- Tu encabezado aquí -->
</header>

<footer>
    Copyright © {{ date('Y') }} - Mi Empresa
</footer>

<main>
    <!-- Todo el contenido de tu PDF -->
    <div class="content">
        <p>Párrafos, tablas y demás información...</p>
    </div>
</main>


    
	<script type="text/php">
	if (isset($pdf)) {
	    $font = $fontMetrics->getFont("helvetica", "bold");
	    // Asegúrate de pasar al menos 5 argumentos: x, y, texto, fuente, tamaño
	    $pdf->page_text(520, 820, "Página {PAGE_NUM} de {PAGE_COUNT}", $font, 10, array(0,0,0));
	}
	</script>

    

    </body>
</html>




<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>pruebas</title>
    </head>
    <body>
    <h1>vista DataTime</h1>
       <?php $trialExpires = now()->addDays(30);
            echo $trialExpires;
           // $fechaEmi= 2024-09-03;
             //$fe now()->subDays(30))->paginate(10); // POR LOS ULTIMOS 30 DIAS
           //$conts = ConstG::whereBetween('fechaEmi', [now()->subDays(60), today()])->paginate(10); // ultimos  60 dias hasta fecha actual
          // $conts = ConstG::whereMonth('fechaEmi', now()->month(5))->paginate(10); // filtrar por mes
          //$conts = ConstG::whereYear('fechaEmi', now()->year(2021))->paginate(10); // filtrar por año
          //$conts = ConstG::whereMonth('fechaEmi', now()->month)->whereYear('fechaEmi', now()->year)->paginate(10); // x mes y año
        $dt= Carbon::create(2012, 1, 31, 0);
        echo $dt->addYears(5);
    ?>

    </body>
</html>
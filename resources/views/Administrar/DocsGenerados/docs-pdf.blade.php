<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
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

    footer {
  background-image: url("images/backs/docs/abajo.png");
  background-repeat: no-repeat; 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 15%; 
  margin-top: auto;  
}

	.title{ font-weight: bold; 
      font-size: 1.5rem; 
      letter-spacing: 1px;
      font-variant:small-caps;
      text-transform:uppercase; 
      align-content: center;
   }

  
/*   #firma{  
     background-image: url("images/backs/docs/firma.png");
     background-repeat: no-repeat;
     margin-left: 50%;
     margin-top: 10%;
     width: 100%;
     height: 20%;
     }*/
   .text-bold{  
      font-weight: bold;        	
   }
   .text-uppercase{ 
      text-transform: uppercase; 
   }
   .text-mute{ 
      color:  #c3b9b7; 
   }
   table{ 
      border: 0.5px solid  #222425; 
      border-spacing: 0; 
      width: 90%; 
      margin-left: 12%;  
   }
   th, td {  
      white-space: nowrap; 
      text-align: left;
      vertical-align: top; 
      border: 1px solid #000; 
      border-spacing: 0; 
   }
   th{ background-color: dimgray; 
      text-align: center;
   }
</style>
<body>
   <header></header>
   <section  style="margin-top: 0; ">
      <div align="center">
         <p class="title" >
            @if ($list== 1)
               CONSTANCIAS DE TRABAJO
            @else
               RECIBOS DE PAGO
            @endif
         </p>
         <p  class="title2">Generados(as) por <B>SIGDOL</B></p>

      </div>
   <section>
   <section styles="">
      <div >
      @if($list == 1)
         <table>
            <thead>
               <tr align="center">
                  <th>Nª</th>
                  <th>Empleado</th>
                  <th>Fecha de Emi.</th>
                  <th>Tipo de Const.</th>
               </tr>
            </thead>
            <tbody>
               <?php $nro= 0; ?>
               @foreach ($ExpConsul as $CG )
               <?php $nro = $nro + 1; ?>
               <tr <?php if ($nro % 2 == 0){ echo $nro; ?> style="background-color: #dfd3d1" <?php } ?>>
                  <td style="width: 5%;text-align: center;"><?php echo $nro; ?></td>
                  <td>{{$CG->empleado['full_name']}}</td>
                  <td>{{$CG['fechaEmi']}}</td>
                  <td>
                     @if ($CG['typeConst']==1)Básica
                     @elseif ($CG['typeConst']==2)Con Sueldo Base
                     @elseif ($CG['typeConst']==3)Con Sueldo Integral
                     {{-- @elseif ($CG['typeConst']==4)Para Sobreviviente --}}
                     @endif
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         @else
            <table>
            <thead>
               <tr align="center">
                  <th>Nª</th>
                  <th>Empleado</th>
                  <th>Fecha de Emi.</th>
               </tr>
            </thead>
            <tbody>
               <?php $nro= 0; ?>
               @foreach ($ExpConsul as $CG )
               <?php $nro = $nro + 1; ?>
               <tr <?php if ($nro % 2 == 0){ echo $nro; ?> style="background-color: #dfd3d1" <?php } ?>>
                  <td style="width: 5%;text-align: center;"><?php echo $nro; ?></td>
                  <td>{{$CG->empleado['last_name']}}&nbsp;&nbsp;{{$CG->empleado['name']}}</td>
                  <td>{{$CG['fechaEmi']}}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      @endif
      </div>
   </section>
 <!-- AUTENTICACION -->
      <div align="center">
        <p><img src="storage/autenticaciones/<?php echo $autentication; ?>"></p>
        <span  style="text-transform:uppercase">{{ $autoridadName }}</span><br>
        <span style="">Jefe de la Unidad de Personal</span>
    </div>
    <footer></footer>
</body>
</html>











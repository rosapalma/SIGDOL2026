<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<style type="text/css">
	body{ background-image: url("images/Backs/docs/fond-simple.jpg");	}
	.title{ font-weight: bold; font-size: 1.5rem; letter-spacing: 1px; font-variant:small-caps;text-transform:uppercase; align-content: center;}
	/*.clasdiv {margin-left: 3%; margin-right: 2.5%;}*/
	.firma{ align-content: center; font-weight: bold; font-size: 1rem;}
   .text-bold{  font-weight: bold;        	}
   .text-uppercase{ text-transform: uppercase; }
   .text-mute{ color:  #c3b9b7; }
   /* table { border-collapse: collapse; border-color: black 1px solid;  margin-left: 20%; border-spacing: 10px 5px;} */
   /* table#space {  border-collapse: separate; border-spacing: 10px 5px; } */
   table{ border: 0.5px solid  #222425; border-spacing: 0; width: 90%; margin-left: 12%;  }
   th, td {  white-space: nowrap; text-align: left;vertical-align: top; border: 1px solid #000; border-spacing: 0; }
   th{ background-color: dimgray; text-align: center;}
</style>
<body>
   <section  style="margin-top: 20%; ">
      <div>
         <p class="title" align="center">
            @if ($list== 1)
               CONSTANCIAS DE TRABAJO
            @else
               RECIBOS DE PAGO
            @endif
         </p>
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
                  <td>{{$CG->empleado['last_name']}}&nbsp;&nbsp;{{$CG->empleado['name']}}</td>
                  <td>{{$CG['fechaEmi']}}</td>
                  <td>
                     @if ($CG['typeConst']==1)Básica
                     @elseif ($CG['typeConst']==2)Con Sueldo Base
                     @elseif ($CG['typeConst']==3)Con Sueldo Integral
                     {{-- @elseif ($CG['typeConst']==4)Para Jubilado(a) | Pensionado --}}
                     @elseif ($CG['typeConst']==5)Para Sobreviviente
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

<h1></h1>
</body>
</html>











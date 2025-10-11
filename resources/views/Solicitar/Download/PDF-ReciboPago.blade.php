<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Recibo de pago</title>
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
            #firma{  
              background-image: url("images/backs/docs/firma.png");
              background-repeat: no-repeat;
              margin-left: 30%;
              margin-top: 2%;
              width: 100%;
              height: 20%;
              }

            table{ 
                border: 0.5px solid  #222425; 
                width: 100%;
                }
            tr td{
                font-weight: bold;
                font-size: 0.7rem;
            }
            th{
                font-weight: bold;
                font-size: 0.8rem;
            }
            .title{
                font-weight: bold; 
                font-size: 1.5rem; 
                font-variant:small-caps;
                text-transform:uppercase;
                align-content: center;
            }
            .title2{ 
                font-size: 1.5rem; 
                color:  #8f9294;
                margin-top: 0;
            }
            .bonif{
                font-weight:bold;
                font-size: 0.9rem;
            }
            .bonif-2{
                font-weight:bold;
                font-size: 0.8rem;
            }
            .contenedor-grid {
                  line-height: 0.2;
                  font-weight: bold;
                  font-size: 1rem;
                }
        </style>
    </head>
<body>
    <header></header>
    <div>
        <div align="center"  class="title">Recibo de pago</div>
        <div align="center"  class="title2">Datos Personales | Laborales</div>
    </div>
    <!-- DATOS PERSONALE & LABORALES -->
    <div class="contenedor-grid" >
            <p style="text-transform: uppercase;">{{$personal->full_name}}</p>
            <p><b>Cédula de Identidad:  {{$personal->cedula}}</b></p>
            <p>Tipo de Personal: &nbsp;{{$typepers}}</p>            
            <P style="text-wrap: balance;">Cargo:&nbsp;{{$cargo}}</P>
            <p style="">Año: <?php echo $arraynomina['anio']; ?> &nbsp;&nbsp;&nbsp;<b>Mes: </b>
                <?php   $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    foreach ($meses as $key => $value) {
                        $key = $key+1;
                        if ($arraynomina['mes'] == $key){   echo $value;}
                    }
                ?>
            </p>
            <p style="">Fecha de emisión: <?php echo $fechaAct; ?></p>
            <p style="">Cod. recibo: <?php echo $cod; ?></p>		
    </div>

    <p align="center" class="title2">Relación de Pago</p>
    <div style="margin-left:5%; margin-right: 5%; margin-top: 0;">
    	<!-- ASIGNACIONES -->
        <div>
            <table style="width: 100%" ><?php $Ttasign=0; ?>
    			<thead>
    			<tr style="background: #7ffa7b; border: 0.5px solid  red;  ">
    				<th class="">Asignacion(es)</th>
                    <th class="">Monto</th>
    			</tr>
    			</thead>
                <tbody align="left" >     {{-- GENERA NUMERO DE 3 DIGITOR --}}
                    <tr>
                        <td><b><?php $number=1; $length = 3; $string = substr(str_repeat(0, $length).$number, - $length);
                        echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Salario Básico </td>
                        <td><?php  echo number_format($arraynomina['salario_basico'],2); $Ttasign = $arraynomina['salario_basico'] + $Ttasign;?></td>
                    </tr>
                    @if($arraynomina['prima_fliar'] > 0)
                        <tr>
                            <td ><b><?php $number=2; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima Familiar </td>
                            <td><?php echo number_format($arraynomina['prima_fliar'],2); $Ttasign = $arraynomina['prima_fliar'] + $Ttasign;?></td>
                        </tr>
                    @endif
                    @if($arraynomina['prima_por_hijos'] > 0)
                        <tr> 
                            <td><b><?php $number=3; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima por Hijos </td>
                            <td><?php echo number_format($arraynomina['prima_por_hijos'],2); $Ttasign = $arraynomina['prima_por_hijos'] + $Ttasign;?></td>
                        </tr>
                    @endif
                    @if($arraynomina['prima_profe'] > 0)
                            <tr>
                                <td><b><?php $number=4; $length = 3;
                                $string = substr(str_repeat(0, $length).$number, - $length);
                                echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima Profesional</td>
                            <td><?php echo number_format($arraynomina['prima_profe'],2); $Ttasign = $arraynomina['prima_profe'] + $Ttasign;?></td>
                        </tr>
                    @endif
                    @if($arraynomina['prima_tsu'] > 0)
                        <tr>
                            <td><b><?php $number=5; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima TSU</td>
                                <td><?php echo number_format($arraynomina['prima_tsu'],2); $Ttasign = $arraynomina['prima_tsu'] + $Ttasign;?></td>
                        </tr>
                    @endif
                    @if($arraynomina['prima_maestria'])
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima Maestria </b></td>
                            <td><?php echo number_format($arraynomina['prima_maestria'],2); $Ttasign = $arraynomina['prima_maestria'] + $Ttasign;?></td></tr>
                    @endif
                    @if($arraynomina['prima_hijo_especial'] > 0)
                        <tr><td><b><?php $number=7; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima por hijo Especial</td>
                            <td><?php echo number_format($arraynomina['prima_hijo_especial'],2); $Ttasign = $arraynomina['prima_hijo_especial'] + $Ttasign;?></td></tr>
                    @endif
                    @if($arraynomina['prima_antiguedad'] > 0)
                        <tr><td><b><?php $number=8; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima por Antiguedad</td>
                            <td><?php echo number_format($arraynomina['prima_antiguedad'],2);$Ttasign = $arraynomina['prima_antiguedad'] + $Ttasign;?></td></tr>
                    @endif
                    @if($arraynomina['prima_act_univ'] > 0)
                        <tr><td><b><?php $number=9; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima por actividad Universitaria</td>
                            <td><?php echo number_format($arraynomina['prima_act_univ'],2); $Ttasign = $arraynomina['prima_act_univ'] + $Ttasign;?></td></tr>
                    @endif
                    @if($arraynomina['prima_chofer'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;Prima de Chofer Universitaria</td>
                            <td><?php echo number_format($arraynomina['prima_chofer'],2); $Ttasign = $arraynomina['prima_chofer'] + $Ttasign;?></td></tr>
                    @endif
                        <tr><td align="right"><b>Total: <?php echo number_format($Ttasign,2); ?></b></td></tr>
                </tbody>
            </table>
        </div>
        <!-- DEDUCCIONES -->
        <div>
                <table style=""> <?php $Ttdeduc=0; ?>
                    <thead>
                    <tr align="center" style="background:#d8d543; border: 0.5px solid  red;  ">
                        <th>Deducción(es)</th>
                        <th>Monto</th>
                    </tr>
                    </thead>
                    <tbody align="left" >
                    @if($arraynomina['seguro_social'] > 0)
                        <tr> <td><b><?php $number=1; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;Seguro Social</td>
                            <td align="center"><?php echo number_format($arraynomina['seguro_social'],2); $Ttdeduc = $arraynomina['seguro_social'] + $Ttdeduc;?></td></tr>
                    @endif
                    @if($arraynomina['satiutecpri'] > 0)
                            <tr><td><b><?php $number=2; $length = 3;
                                $string = substr(str_repeat(0, $length).$number, - $length);
                                echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;SATIUTECPRI</td>
                            <td align="center"><?php echo number_format($arraynomina['satiutecpri'],2); $Ttdeduc = $arraynomina['satiutecpri'] + $Ttdeduc;?></td></tr>
                    @endif
                    @if($arraynomina['pensión_alimenticia'] > 0)
                        <tr><td><b><?php $number=3; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;Pension Alimenticia</td>
                                <td align="center"><?php echo number_format($arraynomina['pension_alimenticia'],2); $Ttdeduc = $arraynomina['pension_alimenticia'] + $Ttdeduc;?></td></tr>
                    @endif
                    @if($arraynomina['paro_forzoso'])
                        <tr><td><b><?php $number=4; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;Paro Forzoso</td>
                            <td align="center"><?php echo number_format($arraynomina['paro_forzoso'],2); $Ttdeduc = $arraynomina['paro_forzoso']+ $Ttdeduc;?></td></tr>
                    @endif
                    @if($arraynomina['ley_politica'] > 0)
                        <tr><td><b><?php $number=5; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;Ley de Politica Hab.</td>
                            <td align="center"><?php echo number_format($arraynomina['ley_politica'],2); $Ttdeduc = $arraynomina['ley_politica'] + $Ttdeduc;?></td></tr>
                    @endif
                    @if($arraynomina['cappaoupel'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;CAPPAOUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['cappaoupel'],2);$Ttdeduc = $arraynomina['cappaoupel'] + $Ttdeduc;?></td></tr>
                    @endif
                        <tr><td align="right"><b>Total: <?php echo number_format($Ttdeduc,2); ?></b></td></tr>
                    </tbody>
                </table>
        </div>
    </div>

    <!-- CALCULO DE QNAs -->
	<?php $neto = $Ttasign - $Ttdeduc;  $qna1 = $neto / 2; $qna2 = $neto / 2;   ?>
<!-- QUINCENAS  -->
<div align="center" style="background:    #63b4f3; margin-top:1%; margin-left: 10%; margin-right: 10%; width: 70%;">
    <DIV>Neto: <?php echo $neto; ?></DIV>
    <label style="padding-right: 10%">Primera quincena: <?php echo $qna1; ?></label>
    <label>Segunda quincena: <?php echo $qna2; ?></label>
</div>

@if ($arraynomina['beca'])

    <div align="center" class="bonif">OTRAS BONIFICACIONES DEL MES</div>
        <table>
            <thead>
                <tr  style=" text-align: right; background:    #8ee6f1; border: 0.5px solid  red;  ">
                    <th>Descripcion</th>
                    <th>Monto</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th align="left"> Beca</th><th align="center"><?php  echo number_format($arraynomina['beca'],2);?></th>
                    </tr>
                </tbody>
        </table>
    </div>
@endif


    <div id="firma"></div>
    <footer></footer>

</body>
</html>

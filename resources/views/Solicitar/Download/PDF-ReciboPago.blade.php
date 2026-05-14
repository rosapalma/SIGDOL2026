<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Recibo de pago</title>
    </head>
<style type="text/css">
    html {   min-height: 100%;     position: relative;            }
    body {  margin: 0;    padding: 0;          }
    @page { margin: 100px 25px;} /* Margen superior e inferior para dejar espacio al header/footer */
    header {  background-image: url("images/backs/docs/arriba.png");
          background-repeat: no-repeat;
        position: fixed;
        top: -120px;
        left: 0px;
        right: 0px;
        height: 15%;
        text-align: center;
    }

    footer {
        height: 15%; 
        background-image: url("images/backs/docs/abajo.png");
        background-repeat: no-repeat;
        position: fixed; 
        bottom: -40px; 
        left: 0px; 
        right: 0px;
        
        text-align: center;
        line-height: 35px;
    } 
       /*   #firma{  
              background-image: url("images/backs/docs/firma.png");
              background-repeat: no-repeat;
              margin-top: 1%;
              width: 100%;
              height: 18%;
              }*/
           

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
                  display: flex;
                }
             .evitar-salto {    page-break-inside: avoid;  }
        </style>
<body>
    <header></header>   
        <div align="center"  class="title">Recibo de pago</div>
        <div align="center"  class="title2">Datos Personales | Laborales</div>
    <!-- DATOS PERSONALE & LABORALES -->
<main>
    <div class="contenedor-grid">
        <p style="text-transform: uppercase;">{{$personal->full_name}}</p>
        <p><b>Cédula de Identidad:  {{$personal->cedula}}</b></p>
        @if($typepers > 1)
            <p>Tipo de Personal: &nbsp;{{$typepers}}</p> 
        @endif           
        <P style="text-wrap: balance;">Cargo:&nbsp;{{$cargo}}</P>
        <p style="">Año: <?php echo $arraynomina['anio']; ?> &nbsp;|&nbsp;<b>Mes: </b>
                <?php   $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            foreach ($meses as $key => $value) {
                        $key = $key+1;
                        if ($arraynomina['mes'] == $key){   echo $value;}
            }
            ?> &nbsp;&nbsp;|&nbsp;&nbsp;Fecha de emisión: <?php echo $fechaAct; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
            Cod. recibo: <?php echo $cod; ?></p>    
    </div>
       
    </div>

    <p align="center" class="title2">Relación de Pago</p>
    <div style="margin-left:5%; margin-right: 5%; margin-top: 0;" class="contenedor">
        <!-- ASIGNACIONES -->
        <div>
            <?php $contA=0?>
            <table style="width: 100%" class="evitar-salto" ><?php $Ttasign=0; ?>
                <thead>
                <tr  align="center" style="background: #7ffa7b; border: 0.5px solid  red;  ">
                    <th class="">Asignacion(es)</th>
                    <th class="">Monto</th>
                </tr>
                </thead>
                <tbody align="left" >     {{-- GENERA NUMERO DE 3 DIGITOR --}}
                    
                    @if($arraynomina['salario_basico'] > 0)
                        <tr>
                            <td><b><?php $number=1; $length = 3;
                             $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;SALARIO BÁSICO </td>
                            <td align="center"><?php  echo number_format($arraynomina['salario_basico'],2); $Ttasign = $arraynomina['salario_basico'] + $Ttasign;?></td>
                        </tr><?php $contA=$contA +1;?>
                    @endif
                      
                    @if($arraynomina['prima_fliar'] > 0)
                        <tr>
                            <td ><b><?php $number=2; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA FLIAR. </td>
                            <td align="center"><?php echo number_format($arraynomina['prima_fliar'],2); $Ttasign = $arraynomina['prima_fliar'] + $Ttasign;?></td>
                        </tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_hijos'] > 0)
                        <tr> 
                            <td><b><?php $number=3; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA POR HIJO(s) </td>
                            <td align="center"><?php echo number_format($arraynomina['prima_hijos'],2); $Ttasign = $arraynomina['prima_hijos'] + $Ttasign;?></td>
                        </tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_tsu'] > 0)
                        <tr>
                            <td><b><?php $number=4; $length = 3;
                                $string = substr(str_repeat(0, $length).$number, - $length);
                                echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA PROF. TSU</td>
                            <td align="center"><?php echo number_format($arraynomina['prima_tsu'],2); $Ttasign = $arraynomina['prima_tsu'] + $Ttasign;?></td>
                        </tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_pregado'] > 0)
                        <tr>
                            <td><b><?php $number=5; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PrRIJMA PREGRADO</td>
                            <td align="center"><?php echo number_format($arraynomina['prima_pregrado'],2); $Ttasign = $arraynomina['prima_pregrado'] + $Ttasign;?></td>
                        </tr><?php $contA=$contA +1;?>
                    @endif
                    
                    @if($arraynomina['prima_act_univ'])
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA ACT. UNIV.</b></td>
                            <td align="center"><?php echo number_format($arraynomina['prima_act_univ'],2); $Ttasign = $arraynomina['prima_act_univ'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_maestria'])
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA MAESTRIA </b></td>
                            <td align="center"><?php echo number_format($arraynomina['prima_maestria'],2); $Ttasign = $arraynomina['prima_maestria'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_especializacion'])
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA ESPECIALIZACIÓN </b></td>
                            <td align="center"><?php echo number_format($arraynomina['prima_especializacion'],2); $Ttasign = $arraynomina['prima_especializacion'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    prima_especializacion
                    @if($arraynomina['prima_hijo_especial'] > 0)
                        <tr><td><b><?php $number=7; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA POR HIJO ESPECIAL</td>
                            <td align="center"><?php echo number_format($arraynomina['prima_hijo_especial'],2); $Ttasign = $arraynomina['prima_hijo_especial'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_antiguedad'] > 0)
                        <tr><td><b><?php $number=8; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA POR ANTIGÜEDAD</td>
                            <td align="center"><?php echo number_format($arraynomina['prima_antiguedad'],2);$Ttasign = $arraynomina['prima_antiguedad'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_chofer'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA DE CHOFER</td>
                            <td align="center"><?php echo number_format($arraynomina['prima_chofer'],2); $Ttasign = $arraynomina['prima_chofer'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['prima_titular'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA TITULA</td>
                            <td align="center"><?php echo number_format($arraynomina['prima_titular'],2); $Ttasign = $arraynomina['prima_titular'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['doctorado'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA DOCTORADO</td>
                            <td align="center"><?php echo number_format($arraynomina['doctorado'],2); $Ttasign = $arraynomina['doctorado'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    <!--JERARQUIAS --->
                    @if($arraynomina['jerarquia_nivel1'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 1</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel1'],2); $Ttasign = $arraynomina['jerarquia_nivel1'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel2'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 2</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel2'],2); $Ttasign = $arraynomina['jerarquia_nivel2'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel3'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 3</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel3'],2); $Ttasign = $arraynomina['jerarquia_nivel3'] + $Ttasign;?></td>
                            </tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel4'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 4</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel4'],2); $Ttasign = $arraynomina['jerarquia_nivel4'] + $Ttasign;?></td>
                                </tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel5'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 5</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel5'],2); $Ttasign = $arraynomina['jerarquia_nivel5'] + $Ttasign;?></td>
                            </tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel6'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 6</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel6'],2); $Ttasign = $arraynomina['jerarquia_nivel6'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel7'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 7</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel7'],2); $Ttasign = $arraynomina['jerarquia_nivel7'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel8'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 8</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel8'],2); $Ttasign = $arraynomina['jerarquia_nivel8'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel9'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 9</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel9'],2); $Ttasign = $arraynomina['jerarquia_nivel9'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                    @if($arraynomina['jerarquia_nivel10'] >0)
                        <tr><td><b><?php $number=10; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='A'.$string;?></b>&nbsp;&nbsp;PRIMA JERARQUÍA NIVEL 10</td>
                            <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel10'],2); $Ttasign = $arraynomina['jerarquia_nivel10'] + $Ttasign;?></td></tr><?php $contA=$contA +1;?>
                    @endif
                        <tr><td align="right"><b>Total: <?php echo number_format($Ttasign,2); ?></b></td></tr>
                </tbody>
            </table>
        </div>
        <!-- DEDUCCIONES -->
        <div>
            <?php $contD=0; ?>
                <table style="width: 100%" class="evitar-salto"> <?php $Ttdeduc=0; ?>
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
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;SEGURO SOCIAL</td>
                            <td align="center"><?php echo number_format($arraynomina['seguro_social'],2); $Ttdeduc = $arraynomina['seguro_social'] + $Ttdeduc;?></td></tr>
                             <?php $contD=$contD +1;?>
                    @endif
                    @if($arraynomina['aproupel_seccional'] > 0)
                            <tr><td><b><?php $number=2; $length = 3;
                                $string = substr(str_repeat(0, $length).$number, - $length);
                                echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APROUPEL SECCIONAL</td>
                            <td align="center"><?php echo number_format($arraynomina['aproupel_seccional'],2); $Ttdeduc = $arraynomina['aproupel_seccional'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['aproupel_nacional'] > 0)
                            <tr><td><b><?php $number=2; $length = 3;
                                $string = substr(str_repeat(0, $length).$number, - $length);
                                echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APROUPEL NACIONAL</td>
                            <td align="center"><?php echo number_format($arraynomina['aproupel_nacional'],2); $Ttdeduc = $arraynomina['aproupel_nacional'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['satiutecpri_obrero'] > 0)
                            <tr><td><b><?php $number=2; $length = 3;
                                $string = substr(str_repeat(0, $length).$number, - $length);
                                echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;SATIUTECPRI</td>
                            <td align="center"><?php echo number_format($arraynomina['satiutecpri_obrero'],2); $Ttdeduc = $arraynomina['satiutecpri_obrero'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['pensión_alimenticia'] > 0)
                        <tr><td><b><?php $number=3; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;PENSIÓN ALIMENTICIA</td>
                                <td align="center"><?php echo number_format($arraynomina['pension_alimenticia'],2); $Ttdeduc = $arraynomina['pension_alimenticia'] + $Ttdeduc;?></td></tr>
                                <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['paro_forzoso'])
                        <tr><td><b><?php $number=4; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;PARO FORSOZO</td>
                            <td align="center"><?php echo number_format($arraynomina['paro_forzoso'],2); $Ttdeduc = $arraynomina['paro_forzoso']+ $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['ley_politica'] > 0)
                        <tr><td><b><?php $number=5; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;LEY DE POLITICA HAB.</td>
                            <td align="center"><?php echo number_format($arraynomina['ley_politica'],2); $Ttdeduc = $arraynomina['ley_politica'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['cappaoupel'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;CAPPAOUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['cappaoupel'],2);$Ttdeduc = $arraynomina['cappaoupel'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['capaupel'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;CAPAUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['capaupel'],2);$Ttdeduc = $arraynomina['capaupel'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['asoprojupel_docente'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;ASOPROUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['asoprojupel_docente'],2);$Ttdeduc = $arraynomina['asoprojupel_docente'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['aseta'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;ASETA</td>
                            <td align="center"><?php echo number_format($arraynomina['aseta'],2);$Ttdeduc = $arraynomina['aseta'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['satiutecpri_obrero'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;SATIUTECPRI</td>
                            <td align="center"><?php echo number_format($arraynomina['satiutecpri_obrero'],2);$Ttdeduc = $arraynomina['satiutecpri_obrero'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['fondo_ipp'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;FONDO IPP</td>
                            <td align="center"><?php echo number_format($arraynomina['fondo_ipp'],2);$Ttdeduc = $arraynomina['fondo_ipp'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['islr'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;ISLR</td>
                            <td align="center"><?php echo number_format($arraynomina['islr'],2);$Ttdeduc = $arraynomina['islr'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    <!--APORTES -->
                    @if($arraynomina['aporte_ley_politica'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APORTE LEY D' POLÍTICA</td>
                            <td align="center"><?php echo number_format($arraynomina['aporte_ley_politica'],2);$Ttdeduc = $arraynomina['aporte_ley_politica'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['aporte_seguro_social'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APORTE SEGURO SOCIAL</td>
                            <td align="center"><?php echo number_format($arraynomina['aporte_seguro_social'],2);$Ttdeduc = $arraynomina['aporte_seguro_social'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['aporte_paro_forzoso'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APORTE PARO FORZOSO</td>
                            <td align="center"><?php echo number_format($arraynomina['aporte_paro_forzoso'],2);$Ttdeduc = $arraynomina['aporte_paro_forzoso'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                     @if($arraynomina['aporte_cappaoupel'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APORTE CAPPAOUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['aporte_cappaoupel'],2);$Ttdeduc = $arraynomina['aporte_cappaoupel'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['aporte_capaupel'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APORTE CAPAUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['aporte_capaupel'],2);$Ttdeduc = $arraynomina['aporte_capaupel'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                    @if($arraynomina['aporte_fondo_ipp'] > 0)
                        <tr><td><b><?php $number=6; $length = 3;
                            $string = substr(str_repeat(0, $length).$number, - $length);
                            echo $codAsig='D'.$string;?></b>&nbsp;&nbsp;APORTE FONDO IPP</td>
                            <td align="center"><?php echo number_format($arraynomina['aporte_fondo_ipp'],2);$Ttdeduc = $arraynomina['aporte_fondo_ipp'] + $Ttdeduc;?></td></tr>
                            <?php $contD=$contD +1; ?>
                    @endif
                        <tr><td align="right"><b>Total: <?php echo number_format($arraynomina['total_deducciones'],2); ?></b></td></tr>
                    </tbody>
                </table>     
        </div>
    </div>
  


    <!-- CALCULO DE QNAS -->
    <?php //$neto = $Ttasign - $Ttdeduc;  $qna1 = $neto / 2; $qna2 = $neto / 2;?>

    <!-- QUINCENAS  -->
    <div align="center" style="background:    #63b4f3; margin-top:1%; margin-left: 10%; margin-right: 10%; width: 70%;">
        <DIV>Neto: {{$arraynomina['salario_neto']}}</DIV>
        <label style="padding-right: 10%">Primera quincena: {{$arraynomina['primera_qna']}}</label>
        <label>Segunda quincena: {{$arraynomina['segunda_qna']}}</label>
    </div>
<!--BONIFICACIONES--> 
@if ($arraynomina['beca'] || $arraynomina['bono_nocturno'])
    <br>
    <div align="center" class="bonif">OTRAS BONIFICACIONES DEL MES</div>
        <table class="evitar-salto">
            <thead>
                <tr style=" text-align: right; background:    #8ee6f1; border: 0.5px solid  red;  ">
                    <th>Descripcion</th>
                    <th>Monto</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        @if ($arraynomina['beca']>0)
                            <th align="left"> Beca</th>
                            <th align="center"><?php  echo number_format($arraynomina['beca'],2);?></th>
                        @endif
                    </tr>
                </tr>
                        @if ($arraynomina['bono_nocturno']>0)
                            <th align="left"> Bono Nocturno</th>
                            <th align="center"><?php  echo number_format($arraynomina['bono_nocturno'],2);?></th>
                        @endif
                    </tr>
                </tbody>
        </table>
    </div>
@endif 
<!--SOBREVIVIENTES-->
@if(count($beneficiarios)>0)
    <br> 
    <small align="center" class="bonif" style="padding: 0"> <b>SOBREVIVIENTE(S)</b></small>
        <div class="div-table">           
            <table class="">
                <thead>
                    <tr style="background-color: #BAB9B8;">
                        <th>CÉDULA</th>
                        <th>NOMBRE Y APELLIDO</th>
                        <th>FECHA NAC.</th>
                        <th>PORCENTAJE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beneficiarios as $bene)
                        <tr>
                            @if (empty($bene->cedula))}
                                <td style="text-align: center;">S/N</td>
                            @else
                                <td style="text-align: center;">{{$bene->cedula}}</td>
                            @endif
                            <td>{{$bene->full_name}}</td>
                            <td style="text-align: center;">{{$bene->fec_nac}}</td>
                            <td style=" text-align: center;">{{$bene->porcentaje}}%</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
<!-- AUTENTICACION -->
<br><br>
    <div align="center">
        <img src="storage/autenticaciones/<?php echo $autentication; ?>"> <br>
        <span  style="text-transform:uppercase">{{ $autoridadName }}</span><br>
        <span style="">Jefe de la Unidad de Talento Humano</span>
    </div>
    <footer></footer>
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


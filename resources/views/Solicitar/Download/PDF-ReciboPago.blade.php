<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/recibos-pdf.css" rel="stylesheet">
        <title>Recibo de pago</title>
    </head>
<style type="text/css">
    html {   min-height: 100%;     position: relative;            }
    body {  margin: 0;    padding: 0;          }
    @page { margin: 100px 25px;} /* Margen superior e inferior para dejar espacio al header/footer */
    header {  background-image: url("images/backs/docs/arriba.png");
          background-repeat: no-repeat; position: fixed; top: -120px;  left: 0px;  right: 0px;   height: 15%;   text-align: center;    }

    footer {  height: 15%;  background-image: url("images/backs/docs/abajo.png");    background-repeat: no-repeat; position: fixed;  bottom: -40px; left: 0px;   right: 0px;  text-align: center;line-height: 35px;   } 
    /*   #firma{  background-image: url("images/backs/docs/firma.png");
              background-repeat: no-repeat;    margin-top: 1%;    width: 100%;         height: 18%;     }*/
    table{    border: 0.5px solid  #222425; width: 100%;           }
    tr td{   font-weight: bold; font-size: 0.7rem;           }
    th{   font-weight: bold; font-size: 0.8rem;           }
    .title{   font-weight: bold;    font-size: 1.5rem; font-variant:small-caps; text-transform:uppercase;      align-content: center;           }
    .title2{ font-size: 1.5rem;  color:  #8f9294;  margin-top: 0;        }
    .bonif{   font-weight:bold;     font-size: 0.9rem;         }
    .bonif-2{    font-weight:bold;     font-size: 0.8rem;        }
    .contenedor-grid {   line-height: 0.2;   font-weight: bold;  font-size: 1rem;       display: flex;          }
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
        <p><b>Cédula de Identidad:  {{$personal->nac}}-{{$personal->cedula}}</b></p>
        <p>Tipo de Personal: &nbsp;{{$typepers}}</p> 
        @if ($typepersid > 1)         
            <P style="text-wrap: balance;">Cargo:&nbsp;@if($cargo) {{$cargo}} @else DOCENTE @endif</P>
        @endif
        <p style="">Año: <?php echo $arraynomina['anio']; ?> &nbsp;|&nbsp;<b>Mes: </b>
                <?php   $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            foreach ($meses as $key => $value) {
                        $key = $key+1;
                        if ($arraynomina['mes'] == $key){   echo $value;}
            }
            ?> &nbsp;&nbsp;|&nbsp;&nbsp;Fecha de emisión: <?php echo $fechaAct; ?>&nbsp;&nbsp;|&nbsp;&nbsp;
            Cod. recibo: <?php echo $cod; ?></p>    
    </div>

    <p align="center" class="title2">Relación de Pago</p>
    <div style="margin-left:5%; margin-right: 5%; margin-top: 0;" class="contenedor">
            <!-- ASIGNACIONES -->
        <div>
                <?php $contA=0?>
                <table style="width: 100%" class="evitar-salto" ><?php $Ttasign=0; ?>
                    <thead>
                    <tr  align="center" style="background:  #009a44; border: 0.5px solid  red;  ">
                        <th class="">Asignacion(es)</th>
                        <th class="">Monto</th>
                    </tr>
                    </thead>
                    <tbody align="left" >   
                        
                        @if ($arraynomina['salario_basico'] > 0)
                            <tr>
                                <td>SALARIO BÁSICO </td>
                                <td align="center"><?php  echo number_format($arraynomina['salario_basico'],2);?></td>
                            </tr>
                        @endif
                          
                        @if ($arraynomina['prima_fliar'] > 0)
                            <tr>
                                <td>PRIMA FAMILIAR </td>
                                <td align="center"><?php echo number_format($arraynomina['prima_fliar'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_hijos'] > 0)
                            <tr> 
                                <td>PRIMA POR HIJO(s) </td>
                                <td align="center"><?php echo number_format($arraynomina['prima_hijos'],2);?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_tsu'] > 0)
                            <tr>
                                <td>PRIMA PROF. TSU</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_tsu'],2);?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_pregrado'] > 0)
                            <tr>
                                <td>PRIMA PREGRADO</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_pregrado'],2);?></td>
                            </tr>
                        @endif       
                        @if ($arraynomina['prima_act_univ'] > 0)
                            <tr>
                                <td>PRIMA ACT. UNIV.</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_act_univ'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_maestria'] > 0)
                            <tr>
                                <td>PRIMA MAESTRIA</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_maestria'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_doctorado'] >0)
                            <tr>
                                <td>PRIMA DOCTORADO</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_doctorado'],2);?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_especializacion'])
                            <tr>
                                <td>PRIMA ESPECIALIZACIÓN</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_especializacion'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_hijo_especial'] > 0)
                            <tr>
                                <td>PRIMA POR HIJO ESPECIAL</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_hijo_especial'],2); ?></td>
                            </tr>
                        @endif
                       
                        @if ($arraynomina['prima_antiguedad'] > 0)
                            <tr>
                                <td>PRIMA POR ANTIGÜEDAD</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_antiguedad'],2);?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_chofer'] > 0)
                            <tr>
                                <td>PRIMA DE CHOFER</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_chofer'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['prima_titular'] > 0)
                            <tr>
                                <td>PRIMA TITULAR</td>
                                <td align="center"><?php echo number_format($arraynomina['prima_titular'],2); ?></td>
                            </tr>
                        @endif
                      
                        <!--JERARQUIAS --->
                        @if ($arraynomina['jerarquia_nivel1'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 1</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel1'],2);?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel2'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 2</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel2'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel3'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 3</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel3'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel4'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 4</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel4'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel5'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 5</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel5'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel6'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 6</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel6'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel7'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 7</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel7'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel8'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 8</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel8'],2); ?></td></tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel9'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 9</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel9'],2); ?></td>
                            </tr>
                        @endif
                        @if ($arraynomina['jerarquia_nivel10'] > 0)
                            <tr>
                                <td>PRIMA JERARQUÍA NIVEL 10</td>
                                <td align="center"><?php echo number_format($arraynomina['jerarquia_nivel10'],2); ?></td>
                            </tr>
                        @endif
                            <tr><td align="right"><b>Total: <?php echo number_format($arraynomina['salario_integral'],2); ?></b></td></tr>
                    </tbody>
                </table>
        </div>

            <!-- DEDUCCIONES -->
        <div>
            <table style="width: 100%" class="evitar-salto"> 
                <thead>
                    <tr align="center" style="background:#e5e5e5; border: 0.5px solid  red;  ">
                        <th>Deducción(es)</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody align="left" >
                    @if ($arraynomina['seguro_social'] > 0)
                        <tr> 
                            <td>SEGURO SOCIAL</td>
                            <td align="center"><?php echo number_format($arraynomina['seguro_social'],2); ?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['aproupel_seccional_docentes'] > 0)
                        <tr>
                            <td>APROUPEL SECCIONAL</td>
                            <td align="center"><?php echo number_format($arraynomina['aproupel_seccional_docentes'],2); ?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['aproupel_nacional_docentes'] > 0)
                        <tr>
                            <td>APROUPEL NACIONAL</td>
                            <td align="center"><?php echo number_format($arraynomina['aproupel_nacional_docentes'],2); ?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['satiutecpri_obrero'] > 0)
                        <tr>
                            <td>SATIUTECPRI</td>
                            <td align="center"><?php echo number_format($arraynomina['satiutecpri_obrero'],2); ?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['pension_alimenticia'] > 0)
                        <tr>
                            <td>PENSIÓN ALIMENTICIA</td>
                            <td align="center"><?php echo number_format($arraynomina['pension_alimenticia'],2);?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['paro_forzoso'] > 0)
                        <tr>
                            <td>PARO FORSOZO</td>
                            <td align="center"><?php echo number_format($arraynomina['paro_forzoso'],2); ?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['ley_politica'] > 0)
                        <tr>
                            <td>LEY DE POLITICA HAB.</td>
                            <td align="center"><?php echo number_format($arraynomina['ley_politica'],2);?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['cappaoupel_adm_obr'] > 0)
                        <tr>
                            <td>CAPPAOUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['cappaoupel_adm_obr'],2);?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['capaupel_docentes'] > 0)
                        <tr>
                            <td>CAPAUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['capaupel_docentes'],2);?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['asoprojupel_doc_jub'] > 0)
                        <tr>
                            <td>ASOPROUPEL</td>
                            <td align="center"><?php echo number_format($arraynomina['asoprojupel_doc_jub'],2);?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['aseta_adm'] > 0)
                        <tr>
                            <td>ASETA</td>
                            <td align="center"><?php echo number_format($arraynomina['aseta_adm'],2);?></td>
                        </tr>
                    @endif
                    @if ($arraynomina['fondo_ipp'] > 0)
                        <tr>
                            <td>FONDO IPP</td>
                            <td align="center"><?php echo number_format($arraynomina['fondo_ipp'],2);?></td>
                        </tr>
                    @endif
                    @if($arraynomina['islr'] > 0)
                        <tr>
                            <td>ISLR</td>
                            <td align="center"><?php echo number_format($arraynomina['islr'],2);?></td>
                        </tr>
                    @endif
                    <tr>
                        <td align="right">
                            <b>Total: <?php echo number_format($arraynomina['total_deducciones'],2); ?></b>
                        </td>
                    </tr>
                </tbody>                
            </table>     
        </div>
    </div>
  
    <!-- QUINCENAS  -->
    <div align="center" style=" margin-top:1%; margin-left: 10%; margin-right: 10%; width: 70%; font-weight: bold;">
        <DIV> <b>Neto: {{$arraynomina['salario_neto']}}</b></DIV>
            <label style="padding-right: 10%">Primera quincena: {{$arraynomina['primera_qna']}}</label>
            <label>Segunda quincena: {{$arraynomina['segunda_qna']}}</label>
    </div>
        <!--BONIFICACIONES--> 
        @if ($arraynomina['beca'] || $arraynomina['bono_nocturno'])
        <br>
            <div align="center" class="bonif">OTRAS BONIFICACIONES DEL MES</div>
                <table class="evitar-salto">
                    <thead>
                        <tr style=" text-align: right; background:    #0047bb; border: 0.5px solid  red; ">
                            <th>Descripcion</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                           
                                @if ($arraynomina['beca']>0)
                                 <tr>
                                    <th align="left"> Beca</th>
                                    <th align="center"><?php  echo number_format($arraynomina['beca'],2);?></th>
                                </tr>
                                @endif

                                @if ($arraynomina['bono_nocturno']>0)
                                <tr>
                                    <th align="left"> Bono Nocturno</th>
                                    <th align="center"><?php  echo number_format($arraynomina['bono_nocturno'],2);?></th>
                                </tr>
                                @endif
                            
                    </tbody>
                </table>
            </div>
        @endif 
        <br>
        <!-- AUTENTICACION -->    
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


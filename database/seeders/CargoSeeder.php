<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cargos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		

         //Grupo Secretarial 01
     	// DB::table('gcargos')->insert(['name' => 'Grupo Secretarial']);
		DB::table('cargos')->insert(['codigo' =>'01012','name' => 'RECEPCIONISTA', 'grupo_id' => 1, 'Pts'=>313, 'nivel'=>1],);
		DB::table('cargos')->insert(['codigo' =>'01022','name' => 'OFICINISTA', 'grupo_id' => 1, 'Pts'=>543,'nivel'=>2],);
		DB::table('cargos')->insert(['codigo' =>'01032','name' => 'SECRETARIA (O)', 'grupo_id' => 1, 'Pts'=>795,'nivel'=>4],);
		DB::table('cargos')->insert(['codigo' =>'01042','name' => 'SECRETARIA (O) BILINGUE', 'grupo_id' => 1,'Pts'=>883,'nivel'=>5],);
		DB::table('cargos')->insert(['codigo' =>'01053','name' => 'SECRETARIA (O) EJECUTIVA (O)', 'grupo_id' => 1, 'Pts'=>1239,'nivel'=> 4],);
		DB::table('cargos')->insert(['codigo' =>'01063','name' => 'SECRETARIA (O) EJECUTIVA (O) BILINGUE', 'grupo_id' => 1,'Pts'=>1316,'nivel'=>5],);


  	// //Grupo de Información y Control Estudiantil 02
		DB::table('cargos')->insert(['codigo' =>'02012','name' => 'ASISTENTE DE INFORMACION Y CONTROL ESTUDIANTIL','grupo_id'=>2, 'Pts'=>null,'nivel'=>4],);
		DB::table('cargos')->insert(['codigo' =>'02023','name' => 'ANALISTA DE INFORMACION Y CONTROL ESTUDIANTIL','grupo_id'=>2, 'Pts'=>null,'nivel'=>3],);
		DB::table('cargos')->insert(['codigo' =>'02034','name' => 'PLANIFICADOR DE INFORMACION Y CONTROL ESTUDIANTIL', 'grupo_id'=>2, 'Pts'=>null,'nivel'=>2],);
		DB::table('cargos')->insert(['codigo' =>'02044','name' => 'ANALISTA DE INFORMACION Y CONTROL ESTUDIANTIL JEFE','grupo_id'=>2, 'Pts'=>null,'nivel'=>7],);
		DB::table('cargos')->insert(['codigo' =>'02054','name' => 'CONSULTOR DE INFORMACION Y CONTROL ESTUDIANTIL', 'grupo_id' =>2, 'Pts'=>null,'nivel'=>6],);
		DB::table('cargos')->insert(['codigo' =>'02064','name' => 'JEFE DE INFORMACION Y CONTROL ESTUDIANTIL', 'grupo_id' =>2, 'Pts'=>null,'nivel'=>8],);
		DB::table('cargos')->insert(['codigo' =>'02074','name' => 'JEFE CENTRAL DE INFORMACION Y CONTROL ESTUDIANTIL', 'grupo_id' =>2, 'Pts'=>null,'nivel'=>8],);



    // Grupo de biblioteca e información especializada 03
		DB::table('cargos')->insert(['codigo' =>'03012','name' => 'AUXILIAR DE BIBLIOTECA', 'grupo_id' =>3,'Pts'=>null,'nivel'=>2],);
		DB::table('cargos')->insert(['codigo' =>'03023','name' => 'ASISTENTE DE BIBLIOTECA', 'grupo_id' =>3, 'Pts'=>null,'nivel'=>3],);
		DB::table('cargos')->insert(['codigo' =>'03034','name' => 'SUPERVISOR DE BIBLIOTECA', 'grupo_id' =>3, 'Pts'=>null,'nivel'=>6],);
		DB::table('cargos')->insert(['codigo' =>'03044','name' => 'COORDINADOR DE BIBLIOTECA', 'grupo_id' =>3, 'Pts'=>null,'nivel'=>8],);
		DB::table('cargos')->insert(['codigo' =>'03053','name' => 'ASISTENTE DE ESPECIALISTA EN INFORMACION', 'grupo_id' =>3, 'Pts'=>null,'nivel'=>3],);
		DB::table('cargos')->insert(['codigo' =>'03064','name' => 'ESPECIALISTA EN INFORMACION', 'grupo_id' =>3, 'Pts'=>null,'nivel'=>6],);
		DB::table('cargos')->insert(['codigo' =>'03074','name' => 'ESPECIALISTA EN INFORMACION JEFE', 'grupo_id' =>3, 'Pts'=>null,'nivel'=>7],);



  //GRUPO DE PSICOLOGÍA Y ORIENTACIÓN  04
  // DB::table('gcargos')->insert(['name' => 'Grupo de psicología y orientación', ]);
  		DB::table('cargos')->insert(['codigo'=>'04012','name'=>'ASISTENTE DE PSICOLOGO (Codigo Transitorio)','grupo_id'=>4,'Pts'=>466,'nivel'=>2],);
  		DB::table('cargos')->insert(['codigo'=>'04014','name'=>'ORIENTADOR','grupo_id'=>4,'Pts'=>968,'nivel'=>2],);
  		DB::table('cargos')->insert(['codigo'=>'04024','name'=>'PSICOLOGO','grupo_id'=>4,'Pts'=>1181,'nivel'=>3],);
  		DB::table('cargos')->insert(['codigo'=>'04034','name'=>'PSICOLOGO JEFE','grupo_id'=>4,'Pts'=>1755,'nivel'=>8],);
  		DB::table('cargos')->insert(['codigo'=>'04044','name'=>'JEFE DE ASESORAMIENTO, APOYO Y ORIENTACION','grupo_id'=>4,'Pts'=>1860,'nivel'=>9],);



  // Grupo de archivo 05
  // DB::table('gcargos')->insert(['name' => 'Grupo de archivo', ]);
  		DB::table('cargos')->insert(['codigo'=>'05012','name'=>'AUXILIAR DE ARCHIVO','grupo_id'=>5,'Pts'=>554,'nivel'=>2],);
  		DB::table('cargos')->insert(['codigo'=>'05023','name'=>'ARCHIVISTA','grupo_id'=>5,'Pts'=>1126,'nivel'=>4],);
  		DB::table('cargos')->insert(['codigo'=>'05034','name'=>'ARCHIVISTA JEFE','grupo_id'=>5,'Pts'=>1701,'nivel'=>7],);
  		DB::table('cargos')->insert(['codigo'=>'05042','name'=>'MICROFILMADOR','grupo_id'=>5,'Pts'=>734,'nivel'=>4],);


// Grupo de Contaduría 06
// DB::table('gcargos')->insert(['name' => 'Grupo de contaduría', ]);
		DB::table('cargos')->insert(['codigo'=>'06012','name'=>'ASISTENTE DE CONTABILIDAD ','grupo_id'=>6,'Pts'=>657,'nivel'=>3],);
		DB::table('cargos')->insert(['codigo'=>'06023','name'=>'CONTABILISTA','grupo_id'=>6,'Pts'=>978,'nivel'=>3],);
		DB::table('cargos')->insert(['codigo'=>'06034','name'=>'CONTADOR','grupo_id'=>6,'Pts'=>1317,'nivel'=>4],);
		DB::table('cargos')->insert(['codigo'=>'06044','name'=>'CONTADOR JEFE','grupo_id'=>6,'Pts'=>1732,'nivel'=>8],);
		DB::table('cargos')->insert(['codigo'=>'06054','name'=>'JEFE DE CONTABILIDAD','grupo_id'=>6,'Pts'=>1990,'nivel'=>9],);


// Grupo de presupuesto 07
// DB::table('gcargos')->insert(['name' => 'Grupo de presupuesto', ]);
		DB::table('cargos')->insert(['codigo'=>'07013','name'=>'ASISTENTE DE PRESUPUESTO','grupo_id'=>7,'Pts'=>865,'nivel'=>2],);
		DB::table('cargos')->insert(['codigo'=>'07024','name'=>'ANALISTA DE PRESUPUESTO','grupo_id'=>7,'Pts'=>1350,'nivel'=>5],);
		DB::table('cargos')->insert(['codigo'=>'07034','name'=>'ANALISTA CENTRAL DE PRESUPUESTO','grupo_id'=>7,'Pts'=>1590,'nivel'=>7],);
		DB::table('cargos')->insert(['codigo'=>'07044','name'=>'JEFE SECTORIAL DE PRESUPUESTO','grupo_id'=>7,'Pts'=>1942,'nivel'=>8],);
		DB::table('cargos')->insert(['codigo'=>'07054','name'=>'JEFE CENTRAL DE PRESUPUESTO','grupo_id'=>7,'Pts'=>1948,'nivel'=>9],);




// Grupo de Administración   08
		DB::table('cargos')->insert(['codigo'=>'08013','name'=>'ASISTENTE ADMINISTRATIVO','grupo_id'=> 8,'Pts'=>926,'nivel'=>2],);
		DB::table('cargos')->insert(['codigo'=>'08024','name'=>'ADMINISTRADOR','grupo_id'=> 8,'Pts'=>1380,'nivel'=>5],);
		DB::table('cargos')->insert(['codigo'=>'08033','name'=>'SUPERVISOR DEL PROGRAMA ASISTENCIA MEDICA ESTUDIANTIL','grupo_id'=>8,'Pts'=>947,'nivel'=>3],);
		DB::table('cargos')->insert(['codigo'=>'08044','name'=>'ADMINISTRADOR JEFE','grupo_id'=>8,'Pts'=>1797,'nivel'=>8],);
		DB::table('cargos')->insert(['codigo'=>'08054','name'=>'COORDINADOR ADMINISTRATIVO','grupo_id'=>8,'Pts'=>2114,'nivel'=>9],);
		DB::table('cargos')->insert(['codigo'=>'08064','name'=>'ASISTENTE EJECUTIVO DE EGREAMIGOS','grupo_id'=>8,'Pts'=>1555,'nivel'=>6],);



// GRUPO DE INFORMATICA 09
        //DB::table(gcargos)->insert(['name' => 'GRUPO DE INFORMATICA', ]);
        DB::table('cargos')->insert(['codigo'=>'11012','name'=>'ASISTENTE EN RECURSOS DE APOYO INFORMATICO','grupo_id'=>9,'Pts'=>865,'nivel'=>5],);
        DB::table('cargos')->insert(['codigo'=>'11023','name'=>'ASISTENTE DE LABORATORIO DE COMPUTACION','grupo_id'=>9,'Pts'=>1350,'nivel'=>3],);
        DB::table('cargos')->insert(['codigo'=>'11033','name'=>'PROGRAMADOR DE SISTEMAS','grupo_id'=>9,'Pts'=>1590,'nivel'=>4],);
        DB::table('cargos')->insert(['codigo'=>'11043','name'=>'TECNICO DE RECURSOS DE INFORMATICA','grupo_id'=>9,'Pts'=>1942,'nivel'=>6],);
        DB::table('cargos')->insert(['codigo'=>'11054','name'=>'ANALISTA PROGRAMADOR DE SISTEMAS','grupo_id'=>9,'Pts'=>1948,'nivel'=>5],);
        DB::table('cargos')->insert(['codigo'=>'11064','name'=>'ANALISTA DE TECNOLOGIA DE INFORMACION Y COMUNICACION','grupo_id'=>9,'Pts'=>1948,'nivel'=>5],);
        DB::table('cargos')->insert(['codigo'=>'11074','name'=>'ADMINISTRADOR DE TECNOLOGIA DE INFORMACION Y COMUNICACION','grupo_id'=>9,'Pts'=>1948,'nivel'=>5],);
        DB::table('cargos')->insert(['codigo'=>'11084','name'=>'ESPECIALISTA DE TECNOLOGIA DE INFORMACION Y COMUNICACION','grupo_id'=>9,'Pts'=>1948,'nivel'=>9],);
        DB::table('cargos')->insert(['codigo'=>'1109','name'=>'ADMINISTRADOR GENERAL DE TECNOLOGIA DE INFORMACION Y COMUNICACION','grupo_id'=>9,'Pts'=>1948,'nivel'=>9],);
        DB::table('cargos')->insert(['codigo'=>'11104','name'=>'JEFE DE TECNOLOGIA DE INFORMACION Y COMUNICACION','grupo_id'=>9,'Pts'=>1948,'nivel'=>9],);




    // Grupo de Almacén y Compras  10
        DB::table('cargos')->insert(['codigo'=>'0002','name'=>'ALMACENISTA (CODIGO TRANSITORIO)','grupo_id'=>10,'Pts'=>598,'nivel'=>3],);
        DB::table('cargos')->insert(['codigo'=>'00032','name'=>'ASISTENTE DE ALMACEN (CODIGO TRANSITORIO)','grupo_id'=>10,'Pts'=>451,'nivel'=>2],);
        DB::table('cargos')->insert(['codigo'=>'09013','name'=>'ALMACENISTA JEFE','grupo_id'=>10,'Pts'=>1354,'nivel'=>5],);
        DB::table('cargos')->insert(['codigo'=>'09023','name'=>'COMPRADOR','grupo_id'=>10,'Pts'=>870,'nivel'=>2],);
        DB::table('cargos')->insert(['codigo'=>'09033','name'=>'JEFE DE ANALISIS Y PROCESAMIENTO DE COMPRAS','grupo_id'=>10,'Pts'=>1429,'nivel'=>6],);
        DB::table('cargos')->insert(['codigo'=>'09044','name'=>'COMPRADOR JEFE','grupo_id'=>10,'Pts'=>1766,'nivel'=>8],);
        DB::table('cargos')->insert(['codigo'=>'09054','name'=>'JEFE SECTORIAL DE COMPRAS','grupo_id'=>10,'Pts'=>1478,'nivel'=>6],);


    // GRUPO DE ADMINISTRACIÓN DE RECURSOS HUMANOS 11
        DB::table('cargos')->insert(['codigo'=>'10013','name'=>'ASISTENTE DE RECURSOS HUMANOS','grupo_id'=>11,'Pts'=>895,'nivel'=>2],);
        DB::table('cargos')->insert(['codigo'=>'10024','name'=>'FACILITADOR DE DESARROLLO DE RECURSOS HUMANOS','grupo_id'=>11,'Pts'=>1141,'nivel'=>3],);
        DB::table('cargos')->insert(['codigo'=>'10034','name'=>'ANALISTA DE RECURSOS HUMANOS','grupo_id'=>11,'Pts'=>1469,'nivel'=>6],);
        DB::table('cargos')->insert(['codigo'=>'10044','name'=>'ANALISTA ESPECIALISTA DE RECURSOS HUMANOS','grupo_id'=>11,'Pts'=>1807,'nivel'=>8],);
        DB::table('cargos')->insert(['codigo'=>'10054','name'=>'JEFE SECTORIAL DE RECURSOS HUMANOS','grupo_id'=>11,'Pts'=>1967,'nivel'=>9],);
        DB::table('cargos')->insert(['codigo'=>'10064','name'=>'JEFE DE RECURSOS HUMANOS','grupo_id'=>11,'Pts'=>2105,'nivel'=>9],);


// Grupo de control, inspección de obras y mantenimiento de edificios 12 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'00042','name'=>'SUPERVISOR DE PINTORES (CODIGO TRANSITORIO)','grupo_id'=>12,'Pts'=>885,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'00052','name'=>'SUPERVISOR DE CARPINTERÍA (CODIGO TRANSITORIO)','grupo_id'=>12,'Pts'=>925,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'00062','name'=>'TECNICO PLOMERO','grupo_id'=>12,'Pts'=>654,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'00092','name'=>'SUPERVISOR DE SERVICIOS (CODIGO TRANSITORIO)','grupo_id'=>12,'Pts'=>1029,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'12013','name'=>'ASISTENTE DE COSTOS DE OBRAS','grupo_id'=>12,'Pts'=>973,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'12023','name'=>'SUPERVISOR DE SERVICIOS DE MANTENIMIENTO','grupo_id'=>12,'Pts'=>1309,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'12034','name'=>'INSPECTOR DE OBRAS','grupo_id'=>12,'Pts'=>1191,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'12044','name'=>'JEFE DE MANTENIMIENTO Y REPARACIONES','grupo_id'=>12,'Pts'=>1593,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'12054','name'=>'JEFE DE TALLERES DE OBRAS','grupo_id'=>12,'Pts'=>1670,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'12064','name'=>'JEFE DE OBRAS','grupo_id'=>12,'Pts'=>1831,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'12074','name'=>'SUPERVISOR DE COSTOS DE OBRAS','grupo_id'=>12,'Pts'=>1523,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'12084','name'=>'JEFE DE TALLER METALMECANICO','grupo_id'=>12,'Pts'=>1595,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'12094','name'=>'INGENIERO DE PROYECTOS','grupo_id'=>12,'Pts'=>1062,'nivel'=>2],);



// Grupo de servicios, reparación, mantenimiento y control automotor 13
DB::table('cargos')->insert(['codigo'=>'13012','name'=>'SUPERVISOR DE TRANSPORTE','grupo_id'=>13,'Pts'=>924,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'13023','name'=>'JEFE DE TALLER AUTOMOTOR','grupo_id'=>13,'Pts'=>1395,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'13033','name'=>'JEFE DE TRÁFICO','grupo_id'=>13,'Pts'=>1345,'nivel'=>5],);


// Grupo de servicios generales 14
DB::table('cargos')->insert(['codigo'=>'14014','name'=>'SUPERVISOR DE SERVICIOS GENERALES','grupo_id'=>14,'Pts'=>1577,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'14024','name'=>'JEFE DE SERVICIOS GENERALES','grupo_id'=>14,'Pts'=>1717,'nivel'=>7],);




// Grupo de organización y planificación 15
// 15 	 Cargo 	Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'15014','name'=>'PLANIFICADOR','grupo_id'=>15,'Pts'=>1197,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'15024','name'=>'PLANIFICADOR CENTRAL','grupo_id'=>15,'Pts'=>1642,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'15034','name'=>'ANALISTA DE ORGANIZACION Y SISTEMASs','grupo_id'=>15,'Pts'=>1145,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'15044','name'=>'JEFE DE ORGANIZACION Y SISTEMAS','grupo_id'=>15,'Pts'=>1821,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'15054','name'=>'JEFE DE PLANES OPERATIVOS Y ESTRATEGICOS','grupo_id'=>15,'Pts'=>1915,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'15063','name'=>'ANALISTA DE REGISTRO Y CONTROL ESTADISTICO','grupo_id'=>15,'Pts'=>772,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'15074','name'=>'ANALISTA DE REGISTRO Y COTROL. ESTADISTICO JEFE','grupo_id'=>15,'Pts'=>1507,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'15084','name'=>'ESPECIALISTA ORGANIZACIONAL','grupo_id'=>15,'Pts'=>2113,'nivel'=>9],);




// Grupo de registro y control de bienes  16
DB::table('cargos')->insert(['codigo'=>'16012','name'=>'REGISTRADOR DE BIENES','grupo_id'=>16,'Pts'=>664,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'16023','name'=>'DOCUMENTALISTA DE BIENES INMUEBLES','grupo_id'=>16,'Pts'=>971,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'16033','name'=>'SUPERVISOR DE REGISTRO Y CONTROL DE BIENES','grupo_id'=>16,'Pts'=>1326,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'16043','name'=>'JEFE DE INVENTARIOS','grupo_id'=>16,'Pts'=>1536,'nivel'=>6],);



// Grupo de deporte 17
DB::table('cargos')->insert(['codigo'=>'17014','name'=>'ENTRENADOR DEPORTIVO','grupo_id'=>17,'Pts'=>1138,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'17024','name'=>'COORDINADOR DE DEPORTE','grupo_id'=>17,'Pts'=>1400,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'17034','name'=>'COORDINADOR GENERAL DE DEPORTE','grupo_id'=>17,'Pts'=>1849,'nivel'=>8],);




// Grupo de dibujo, diagramación y diseño gráfico 18 	 Cargo 	Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'18012','name'=>'CALIGRAFO','grupo_id'=>18,'Pts'=>692,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'18023','name'=>'DIAGRAMADOR','grupo_id'=>18,'Pts'=>785,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'18033','name'=>'DISENADOR GRAFICO','grupo_id'=>18,'Pts'=>823,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'18043','name'=>'DIBUJANTE','grupo_id'=>18,'Pts'=>760,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'18053','name'=>'DIBUJANTE JEFE','grupo_id'=>18,'Pts'=>1344,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'18063','name'=>'DIBUJANTE ILUSTRADOR','grupo_id'=>18,'Pts'=>783,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'18073','name'=>'DIBUJANTE ILUSTRADOR JEFE','grupo_id'=>18,'Pts'=>1344,'nivel'=>5],);





// Grupo de producción, reproducción y expendio de publicaciones 19 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'00072','name'=>'OPERADOR DE MAQUINA DE REPRODUCCION (CODIGO TRANSITORIO)','grupo_id'=>19,'Pts'=>483,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'19012','name'=>'EXPENDEDOR DE MATERIAL DIDACTICO','grupo_id'=>19,'Pts'=>406,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'19022','name'=>'ASISTENTE DE PUBLICACIONES','grupo_id'=>19,'Pts'=>549,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'19034','name'=>'CORRECTOR DE PUBLICACIONES','grupo_id'=>19,'Pts'=>872,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'19043','name'=>'SUPERVISOR DE TALLER DE PUBLICACIONES','grupo_id'=>19,'Pts'=>1432,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'19054','name'=>'COORDINADOR DE PUBLICACIONES','grupo_id'=>19,'Pts'=>1645,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'19062','name'=>'FOTOLITOGRAFO','grupo_id'=>19,'Pts'=>816,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'19072','name'=>'PROMOTOR VENDEDOR DE MATERIAL DIDACTICO','grupo_id'=>19,'Pts'=>714,'nivel'=>4],);



// Grupo de prensa y relaciones públicas e interinstitucionales  20 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'20013','name'=>'ASISTENTE DE PROTOCOLO','grupo_id'=>20,'Pts'=>860,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'20024','name'=>'JEFE DE PROTOCOLO','grupo_id'=>20,'Pts'=>1536,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'20034','name'=>'PROMOTOR DE RELACIONES PÚBLICAS E INTERINSTITUCIONALES','grupo_id'=>20,'Pts'=>933,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'20044','name'=>'ASISTENTE EJECUTIVO DE RELACIONES INTERINSTITUCIONALES','grupo_id'=>20,'Pts'=>1533 ,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'20054','name'=>'PERIODISTA','grupo_id'=>20,'Pts'=>1007,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'20064','name'=>'JEFE DE RELACIONES PÚBLICAS','grupo_id'=>20,'Pts'=>1841,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'20074','name'=>'JEFE DE PRENSA','grupo_id'=>20,'Pts'=>1826,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'20083','name'=>'ASISTENTE DE PUBLICIDAD Y MERCADEO','grupo_id'=>20,'Pts'=>1217,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'20094','name'=>'JEFE DE RELACIONES INTERINSTITUCIONALES','grupo_id'=>20,'Pts'=>1829,'nivel'=>8],);



// Grupo de asesoría legal  21
DB::table('cargos')->insert(['codigo'=>'21014','name'=>'ABOGADO','grupo_id'=>21,'Pts'=>1270,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'21024','name'=>'ABOGADO ESPECIALISTA','grupo_id'=>21,'Pts'=>1824,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'21034','name'=>'ABOGADO JEFE','grupo_id'=>21,'Pts'=>2081,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'21044','name'=>'ABOGADO ESPECIALISTA SECTORIAL','grupo_id'=>21,'Pts'=>1647,'nivel'=>7],);



// Grupo de laboratorio clínico, técnico y profesional 22
DB::table('cargos')->insert(['codigo'=>'21044','name'=>'ABOGADO ESPECIALISTA SECTORIAL','grupo_id'=>22,'Pts'=>1647,'nivel'=>7],);


DB::table('cargos')->insert(['codigo'=>'22012','name'=>'AUXILIAR DE LABORATORIO','grupo_id'=>22,'Pts'=>770,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'22023','name'=>'ASISTENTE DE LABORATORIO','grupo_id'=>22,'Pts'=>1072,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'22032','name'=>'ASISTENTE DE ANATOMIA Y PATOLOGIA','grupo_id'=>22,'Pts'=>932,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'22043','name'=>'ASISTENTE DE ENTOMOLOGÍA','grupo_id'=>22,'Pts'=>1001,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'22052','name'=>'ASISTENTE DE HISTOLOGÍA','grupo_id'=>22,'Pts'=>890,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'22063','name'=>'ASISTENTE DE BIOLOGÍA','grupo_id'=>22,'Pts'=>984,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'22074','name'=>'BIOANALISTA','grupo_id'=>22,'Pts'=>1445,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'22084','name'=>'SUPERVISOR DE LABORATORIO','grupo_id'=>22,'Pts'=>1754,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'22093','name'=>'ASISTENTE DE BOTANICA','grupo_id'=>22,'Pts'=>853,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'22103','name'=>'ASISTENTE DE LABORATORIO CLÍNICO','grupo_id'=>22,'Pts'=>991,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'22113','name'=>'TAXIDERMISTA','grupo_id'=>22,'Pts'=>974,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'22123','name'=>'SOPLADOR DE VIDRIO','grupo_id'=>22,'Pts'=>934,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'22133','name'=>'SOPLADOR DE VIDRIO JEFE','grupo_id'=>22,'Pts'=>1514,'nivel'=>6],);



// Grupo de seguros 23 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'23013','name'=>'ASISTENTE DE SEGURO DE TRANSPORTE AUTOMOTOR','grupo_id'=>23,'Pts'=>813,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'23023','name'=>'ASISTENTE DE SEGUROS','grupo_id'=>23,'Pts'=>758,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'23034','name'=>'JEFE DE SEGUROS','grupo_id'=>23,'Pts'=>1770,'nivel'=>8],);


// Grupo de diseño académico  24 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'24014','name'=>'EVALUADOR CURRICULAR','grupo_id'=>24,'Pts'=>1568,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'24024','name'=>'DISEÑADOR CURRICULAR','grupo_id'=>24,'Pts'=>1568,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'24034','name'=>'INVESTIGADOR OCUPACIONAL','grupo_id'=>24,'Pts'=>1568,'nivel'=>6],);


// Grupo de administración de programa de pasantías 25 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'25014','name'=>'ANALISTA DE COLOCACION Y SEGUIMIENTO DE PASANTIAS','grupo_id'=>25,'Pts'=>924,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'25024','name'=>'ESPECIALISTA EN PASANTIAS Y ACTIVIDADES COMPLEMENTARIAS','grupo_id'=>25,'Pts'=>1624,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'25034','name'=>'COORDINADOR DE PASANTIAS Y ACTIVIDADES COMPLEMENTARIAS','grupo_id'=>25,'Pts'=>1927,'nivel'=>9],);


// Grupo de estudios para graduados 26 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'26014','name'=>'ASISTENTE EJECUTIVO DE ESTUDIOS PARA GRADUADOS','grupo_id'=>26,'Pts'=>1618,'nivel'=>7],);



// Grupo de investigación 27 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'27014','name'=>'INVESTIGADOR EN CIENCIAS BASICAS, NATURALES Y APLICADAS','grupo_id'=>27,'Pts'=>1750,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'27024','name'=>'INVESTIGADOR EN CIENCIAS SOCIALES','grupo_id'=>27,'Pts'=>1496,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'27034','name'=>'ASISTENTE DE INVESTIGACION EN CIENCIAS BÁSICAS, NATURALES Y APLICADAS','grupo_id'=>27,'Pts'=>1241,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'27044','name'=>'ASISTENTE DE INVESTIGACION EN CIENCIAS SOCIALES','grupo_id'=>27,'Pts'=>1001,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'27052','name'=>'ASISTENTE DE CAMPO','grupo_id'=>27,'Pts'=>866,'nivel'=>5],);



// Grupo de medicina 28 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'28013','name'=>'TECNICO RADIOLOGO','grupo_id'=>28,'Pts'=>1004,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'28023','name'=>'TECNICO DE ELECTROMEDICINA','grupo_id'=>28,'Pts'=>957,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'28033','name'=>'FISIOTERAPEUTA','grupo_id'=>28,'Pts'=>867,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'28044','name'=>'MEDICO GENERAL','grupo_id'=>28,'Pts'=>1335,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'28054','name'=>'MEDICO ESPECIALISTA','grupo_id'=>28,'Pts'=>1638,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'28064','name'=>'COORDINADOR DEL PROGRAMA DE ASISTENCIA MEDICA ESTUDIANTIL','grupo_id'=>28,'Pts'=>1603,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'28074','name'=>'JEFE DE SALUD INTEGRAL','grupo_id'=>28,'Pts'=>2071,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'28082','name'=>'KINESIOLOGO','grupo_id'=>28,'Pts'=>685,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'28094','name'=>'MEDICO JEFE','grupo_id'=>28,'Pts'=>1802,'nivel'=>8],);



// Grupo de correo 29 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'29012','name'=>'OFICIAL DE CORREO','grupo_id'=>29,'Pts'=> 447,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'29023','name'=>'JEFE DE CORREO','grupo_id'=>29,'Pts'=> 1376,'nivel'=>5],);


// Grupo de odontología 30 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'30012','name'=>'HIGIENISTA DENTAL','grupo_id'=>30,'Pts'=>679,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'30024','name'=>'ODONTOLOGO','grupo_id'=>30,'Pts'=>1496,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'30033','name'=>'MECANICO DENTAL','grupo_id'=>30,'Pts'=>856,'nivel'=>2],);



// Grupo de citotecnología 31 		Pts. 	Nivel
DB::table('cargos')->insert(['codigo'=>'31013','name'=>'CITOTECNOLOGO','grupo_id'=>31,'Pts'=>914,'nivel'=>2],);


// Grupo de Salud Pública 32 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'32012','name'=>'AUXILIAR DE REGISTRO Y ESTADISTICAS DE SERVICIOS ASISTENCIALES','grupo_id'=>32,'Pts'=>756,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'32023','name'=>'ENFERMERA (O)','grupo_id'=>32,'Pts'=>1172,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'32034','name'=>'ENFERMERA (O) JEFE','grupo_id'=>32,'Pts'=>1742,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'32043','name'=>'SUPERVISOR DE REGISTRO Y APOYO ASISTENCIAL','grupo_id'=>32,'Pts'=>1315,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'32054','name'=>'ENFERMERA (O) COMUNITARIA','grupo_id'=>32,'Pts'=>1012,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'32064','name'=>'ENFERMERA (O) INSTRUMENTISTA','grupo_id'=>32,'Pts'=>1186,'nivel'=>3],);



// Grupo de servicios sociales 33
DB::table('cargos')->insert(['codigo'=>'33013','name'=>'PROMOTOR SOCIAL','grupo_id'=>33,'Pts'=>659,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'33023','name'=>'ASISTENTE DE PREVISION Y DESARROLLO SOCIAL','grupo_id'=>33,'Pts'=>863,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'33034','name'=>'TRABAJADOR SOCIAL JEFE','grupo_id'=>33,'Pts'=>1593,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'33044','name'=>'JEFE DE ASISTENCIA SOCIO ECONOMICA ESTUDIANTIL','grupo_id'=>33,'Pts'=>1772,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'33054','name'=>'TRABAJADOR SOCIAL','grupo_id'=>33,'Pts'=>1095,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'33064','name'=>'COORDINADOR DE DESARROLLO DE SERVICIOS ESTUDIANTILES','grupo_id'=>33,'Pts'=>1775,'nivel'=>8],);



// Grupo de seguridad integral 34 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'34013','name'=>'INSPECTOR DE SEGURIDAD INDUSTRIAL E HIGIENE OCUPACIONAL','grupo_id'=>34,'Pts'=>1110,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'34022','name'=>'INSPECTOR DE CONTROL DE PÉRDIDAS','grupo_id'=>34,'Pts'=>951,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'34032','name'=>'SUPERVISOR DE PROTECCION Y SEGURIDAD','grupo_id'=>34,'Pts'=>996,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'34044','name'=>'JEFE DE PROTECCION Y SEGURIDAD','grupo_id'=>34,'Pts'=>1645,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'34053','name'=>'INSPECTOR DE PROTECCION AMBIENTAL','grupo_id'=>34,'Pts'=>1110,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'34063','name'=>'ANALISTA DE LABORATORIO DE PROTECCION AMBIENTAL','grupo_id'=>34,'Pts'=>1149,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'34074','name'=>'JEFE DE PROTECCION AMBIENTAL','grupo_id'=>34,'Pts'=>1785,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'34084','name'=>'JEFE DE SEGURIDAD INDUSTRIAL E HIGIENE OCUPACIONAL','grupo_id'=>34,'Pts'=>1957,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'34094','name'=>'ANALISTA DE HIGIENE Y SEGURIDAD INDUSTRIAL','grupo_id'=>34,'Pts'=>1424,'nivel'=>5],);



// Grupo de técnicas educativas y medios audiovisuales 35 	 Cargos 	Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'35012','name'=>'ASISTENTE DE ASUNTOS AUDIOVISUALES','grupo_id'=>35,'Pts'=>579,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'35024','name'=>'SUPERVISOR DE ASUNTOS AUDIOVISUALES','grupo_id'=>35,'Pts'=>1318,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'35034','name'=>'ANALISTA DE ASUNTOS AUDIOVISUALES','grupo_id'=>35,'Pts'=>1152,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'35042','name'=>'CAMAROGRAFO','grupo_id'=>35,'Pts'=>644,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'35052','name'=>'FOTOGRAFO','grupo_id'=>35,'Pts'=>745,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'35064','name'=>'JEFE DE FOTOGRAFÍA','grupo_id'=>35,'Pts'=>1493,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'35073','name'=>'EDITOR DE ASUNTOS AUDIOVISUALES','grupo_id'=>35,'Pts'=>788,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'35084','name'=>'JEFE DE PRODUCCION DE AUDIOVISUALES','grupo_id'=>35,'Pts'=>1762,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'35093','name'=>'LUMINOTÉCNICO','grupo_id'=>35,'Pts'=>832,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'35102','name'=>'ASISTENTE DE CAMARA','grupo_id'=>35,'Pts'=>658,'nivel'=>3],);


// Grupo de educación preescolar y básica  36 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'36013','name'=>'ASISTENTE DE PREESCOLAR','grupo_id'=>36,'Pts'=>642,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'36024','name'=>'DOCENTE DE PREESCOLAR','grupo_id'=>36,'Pts'=>1101,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'36034','name'=>'COORDINADOR DE PREESCOLAR','grupo_id'=>36,'Pts'=>1535,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'36044','name'=>'SUB-DIRECTOR EDUCATIVO','grupo_id'=>36,'Pts'=>1816,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'36054','name'=>'COORDINADOR ACADEMICO','grupo_id'=>36,'Pts'=>1696,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'36064','name'=>'DIRECTOR EDUCATIVO','grupo_id'=>36,'Pts'=>2065,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'36074','name'=>'DOCENTE DE AULA','grupo_id'=>36,'Pts'=>1198,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'36084','name'=>'PSICOPEDAGOGO','grupo_id'=>36,'Pts'=>1046,'nivel'=>2],);


// Grupo de arquitectura y topografía 37 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'37013','name'=>'TOPOGRAFO','grupo_id'=>37,'Pts'=>1059,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'37024','name'=>'ARQUITECTO','grupo_id'=>37,'Pts'=>1057,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'37034','name'=>'JEFE DE PROYECTOS ARQUITECTONICOS Y DE INGENIERIA','grupo_id'=>37,'Pts'=>1858,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'37042','name'=>'ASISTENTE DE TOPOGRAFIA','grupo_id'=>37,'Pts'=>734,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'37053','name'=>'MAQUETISTA','grupo_id'=>37,'Pts'=>876,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'37064','name'=>'CARTOGRAFO','grupo_id'=>37,'Pts'=>1136,'nivel'=>3],);


// Grupo de asuntos literarios 38 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'38014','name'=>'EDITOR HISTORICO','grupo_id'=>38,'Pts'=>1633,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'38023','name'=>'FACILITADOR DE DESARROLLO EN ASUNTOS LITERARIOS','grupo_id'=>38,'Pts'=>977,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'38033','name'=>'ASISTENTE DE ASUNTOS LITERARIOS','grupo_id'=>38,'Pts'=>1171,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'38044','name'=>'ESPECIALISTA EN ASUNTOS LITERARIOS','grupo_id'=>38,'Pts'=>1695,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'38054','name'=>'COORDINADOR DE ASUNTOS LITERARIOS','grupo_id'=>38,'Pts'=>2072,'nivel'=>9],);




// Grupo de servicios y administración de áreas nutricionales 39 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'39013','name'=>'INSPECTOR DE HIGIENE Y CONTROL DE PRECIOS DE ALIMENTOS','grupo_id'=>39,'Pts'=>89,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'39024','name'=>'DIETISTA','grupo_id'=>39,'Pts'=>1302,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'39034','name'=>'JEFE DE UNIDADES NUTRICIONALES','grupo_id'=>39,'Pts'=>1724,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'39042','name'=>'ECONOMO','grupo_id'=>39,'Pts'=>576,'nivel'=>3],);



// Grupo de idiomas 40 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'40013','name'=>'ASISTENTE DE LABORATORIO DE IDIOMAS','grupo_id'=>40,'Pts'=>856,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'40024','name'=>'TRADUCTOR','grupo_id'=>40,'Pts'=>929,'nivel'=>1],);


// Grupo de técnica química 41 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'41013','name'=>'TECNICO QUIMICO','grupo_id'=>41,'Pts'=>830,'nivel'=>2],);



// Grupo de técnica eléctrica, mecánica y electrónica 42 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'42013','name'=>'TECNICO ELECTRICISTA','grupo_id'=>42,'Pts'=>719,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'42023','name'=>'TECNICO ELECTROMECANICO DE EQUIPOS ODONTOLOGICOS','grupo_id'=>42,'Pts'=>728,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'42033','name'=>'TECNICO ELECTROMECANICO','grupo_id'=>42,'Pts'=>779,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'42043','name'=>'TECNICO DE TALLER DE MICROMECANICA','grupo_id'=>42,'Pts'=>1127,'nivel'=>4],);



// Grupo de asistencia técnica institucional 43 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'43014','name'=>'ESPECIALISTA EN ASISTENCIA TECNICA INSTITUCIONAL','grupo_id'=>43,'Pts'=>1919,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'43023','name'=>'PROMOTOR DE CURSOS','grupo_id'=>43,'Pts'=>699,'nivel'=>1],);


// Grupo de servicios religiosos 44 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'44014','name'=>'CAPELLAN','grupo_id'=>44,'Pts'=>912,'nivel'=>1],);



// Grupo de servicios de comunicaciones 45 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'45012','name'=>'TELEFONISTA','grupo_id'=>45,'Pts'=>536,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'45022','name'=>'OPERADOR DE EQUIPOS DE TELECOMUNICACIONES','grupo_id'=>45,'Pts'=>553,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'45033','name'=>'TECNICO DE EQUIPOS DE TELECOMUNICACIONES','grupo_id'=>45,'Pts'=>911,'nivel'=>2],);


// Grupo de radiodifusión 46 		 Pts 	 Nivel
DB::table('cargos')->insert(['codigo'=>'46012','name'=>'MUSICALIZADOR','grupo_id'=>46,'Pts'=>437,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'46022','name'=>'OPERADOR DE AUDIO','grupo_id'=>46,'Pts'=>467,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'46034','name'=>'ASISTENTE DE PRODUCCOON DE RADIODIFUSORA','grupo_id'=>46,'Pts'=>803,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'46043','name'=>'LOCUTOR','grupo_id'=>46,'Pts'=>623,'nivel'=>1],);
DB::table('cargos')->insert(['codigo'=>'46053','name'=>'TECNICO DE GRABACION DE RADIODIFUSORA','grupo_id'=>46,'Pts'=>948,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'46063','name'=>'SUPERVISOR DE OPERACIONES DE RADIODIFUSORA','grupo_id'=>46,'Pts'=>1502,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'46074','name'=>'COORDINADOR DE PRODUCCION DE RADIODIFUSORA','grupo_id'=>46,'Pts'=>1672,'nivel'=>7],);


// Grupo de análisis y control de finanzas, emisión de cheques y caja 47 		Pts 	 Nivel
DB::table('cargos')->insert(['codigo'=>'00082','name'=>'TAQUILLERO (CODIGO TRANSITORIO)','grupo_id'=>47,'Pts'=>453,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'47012','name'=>'CAJERO','grupo_id'=>47,'Pts'=>818,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'47023','name'=>'CAJERO JEFE','grupo_id'=>47,'Pts'=>1506,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'47033','name'=>'ASISTENTE DE TESORERIA','grupo_id'=>47,'Pts'=>893,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'47044','name'=>'JEFE DE EMISION DE PAGOS','grupo_id'=>47,'Pts'=>1542,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'47054','name'=>'JEFE DE ANALISIS Y CONTROL FINANCIERO','grupo_id'=>47,'Pts'=>1677,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'47064','name'=>'JEFE DE TESORERIA','grupo_id'=>47,'Pts'=>1884,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'47073','name'=>'ASISTENTE FINANCIERO','grupo_id'=>47,'Pts'=>889,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'47084','name'=>'ANALISTA FINANCIERO','grupo_id'=>47,'Pts'=>1291,'nivel'=>4],);




// Grupo de nómina 48 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'48013','name'=>'ASISTENTE DE NOMINA','grupo_id'=>48,'Pts'=>901,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'48024','name'=>'ANALISTA DE NOMINA','grupo_id'=>48,'Pts'=>1444,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'48034','name'=>'JEFE DE NOMINA','grupo_id'=>48,'Pts'=>1743,'nivel'=>8],);

// Grupo de control interno y auditoria 49 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'49013','name'=>'REVISOR DE CONTRALORIA','grupo_id'=>49,'Pts'=>1081,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'49024','name'=>'AUDITOR','grupo_id'=>47,'Pts'=>1523,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'49034 ','name'=>'JEFE DE CONTROL PREVIO Y/O POSTERIOR','grupo_id'=>47,'Pts'=>1899,'nivel'=>9],);




// Grupo de artes auditivas 50 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'50012','name'=>'CORALISTA LIDER DE CUERDAS','grupo_id'=>50,'Pts'=>761,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'50022','name'=>'ATRILERO','grupo_id'=>50,'Pts'=>781,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'50032','name'=>'INSTRUCTOR DE DESARROLLO EN ARTES AUDITIVAS','grupo_id'=>50,'Pts'=> 848,'nivel'=> 5],);
DB::table('cargos')->insert(['codigo'=>'50042','name'=>'ASISTENTE DE DIRECTOR DE ORFEON UNIVERSITARIO','grupo_id'=>50,'Pts'=>1013,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'50052','name'=>'INSTRUMENTISTA FOLKLORICO','grupo_id'=>50,'Pts'=>1030,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'50063','name'=>'INTERPRETE VOCAL','grupo_id'=>50,'Pts'=>933,'nivel'=> 2],);
DB::table('cargos')->insert(['codigo'=>'50073','name'=>'INSTRUMENTISTA ACADEMICO','grupo_id'=>50,'Pts'=> 1071,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'50083','name'=>'FACILITADOR DE DESARROLLO EN ARTES AUDITIVAS','grupo_id'=>50,'Pts'=> 1078,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'50094','name'=>'INSTRUMENTISTA ACADEMICO LÍDER DE CUERDAS','grupo_id'=>50,'Pts'=>1482,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'50104','name'=>'DOCENTE DE ARTES AUDITIVAS','grupo_id'=>50,'Pts'=>548,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'50114','name'=>'CONCERTINO','grupo_id'=>50,'Pts'=>630,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'50124','name'=>'DIRECTOR DE AGRUPACION MUSICAL','grupo_id'=>50,'Pts'=>838,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'50134','name'=>'DIRECTOR DE CORAL','grupo_id'=>50,'Pts'=>1815,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'50144','name'=>'DIRECTOR DE ORQUESTA','grupo_id'=>50,'Pts'=> 1953,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'50154','name'=>'DIRECTOR DE ORFEON UNIVERSITARIO','grupo_id'=>50,'Pts'=> 1974,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'50164','name'=>'ARREGLISTA MUSICAL','grupo_id'=>50,'Pts'=>177,'nivel'=>3],);



// Grupo de artes escénicas 51 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'51012','name'=>'INSTRUCTOR DE DESARROLLO EN ARTES ESCENICAS','grupo_id'=>51,'Pts'=>971,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'51023','name'=>'FACILITADOR DE DESARROLLO EN ARTES ESCENICAS','grupo_id'=>51,'Pts'=>1101,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'51033','name'=>'ACTOR','grupo_id'=>51,'Pts'=>1121,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'51044','name'=>'DOCENTE EN ARTES ESCENICAS','grupo_id'=>51,'Pts'=>1661,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'51054','name'=>'DIRECTOR DE BALLET O DANZA','grupo_id'=>51,'Pts'=>1744,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'51064','name'=>'DIRECTOR DE TITERES Y MARIONETAS','grupo_id'=>51,'Pts'=>1825,'nivel'=>8],);
DB::table('cargos')->insert(['codigo'=>'51074','name'=>'DIRECTOR DE TEATRO','grupo_id'=>51,'Pts'=>1818,'nivel'=>8],);



// Grupo de artes plásticas 52 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'52012','name'=>'INSTRUCTOR DE DESARROLLO EN ARTES PLASTICAS','grupo_id'=>52,'Pts'=>937,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'52023','name'=>'FACILITADOR DE DESARROLLO EN ARTES PLÁSTICAS','grupo_id'=>52,'Pts'=>1210,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'52034','name'=>'CURADOR','grupo_id'=>52,'Pts'=>1419,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'52044','name'=>'DOCENTE DE ARTES PLÁSTICAS','grupo_id'=>52,'Pts'=> 	1649,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'52052','name'=>'AYUDANTE DE TALLER DE ARTES DEL FUEGO','grupo_id'=>52,'Pts'=> 	720,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'52074','name'=>'SERIGRAFISTA PRINCIPAL','grupo_id'=>52,'Pts'=>1656,'nivel'=>7],);



// Grupo de asistencia y gerencia cultural
// 53 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'53012','name'=>'AUXILIAR DE SERVICIOS PARA EL ARTE','grupo_id'=>53,'Pts'=>1049,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'53023','name'=>'ASISTENTE DE ORGANIZACION CULTURAL','grupo_id'=>53,'Pts'=>1150,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'53034','name'=>'PROMOTOR CULTURAL','grupo_id'=>53,'Pts'=>1544,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'53044','name'=>'ASESOR ARTISTICO','grupo_id'=>53,'Pts'=>1551,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'53054','name'=>'COORDINADOR SECTORIAL DE CULTURA','grupo_id'=>53,'Pts'=>1873,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'53064','name'=>'GERENTE DE PROMOCION Y ADMINISTRACION DE ESPACIOS Y PATRIMONIO CULTURAL','grupo_id'=>53,'Pts'=>2079,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'53074','name'=>'ANIMADOR CULTURAL','grupo_id'=>53,'Pts'=>2096,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'53084','name'=>'JEFE DE ARTES','grupo_id'=>53,'Pts'=>2107,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'53094','name'=>'COORDINADOR DE CENTRO DE ESTUDIOS EN ARTES','grupo_id'=>53,'Pts'=>2125,'nivel'=>9],);
DB::table('cargos')->insert(['codigo'=>'53104','name'=>'COORDINADOR DE CINE CLUB','grupo_id'=>53,'Pts'=>1468,'nivel'=>6],);



// Grupo de operaciones navales 54 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'54013','name'=>'MAQUINISTA DE BUQUE','grupo_id'=>54,'Pts'=>976,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'54024','name'=>'CAPITAN DE BUQUE','grupo_id'=>54,'Pts'=>1874,'nivel'=>9],);


// Grupo de veterinaria, acuicultura y zootecnia  55 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'55013','name'=>'ASISTENTE DE VETERINARIA','grupo_id'=>55,'Pts'=>876,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'55023','name'=>'TECNICO ACUICULTOR','grupo_id'=>55,'Pts'=>917,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'55033','name'=>'ASISTENTE DE ZOOTECNIA','grupo_id'=>55,'Pts'=>999,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'55044','name'=>'MEDICO VETERINARIO','grupo_id'=>55,'Pts'=>1719,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'55054','name'=>'ZOOTECNISTA','grupo_id'=>55,'Pts'=>1348,'nivel'=>5],);



// Grupo de ingeniería y técnica forestal y de minas 56 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'56013','name'=>'TECNICO FORESTAL','grupo_id'=>56,'Pts'=>877,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'56024','name'=>'INGENIERO FORESTAL','grupo_id'=>56,'Pts'=>1541,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'56033','name'=>'TECNICO DE GEOLOGIA Y MINAS','grupo_id'=>56,'Pts'=>978,'nivel'=>3],);
DB::table('cargos')->insert(['codigo'=>'56043','name'=>'TALLADOR DE DIAMANTES','grupo_id'=>56,'Pts'=>1240,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'56053','name'=>'TECNICO DE PETROLEO','grupo_id'=>56,'Pts'=>1139,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'56063','name'=>'ASISTENTE DE HIDROMETEOROLOGIA','grupo_id'=>56,'Pts'=>831,'nivel'=>2],);


// Grupo de farmacia  57 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'57013','name'=>'ASISTENTE DE FARMACIA','grupo_id'=>57,'Pts'=>845,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'57024','name'=>'FARMACEUTICO','grupo_id'=>57,'Pts'=>1700,'nivel'=>7],);



// Grupo agropecuario  58 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'58013','name'=>'ASISTENTE AGROPECUARIO','grupo_id'=>58,'Pts'=>868,'nivel'=>2],);
DB::table('cargos')->insert(['codigo'=>'58023','name'=>'TECNICO AGROPECUARIO','grupo_id'=>58,'Pts'=>1306,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'58034','name'=>'INGENIERO AGRONOMO','grupo_id'=>58,'Pts'=>1401,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'58044','name'=>'INGENIERO AGRONOMO JEFE','grupo_id'=>58,'Pts'=>1815,'nivel'=>8],);

// Grupo de bomberos 59 		Pts 	Nivel
DB::table('cargos')->insert(['codigo'=>'59012','name'=>'BOMBERO','grupo_id'=>59,'Pts'=>745,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'59023','name'=>'BOMBERO INSPECTOR','grupo_id'=>59,'Pts'=>1152,'nivel'=>4],);
DB::table('cargos')->insert(['codigo'=>'59033','name'=>'BOMBERO JEFE','grupo_id'=>59,'Pts'=>1318,'nivel'=>5],);
DB::table('cargos')->insert(['codigo'=>'59043','name'=>'JEFE DE OPERACIONES BOMBERILES','grupo_id'=>59,'Pts'=>1593,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'59053','name'=>'JEFE DE PREVENCION, INVESTIGACION E INSPECCION DE INCENDIOS','grupo_id'=>59,'Pts'=>1749,'nivel'=>6],);
DB::table('cargos')->insert(['codigo'=>'59064','name'=>'INSPECTOR GENERAL DE LOS SERVICIOS BOMBERILES','grupo_id'=>59,'Pts'=>1711,'nivel'=>7],);
DB::table('cargos')->insert(['codigo'=>'59074','name'=>'COMANDANTE DEL CUERPO DE BOMBEROS','grupo_id'=>59,'Pts'=>2001,'nivel'=>9],);

//CARGOS PERSONALIZADOS
DB::table('cargos')->insert(['codigo'=>null,'name'=>'ASEADOR','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'CHOFER','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'MENSAJERO INTERNO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'MENSAJERO EXTERNO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'AYUDANTE DE MANTENIMIENTO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'SUPERVISOR DE VIGILANCIA','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'AYUDANTE DE MANTENIMIENTO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'SUPERVISOR DE VIGILANCIA','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'SUPERVISOR DE SERVICIOS','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'AYUDANTE DE SERVICIO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'JARDINERO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'VIGILANTE','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'MECANICO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'MECANICO EN REFRIGERACION','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'ALBAÑIL','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'ELECTRICISTA','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'ALMACENISTA','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'SUPERVISOR DE MANTENIMIENTO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'AUXILIAR DE ENFERMERIA','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'HERRERO SOLDADOR','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'PLOMERO','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'ENCUADERNADOR','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'PINTOR','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
DB::table('cargos')->insert(['codigo'=>null,'name'=>'ASISTENTE','grupo_id'=>null,'Pts'=>null,'nivel'=>null],);
    }
}

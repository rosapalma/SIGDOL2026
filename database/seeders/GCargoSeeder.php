<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
		//DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('gcargos')->truncate();
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		
       
        DB::table('gcargos')->insert(['name' => 'Grupo Secretarial']);
        DB::table('gcargos')->insert(['name' => 'Grupo de Información y control estudiantil', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de biblioteca e información especializada', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de psicología y orientación', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de archivo', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de contaduría', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de presupuesto', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de administración', ]);
        DB::table('gcargos')->insert(['name' => 'Grupo de almacén y compras']);
        DB::table('gcargos')->insert(['name' => 'Grupo de administración de recursos humanos']);
        DB::table('gcargos')->insert(['name' => 'Grupo de informática']);
        DB::table('gcargos')->insert(['name' => 'Grupo de control, inspección de obras y mantenimiento de edificios']);
        DB::table('gcargos')->insert(['name' => 'Grupo de servicios, reparación, mantenimiento y control automotor']);
        DB::table('gcargos')->insert(['name' => 'Grupo de servicios generales']);
        DB::table('gcargos')->insert(['name' => 'Grupo de organización y planificación']);
        DB::table('gcargos')->insert(['name' => 'Grupo de registro y control de bienes']);
        DB::table('gcargos')->insert(['name' => 'Grupo de prensa y relaciones publicas e interinstitucionales']);
        DB::table('gcargos')->insert(['name' => 'Grupo de asesoría legal']);
        DB::table('gcargos')->insert(['name' => 'Grupo de laboratorio clínico, técnico y profesional']);
        DB::table('gcargos')->insert(['name' => 'Grupo de producción, reproducción y expendio de publicaciones']);
        DB::table('gcargos')->insert(['name' => 'Grupo de dibujo, diagramación y diseño gráfico']);
        DB::table('gcargos')->insert(['name' => 'Grupo de seguros']);
        DB::table('gcargos')->insert(['name' => 'Grupo de deporte']);
		DB::table('gcargos')->insert(['name' => 'Grupo de diseño académico']);
		DB::table('gcargos')->insert(['name' => 'Grupo de administración de programa de pasantías']);
		DB::table('gcargos')->insert(['name' => 'Grupo de estudios para graduados']);
		DB::table('gcargos')->insert(['name' => 'Grupo de investigación']);
		DB::table('gcargos')->insert(['name' => 'Grupo de medicina']);
		DB::table('gcargos')->insert(['name' => 'Grupo de correo']);
		DB::table('gcargos')->insert(['name' => 'Grupo de odontología']);
		DB::table('gcargos')->insert(['name' => 'Grupo de citotecnología']);
		DB::table('gcargos')->insert(['name' => 'Grupo de salud publica']);
		DB::table('gcargos')->insert(['name' => 'Grupo de servicios sociales']);
		DB::table('gcargos')->insert(['name' => 'Grupo de seguridad integral']);
		DB::table('gcargos')->insert(['name' => 'Grupo de técnicas educativas y medios audiovisuales']);
		DB::table('gcargos')->insert(['name' => 'Grupo de educación preescolar y básica']);
		DB::table('gcargos')->insert(['name' => 'Grupo de arquitectura y topografía']);
		DB::table('gcargos')->insert(['name' => 'Grupo de asuntos literarios']);
		DB::table('gcargos')->insert(['name' => 'Grupo de servicios y administración de áreas nutricionales']);
		DB::table('gcargos')->insert(['name' => 'Grupo de idiomas']);
		DB::table('gcargos')->insert(['name' => 'Grupo de técnica química']);
		DB::table('gcargos')->insert(['name' => 'Grupo de técnica eléctrica, mecánica y electrónica']);
		DB::table('gcargos')->insert(['name' => 'Grupo de asistencia técnica institucional']);
		DB::table('gcargos')->insert(['name' => 'Grupo de servicios religiosos']);
		DB::table('gcargos')->insert(['name' => 'Grupo de servicios de comunicaciones']);
		DB::table('gcargos')->insert(['name' => 'Grupo de radiodifusión']);
		DB::table('gcargos')->insert(['name' => 'Grupo de análisis y control de finanzas, emisión de cheques y caja']);
		DB::table('gcargos')->insert(['name' => 'Grupo de nómina']);
		DB::table('gcargos')->insert(['name' => 'Grupo de control interno y auditoria']);
		DB::table('gcargos')->insert(['name' => 'Grupo de artes auditivas']);
		DB::table('gcargos')->insert(['name' => 'Grupo de artes escénicas']);
		DB::table('gcargos')->insert(['name' => 'Grupo de artes plásticas']);
		DB::table('gcargos')->insert(['name' => 'Grupo de asistencia y gerencia cultural']);
		DB::table('gcargos')->insert(['name' => 'Grupo de operaciones navales']);
		DB::table('gcargos')->insert(['name' => 'Grupo de veterinaria, acuicultura y zootecnia']);
		DB::table('gcargos')->insert(['name' => 'Grupo de ingeniería y técnica forestal y de minas']);
		DB::table('gcargos')->insert(['name' => 'Grupo de farmacia']);
		DB::table('gcargos')->insert(['name' => 'Grupo agropecuario']);
		DB::table('gcargos')->insert(['name' => 'Grupo de bomberos']);
    }
}

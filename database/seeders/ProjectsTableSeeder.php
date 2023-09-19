<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'Migracion de Contaplus a SAP',
            'description' => 'El cliente solicita una migracion de Contaplus a SAP manteniendo la información de todos los años contables',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('projects')->insert([
            'name' => 'Diseño de logotipo para empresa de alimentación',
            'description' => 'Se busca un logotipo moderno y llamativo para una nueva empresa de comida rápida.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('projects')->insert([
            'name' => 'Desarrollo de sistema de gestión de ventas',
            'description' => 'Se requiere un sistema de gestión de ventas que permita controlar el stock de productos y las ventas realizadas.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('projects')->insert([
            'name' => 'Implementación de certificación ISO 9001',
            'description' => 'La empresa necesita implementar la certificación ISO 9001 para mejorar sus procesos y aumentar la calidad de sus productos.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('projects')->insert([
            'name' => 'Diseño de página web para empresa de turismo',
            'description' => 'Se necesita una página web atractiva y funcional para una empresa de turismo que permita reservar tours y paquetes vacacionales.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('projects')->insert([
            'name' => 'Desarrollo de aplicación móvil para gestión de tareas',
            'description' => 'Se requiere una aplicación móvil para iOS y Android que permita crear, asignar y gestionar tareas en tiempo real.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // 6
        DB::table('projects')->insert([
            'name' => 'Desarrollo de sistema de gestión de proyectos',
            'description' => 'Se necesita un sistema de gestión de proyectos que permita organizar las tareas, plazos y presupuestos de varios proyectos al mismo tiempo.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('projects')->insert([
            'name' => 'Implementación de herramientas de automatización de procesos',
            'description' => 'Se busca implementar herramientas de automatización de procesos para reducir costos y aumentar la eficiencia en la empresa.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('projects')->insert([
            'name' => 'Migración de servidor a la nube',
            'description' => 'Se necesita migrar los servidores de la empresa a la nube para aumentar la disponibilidad y seguridad de los datos.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'name' => 'Task1',
            'description' => 'Front Develop',
            'state' => 'toDo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'project_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('tasks')->insert([
            'name' => 'Task2',
            'description' => 'Mockup',
            'state' => 'inProgress',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'project_id' => 1,
            'user_id' => 2,
        ]);
    }
}

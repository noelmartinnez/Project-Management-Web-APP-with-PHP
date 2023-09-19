<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('issues')->insert([
            'name' => 'Issue 1',
            'description' => 'Front Develop...',
            'priority' => 'High',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'project_id' => 1,
            'user_id' => 1,
        ]);

        DB::table('issues')->insert([
            'name' => 'Issue 2',
            'description' => 'Mockup...',
            'priority' => 'Medium',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'project_id' => 1,
            'user_id' => 2,
        ]);
    }
}

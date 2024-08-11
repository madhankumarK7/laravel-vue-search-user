<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            ['name' => 'HR', 'created_at' => Carbon::now()],
            ['name' => 'Application Development', 'created_at' => Carbon::now()],
            ['name' => 'Web Development', 'created_at' => Carbon::now()],
            ['name' => 'Sales & Marketing', 'created_at' => Carbon::now()],
        ]);        
    }
}

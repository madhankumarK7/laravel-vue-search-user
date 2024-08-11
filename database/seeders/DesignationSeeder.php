<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('designations')->insert([
            ['name' => 'HR Assistant', 'created_at' => Carbon::now()],
            ['name' => 'Marketing Manager', 'created_at' => Carbon::now()],
            ['name' => 'Mobile App Developer', 'created_at' => Carbon::now()],
            ['name' => 'UI Developer', 'created_at' => Carbon::now()],
            ['name' => 'PHP Web Developer', 'created_at' => Carbon::now()],
        ]);        
    }
}

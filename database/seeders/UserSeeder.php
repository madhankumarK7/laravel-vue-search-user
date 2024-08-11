<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => 'John Doe', 'fk_department' => 1, 'fk_designation' => 1, 'phone_number' => '9876452311', 'created_at' => Carbon::now()],
            ['name' => 'Jane Smith', 'fk_department' => 4, 'fk_designation' => 2, 'phone_number' => '9987654321', 'created_at' => Carbon::now()],
            ['name' => 'Alice Johnson', 'fk_department' => 2, 'fk_designation' => 3, 'phone_number' => '9922334455', 'created_at' => Carbon::now()],
            ['name' => 'Sundar Raj', 'fk_department' => 3, 'fk_designation' => 4, 'phone_number' => '9922334455', 'created_at' => Carbon::now()],
            ['name' => 'James Anderson', 'fk_department' => 3, 'fk_designation' => 5, 'phone_number' => '9722664455', 'created_at' => Carbon::now()],
        ]);        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stack;

class StackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stack::firstOrCreate(['name'=>'Laravel']);
        Stack::firstOrCreate(['name'=>'PHP']);
        Stack::firstOrCreate(['name'=>'Django']);
        Stack::firstOrCreate(['name'=>'MySQL']);
        Stack::firstOrCreate(['name'=>'NodeJS']);
        Stack::firstOrCreate(['name'=>'NuxtJS']);
        Stack::firstOrCreate(['name'=>'JavaScript']);
        Stack::firstOrCreate(['name'=>'HTML']);
    }
}

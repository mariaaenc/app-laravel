<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Register;
use App\Models\Stack;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $register = Register::factory()
            ->count(10)
            ->create();
    }
}

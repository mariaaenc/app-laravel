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
            ->has(Stack::factory()->count(3))
            ->create();
    }
}

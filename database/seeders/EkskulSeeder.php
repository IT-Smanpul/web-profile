<?php

namespace Database\Seeders;

use App\Models\Ekskul;
use Illuminate\Database\Seeder;

class EkskulSeeder extends Seeder
{
    public function run(): void
    {
        Ekskul::factory(30)->create();
    }
}

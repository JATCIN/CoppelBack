<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paises;
class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paises=new Paises;
        $paises->nombre="Mexico";
        $paises->save();

        $paises=new Paises;
        $paises->nombre="Argentina";
        $paises->save();

        $paises=new Paises;
        $paises->nombre="Estados Unidos";
        $paises->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estados;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //estados pais_id "1"
        $estados=new Estados;
        $estados->nombre="Aguascalientes";
        $estados->paises_id="1";
        $estados->save();

        $estados=new Estados;
        $estados->nombre="Campeche";
        $estados->paises_id="1";
        $estados->save();

        $estados=new Estados;
        $estados->nombre="Cdmx";
        $estados->paises_id="1";
        $estados->save();

        //estados pais_id "2"
        $estados=new Estados;
        $estados->nombre="Buenos Aires";
        $estados->paises_id="2";
        $estados->save();

         //estados pais_id "3"
         $estados=new Estados;
         $estados->nombre="California";
         $estados->paises_id="3";
         $estados->save();
    }
}

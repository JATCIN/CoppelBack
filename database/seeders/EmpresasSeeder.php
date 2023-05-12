<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresas;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $empresas=new Empresas;
        $empresas->nombre="Afore Coppel";
        $empresas->save();

        $empresas=new Empresas;
        $empresas->nombre="BanCoppel";
        $empresas->save();

        $empresas=new Empresas;
        $empresas->nombre="Coppel";
        $empresas->save();
    }
}

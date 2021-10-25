<?php

namespace Database\Seeders;

use App\Models\Empresa;
use Illuminate\Database\Seeder;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::factory()->create([
            'nombre' => 'Almacenes De Pratti',
            'ruc' => '123456789001',
        ]);

        Empresa::factory()->create([
            'nombre' => 'Etafashion',
            'ruc' => '123444458001',
        ]);

        Empresa::factory()->count(4)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_recetas')->insert([
            'nombre'=> 'Pizza',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);
        DB::table('categoria_recetas')->insert([
            'nombre'=> 'Postre',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);
        DB::table('categoria_recetas')->insert([
            'nombre'=> 'Ensalada',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);
        DB::table('categoria_recetas')->insert([
            'nombre'=> 'Plato fuerte',
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s'),
        ]);
    }
}

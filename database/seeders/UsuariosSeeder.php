<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Cristian',
            'email'=> 'crisanbed@gmail.com',
            'password'=>Hash::make('acorazado'),
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'name'=>'Carlos',
            'email'=> 'carlos@gmail.com',
            'password'=>Hash::make('123456789'),
            'created_at' => date('y-m-d H:m:s'),
            'updated_at' => date('y-m-d H:m:s')
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user=User::create([
            'name'=>'Cristian',
            'email'=> 'crisanbed@gmail.com',
            'password'=>Hash::make('acorazado'),
            'url'=>'https://laravel.com/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $user=User::create([
            'name'=>'Carlos',
            'email'=> 'carlos@gmail.com',
            'password'=>Hash::make('123456789'),
            'url'=>'https://laravel.com/',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}

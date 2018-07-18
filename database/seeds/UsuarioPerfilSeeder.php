<?php

use Illuminate\Database\Seeder;
use App\Models\User as User;
use App\Models\Perfil as Perfil;
use Faker\Factory as Faker;

class UsuarioPerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");

        $usuarios = DB::table("usuarios")->pluck("id_usuario")->all();
        $perfil = DB::table("perfil")->pluck("id_perfil")->all();

        foreach( range(1, 20) as $i ){
        	DB::table("usuario_perfil")->insert([
        		'id_usuario' => $faker->unique()->randomElement($usuarios),
        		'id_perfil' => $faker->randomElement($perfil)
        	]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\Perfil as Perfil;
use Faker\Factory as Faker;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");

        foreach( range(1,5) as $i){
        	Perfil::create([
        		'desc_perfil' => $faker->colorName,
        		'nm_nivel' => $faker->unique()->randomDigit
        	]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\User as User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("pt_BR");

        foreach( range(1, 10) as $i){
        	User::create([
        		'nome' => $faker->name,
        		'email' => $faker->freeEmail,
        		'senha' => $faker->password
        	]);
        }
    }
}

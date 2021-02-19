<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocietySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('societies')->insert([
         'name' => 'DodoPizza',
         'logo' => 'logo.png',
         'email' => 'dodopizza@test.com',
         'phone' => 0556111111,
         'number' => '4',
         'adress' => 'allée des artichauts',
         'city' => 'Arès',
         'code' => '33123',
         'description' => 'Les meilleurs pizza de votre vie',
      ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('products')->insert([
         'name' => 'Bienvenue',
         'image' => 'bienvenue.jpg',
         'type' => 'pizza',
         'price' => 8.00,
      ]);

      DB::table('products')->insert([
         'name' => 'Royal',
         'image' => 'royale.jpg',
         'type' => 'pizza',
         'price' => 8.50,
      ]);

      DB::table('products')->insert([
         'name' => 'Chorizo',
         'image' => 'chorizo.jpg',
         'type' => 'pizza',
         'price' => 11.40,
      ]);

      DB::table('products')->insert([
         'name' => 'Honolulu',
         'image' => 'honolulu.jpg',
         'type' => 'pizza',
         'price' => 12.00,
      ]);
    }
}

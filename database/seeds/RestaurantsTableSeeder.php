<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	DB::table('restaurants')->insert(['nom_restaurant' => "Mr Snack"]);
    	DB::table('restaurants')->insert(['nom_restaurant' => "Subway"]);
    	DB::table('restaurants')->insert(['nom_restaurant' => "CCC"]);
    }
}

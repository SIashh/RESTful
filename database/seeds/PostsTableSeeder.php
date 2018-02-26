<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	foreach (range(1, 10) as $index) {
    		DB::table('posts')->insert([
            'nom' => "Offre $index" ,
            'domaine' => "Informatique" ,
            'niveauetude' => "DUT" ,
            'datedebut' => "09/04/18" ,
            'duree' => "10 semaines" ,
            'lien' => "none" ,
        ]);
    	}
        
    }
}

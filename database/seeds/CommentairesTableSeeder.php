<?php

use Illuminate\Database\Seeder;

class CommentairesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
    	DB::table('commentaires')->insert([
            'commentaires' => "J'apprécie" ,
            'note' => "3.5" ,
            'id_restaurants' => "2",
            'id_users' => "1",
        ]);

    	
    }
}

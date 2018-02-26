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
        /*
        factory(App\Post::class, 10)->create();
        */
    	foreach (range(1, 10) as $index) {
    		DB::table('posts')->insert([
            'commentaire' => "J'apprécie" ,
            'note' => "3.5" ,
        ]);
    	}
    }
}

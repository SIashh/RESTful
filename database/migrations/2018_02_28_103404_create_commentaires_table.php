<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->integer('id');
            $table->string('commentaires');
            $table->float('note');
            $table->integer('id_restaurants')->unsigned();
            $table->integer('id_users')->unsigned();
            $table->primary(['id_restaurants', 'id_users']);
            $table->timestamps();
        });

        DB::statement('ALTER Table commentaires MODIFY id INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}

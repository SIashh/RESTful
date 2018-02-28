<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commentaires', function(Blueprint $table) {
            $table->foreign('id_restaurants')->references('id')->on('restaurants')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('commentaires', function(Blueprint $table) {
            $table->foreign('id_users')->references('id')->on('users')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commentaires', function(Blueprint $table) {
            $table->dropForeign('commentaires_id_restaurants_foreign');
        });
        Schema::table('commentaires', function(Blueprint $table) {
            $table->dropForeign('commentaires_id_users_foreign');
        });
    }
}

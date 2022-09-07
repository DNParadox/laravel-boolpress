<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Aggiungiamo la colonna category_id
            $table->unsignedBigInteger('category_id')
                ->nullable()
                ->after('slug');

            // Aggiungiamo la relazione
            $table->foreign('category_id')
                ->references('id')
                ->on('users_selects')
                ->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Cancelliamo la relazione
            $table->dropForeign('posts_category_id_foreign');

            // Cancelliamo la colonna

            $table->dropColumn('category_id');
        });
    }
}

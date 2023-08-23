<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmToModalidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  
       Já inserido na migração de modalidades
       Schema::table('modalidades', function (Blueprint $table) {
            $table->boolean('confirmado')->default(FALSE);
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('modalidades', function($table) {
        /* Schema::table('modalidades', function($table) {
            $table->dropColumn('confirmado');
        }); */
    }
}

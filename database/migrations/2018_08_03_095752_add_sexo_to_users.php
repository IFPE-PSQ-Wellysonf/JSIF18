<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSexoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* 
       Já inserido na migração de usuários
        Schema::table('users', function($table) {
            $table->string('sexo')->default('M');
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Schema::table('users', function($table) {
            $table->dropColumn('sexo');
        }); */
    }
}

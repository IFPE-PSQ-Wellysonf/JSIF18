<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email',150)->unique()->nullable();
            $table->string('password');
            $table->integer('campus_id')->unsigned();
            $table->integer('siape')->unsigned();
            $table->string('cpf', 11);
            $table->string('cod_uorg');
            $table->string('nome_uorg');
            $table->date('nascimento');
            $table->string('sexo')->default('M');
            $table->string('situacao_vinculo');
            $table->boolean('endereco_confirmado')->default(FALSE);
            $table->string('endereco_logradouro');
            $table->string('endereco_numero');
            $table->string('endereco_complemento');
            $table->string('endereco_bairro');
            $table->string('endereco_cep');
            $table->string('endereco_municipio');
            $table->boolean('admin')->default(FALSE);
            $table->boolean('solicitou_diarias')->default(FALSE);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('campus_id')->references('id')->on('campi')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropForeign(['campus_id']);
        });
        Schema::dropIfExists('users');
    }
}

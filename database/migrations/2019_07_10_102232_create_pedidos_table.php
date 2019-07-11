<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePedidosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('produto');
            $table->integer('qtd');
            $table->decimal('valor_unitario', 13, 2);
            $table->date('data');
            $table->string('solicitante');
            $table->string('cep', 9);
            $table->string('uf', 2);
            $table->string('municipio');
            $table->string('bairro');
            $table->string('rua');
            $table->string('numero');
            $table->string('despachante');
            $table->enum('situacao', ['PNDT','ENVD','ENTR']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pedidos');
    }
}

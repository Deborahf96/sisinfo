<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDipendenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dipendente', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('iban');
            $table->string('ruolo');
            $table->string('tipo_contratto');
            $table->string('stipendio');
            $table->date('data_inizio');
            $table->date('data_fine')->nullable();
            $table->integer('ore_settimanali');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dipendente');
    }
}

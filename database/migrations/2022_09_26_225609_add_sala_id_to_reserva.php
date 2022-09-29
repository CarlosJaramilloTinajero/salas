<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSalaIdToReserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            //Creacion de llave foranea sala_id en la tabla reservas
            $table->bigInteger('sala_id')->unsigned();
            $table
                ->foreign('sala_id')
                ->references('id')
                ->on('salas')
                ->after('observaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            //
        });
    }
}

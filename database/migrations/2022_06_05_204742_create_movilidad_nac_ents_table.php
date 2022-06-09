<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movilidad_nac_ents', function (Blueprint $table) {
            $table->id();
            $table->string('tipoPersona', 20);
            $table->string('nombrePersona');
            $table->string('titulosOb')->nullable();
            $table->string('instEntOrig');
            $table->string('ciudadOrig', 70);
            $table->string('activo', 2);
            $table->date('fecha');
            $table->string('vigencia');
            $table->string('sedeReg')->nullable();
            $table->text('objeto')->nullable();
            $table->text('resultado')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movilidad_nac_ents');
    }
};

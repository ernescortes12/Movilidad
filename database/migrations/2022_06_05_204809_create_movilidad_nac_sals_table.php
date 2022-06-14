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
        Schema::create('movilidad_nac_sals', function (Blueprint $table) {
            $table->id();
            $table->string('tipoPersona', 20);
            $table->string('firstNameSup');
            $table->string('secnameSup')->nullable();
            $table->string('lastNameSup');
            $table->string('titulosOb')->nullable();
            $table->string('activo', 2);
            $table->date('fecha');
            $table->date('vigencia');
            $table->string('sedeReg')->nullable();
            $table->string('objeto', 600)->nullable();
            $table->string('resultado', 600)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->bigInteger('instEnt_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('instEnt_id')->references('id')->on('inst_ent_nacs')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('movilidad_nac_sals');
    }
};

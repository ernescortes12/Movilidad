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
        Schema::create('convenio_ints', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->integer('añoVin');
            $table->string('tipo', 180);
            $table->date('vigencia', 200);
            $table->string('int_ent', 200);
            $table->string('programa', 200);
            $table->string('objeto', 600)->nullable();
            $table->string('alcance', 600)->nullable();
            $table->string('activo', 2)->nullable();
            $table->date('fechaInicio')->nullable();
            $table->string('vig_pro', 200)->nullable();
            $table->string('docSupervisor');
            $table->string('nombProsesion');
            $table->string('constRegistro');
            $table->string('certFacultad');
            $table->string('infEstudios')->nullable(); //si
            $table->string('minuta');
            $table->string('garantias')->nullable(); //si
            $table->string('actaSeguimiento')->nullable(); //si
            $table->string('resnombSupervisor');
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
        Schema::dropIfExists('convenio_ints');
    }
};

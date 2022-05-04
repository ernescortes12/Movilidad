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
            $table->integer('añoVin');
            $table->string('tipo', 180);
            $table->string('vigencia', 200);
            $table->string('int_ent', 200);
            $table->string('programa', 200);
            $table->text('objeto');
            $table->text('alcance');
            $table->string('activo', 2);
            $table->date('fechaInicio');
            $table->string('vig_pro', 200);
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

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
        Schema::create('convenio_nacs', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->date('fechaInicio');
            $table->string('tipo');
            $table->string('supervisor', 120);
            $table->string('instEntNac', 200);
            $table->string('dtpcitymun', 120)->nullable();
            $table->string('nit', 12)->nullable();
            $table->text('recursos')->nullable();
            $table->string('vigencia', 200);
            $table->string('docSoportes')->nullable();
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
        Schema::dropIfExists('convenio_nacs');
    }
};

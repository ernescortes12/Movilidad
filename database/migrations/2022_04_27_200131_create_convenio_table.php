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
        Schema::create('convenio', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->date('conv_fecha');
            $table->string('conv_programa', 64);
            $table->string('conv_ent_inst', 128);
            $table->string('conv_ent_inst_nit', 10);
            $table->text('conv_recursos');
            $table->string('conv_cdp', 20);
            $table->string('conv_rp', 20);
            //Falta crear vigencia del convenio
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
        Schema::dropIfExists('convenio');
    }
};

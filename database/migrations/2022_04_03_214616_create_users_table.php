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
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('email', 50)->unique();
            $table->string('password');
            $table->bigInteger('rol_id')->unsigned();
            $table->timestamps();

            $table->foreign('rol_id')->references('id')->on('roles')
                ->onDelete('cascade')->onUpdate('cascade');
        });

        // Schema::table('users', function (Blueprint $table) {

        //     // $table->foreign('rol_id')->references('id')->on("roles");
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('surname', 255);
            $table->string('cpf', 14);
            $table->string('phone', 13);
            $table->string('cellphone', 14);
            $table->string('email', 255);
            $table->string('zip_code', 20);
            $table->string('street', 300);
            $table->string('district',200);
            $table->string('city', 50);
            $table->string('state', 4);
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
        Schema::dropIfExists('citizen');
    }
}

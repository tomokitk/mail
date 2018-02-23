<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaillistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maillist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conpany');
            $table->string('department');
            $table->string('position');
            $table->string('name');
            $table->string('e-mail');
            $table->integer('postcode');
            $table->string('adress');
            $table->string('TELcompany');
            $table->string('TELdepartment');
            $table->string('TELdirect');
            $table->string('FAX');
            $table->string('phonenumber');
            $table->text('URL');
            $table->string('trade_day');
            $table->integer('eightfrinds_num');
            $table->string('now_dating');
            $table->string('?');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maillist');
    }
}

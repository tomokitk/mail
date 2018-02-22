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
            $table->string('部署名');
            $table->string('役職');
            $table->string('氏名');
            $table->string('e-mail');
            $table->integer('郵便番号');
            $table->string('住所');
            $table->string('TEL会社');
            $table->string('TEl部門');
            $table->string('TEl直通');
            $table->string('FAX');
            $table->string('携帯番号');
            $table->text('URL');
            $table->string('名刺交換日');
            $table->integer('EIGHTでつながっている人');
            $table->string('再データ化中の名刺');
            $table->string('?を含んだデータ');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;


class CreateImportsTable extends Migration
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('department');
            $table->string('positon');
            $table->string('name');
            $table->string('e_mail');
            $table->string('postcode');
            $table->string('adress');
            $table->string('TEL');
            $table->string('TELdepartment');
            $table->string('TELdirect');
            $table->string('FAX');
            $table->string('phonenumber');
            $table->text('URL');
            $table->string('trade_day');
            $table->string('eightfrinds_num');
            $table->string('now_dating');
            $table->string('question');
            $table->softDeletes();
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
        Schema::dropIfExists('imports');
    }
}

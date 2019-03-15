<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBdaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bdays', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname');            
            $table->string('phone');
            $table->text('address');
            $table->string('occupation');
            $table->string('dob');
            $table->string('day');
            $table->string('month');
            $table->string('email');
            $table->string('marital_status');  
            $table->string('gender'); 
            $table->string('subgroup');
            $table->string('position');
            $table->string('all_grp');            
            $table->string('region');
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
        Schema::dropIfExists('bdays');
    }
}

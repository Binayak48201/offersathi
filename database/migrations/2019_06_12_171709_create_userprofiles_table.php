<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('userprofiles', function (Blueprint $table) {
		    $table->increments('id');
		    $table->unsignedInteger('users_id');
		    $table->string('address');
		    $table->string('phone_number');
		    $table->string('city');
		    $table->string('country');
		    $table->mediumText('body');
		    $table->string('user_img')->default('default.jpg');
		    $table->timestamps();
		    $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userprofiles');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('replies', function (Blueprint $table) {
		    $table->bigIncrements('id');
		    $table->unsignedInteger('user_id');
		    $table->unsignedInteger('advertisments_id');
		    $table->text('body');
		    $table->timestamps();
		    $table->foreign('advertisments_id')->references('id')->on('advertisments')->onDelete('cascade');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('replies');
    }
}

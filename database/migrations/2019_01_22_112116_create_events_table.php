<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('head_name');
            $table->string('head_image');
            $table->string('head_phone');
            $table->string('head_mail');
            $table->string('info');
            $table->text('rules');
            $table->integer('groupevent');
            $table->integer('groupnumber');
            $table->integer('maxnumber');
            $table->integer('exclusive');
            $table->string('slug');
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
        Schema::dropIfExists('events');
    }
}

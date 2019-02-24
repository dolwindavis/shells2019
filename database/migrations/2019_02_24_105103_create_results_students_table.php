<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('results_students', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('results_main_id');
            $table->string('student_name');
            $table->integer('college_username');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results_students', function (Blueprint $table) {
            //
        });
    }
}

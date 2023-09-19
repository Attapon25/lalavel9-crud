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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('jobType'); //name
            $table->string('jobName'); //email
            $table->time('timeToStart'); //address
            $table->time('timeToEnd'); //address
            $table->string('Count'); //address
            $table->dateTime('dateRecording'); //address
            $table->dateTime('lastDateRecording'); //address
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
        Schema::dropIfExists('companies');
    }
};
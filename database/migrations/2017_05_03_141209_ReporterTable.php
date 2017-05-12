<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReporterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportTable', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUser');
            $table->integer('projectId');
            $table->string('project');
            $table->string('totalTime');
            $table->string('startTime');
            $table->string('stopTime');
            $table->string('breakTime');
            $table->string('task');
            $table->string('action');
            $table->string('knowledge',null);
            $table->string('impression',null);
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExits('reportTable');
    }
}

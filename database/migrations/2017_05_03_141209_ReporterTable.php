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
            $table->time('startTime');
            $table->time('stopTime');
            $table->integer('breakTime');
            $table->integer('totalTime');
            $table->integer('plustime',null);
            $table->text('impression',null);
            $table->text('task');
            $table->text('plan');
            $table->text('note',null);
            

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
       Schema::drop('reportTable');
    }
}

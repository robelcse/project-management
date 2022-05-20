<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_progress', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('task_id');
            $table->string('remaining');
            $table->string('working_hour');
            $table->unsignedBigInteger('developer_id');
            $table->text('work_description');


            $table->foreign('project_id')
                ->references('project_id')->on('projects')
                ->onDelete('cascade');

            $table->foreign('task_id')
                ->references('task_id')->on('tasks')
                ->onDelete('cascade');

            $table->foreign('developer_id')
                ->references('developer_id')->on('developers')
                ->onDelete('cascade');

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
        Schema::dropIfExists('task_progress');
    }
}

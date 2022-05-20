<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('task_id');
            $table->string('title');
            $table->string('description');
            $table->string('start_date');
            $table->string('due_date');
            $table->string('priority');
            $table->string('task_done')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('developer_id');
            $table->unsignedBigInteger('project_id');

            $table->foreign('developer_id')
                ->references('developer_id')->on('developers')
                ->onDelete('cascade');

            $table->foreign('project_id')
                ->references('project_id')->on('projects')
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
        Schema::dropIfExists('tasks');
    }
}

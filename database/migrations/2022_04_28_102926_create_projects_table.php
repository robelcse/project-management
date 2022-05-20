<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('project_id');
            $table->string('project_name');
            $table->text('description');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('developer_id');
            $table->string('budget');
            $table->string('start_date');
            $table->string('end_date');
            $table->text('technologies');
            $table->string('live_link')->nullable();
            $table->string('demo_link')->nullable();
            $table->string('git_link')->nullable();
            $table->integer('status')->default(0);


            $table->foreign('client_id')
                ->references('client_id')->on('clients')
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
        Schema::dropIfExists('projects');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developers', function (Blueprint $table) {
            $table->bigIncrements('developer_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->text('social_profile')->nullable();
            $table->text('market_place_profile')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->text('skills');
            $table->string('gender')->comment('male,female')->nullable();
            $table->string('picture')->nullable();
            $table->text('communication_medium')->nullable();
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
        Schema::dropIfExists('developers');
    }
}

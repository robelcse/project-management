<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('client_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('company');
            $table->string('company_website');
            $table->string('company_logo')->nullable();
            $table->string('connect_by')->nullable();
            $table->text('social_profile')->nullable();
            $table->text('market_place_profile')->nullable();
            $table->string('picture')->nullable();
            $table->text('communication_medium')->nullable();
            $table->text('communication_link')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->comment('male,female');
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')
                ->references('user_id')->on('users')
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
        Schema::dropIfExists('clients');
    }
}

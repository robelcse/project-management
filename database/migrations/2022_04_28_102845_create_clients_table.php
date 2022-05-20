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
            $table->string('connect_by');
            $table->text('social_profile');
            $table->text('market_place_profile');
            $table->string('picture')->nullable();
            $table->text('communication_medium');
            $table->text('communication_link');
            $table->string('date_of_birth')->nullable();
            $table->string('gender')->comment('male,female');
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');

            // En las relaciones HasOne o HasMany la llave foranea va en las inversas
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->unique()
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');

            $table->string('job_title');
            $table->string('website');
            $table->string('bio', 1000);
            $table->string('twitter')->nullable();
            // Other columns here...

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
        Schema::dropIfExists('user_profiles');
    }
}

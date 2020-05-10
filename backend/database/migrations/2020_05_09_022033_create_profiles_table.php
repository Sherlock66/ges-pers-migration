<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->string('placeholder')->nullable();
            $table->boolean('is_required')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_updatable');
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
            $table->boolean('is_unique');
            $table->string('default')->nullable();
            $table->text('description')->nullable();
			
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('license_type_id');
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->string('raison')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->integer('date')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('file')->nullable();
            $table->enum('status',['PENDING', 'APPROVED', 'REJECTED', 'CANCELLED']);
            $table->timestamps();

            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('license_type_id')->references('id')->on('license_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('licenses');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->string('hair_color')->nullable();
            $table->string('ethnicity')->nullable();
            $table->boolean('tattoos')->nullable();
            $table->boolean('piercings')->nullable();
            $table->tinyInteger('breast_size')->unsigned()->nullable();
            $table->char('breast_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('orientation')->nullable();
            $table->tinyInteger('age')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};

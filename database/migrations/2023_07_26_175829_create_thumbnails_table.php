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
        Schema::create('thumbnails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->smallInteger('height')->unsigned();
            $table->smallInteger('width')->unsigned();
            $table->enum('type', ['pc', 'mobile', 'tablet']);
            $table->text('image_url');
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thumbnails');
    }
};

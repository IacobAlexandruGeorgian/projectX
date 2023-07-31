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
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->bigInteger('subscriptions')->unsigned();
            $table->bigInteger('monthly_searches')->unsigned();
            $table->bigInteger('views')->unsigned();
            $table->integer('videos_count')->unsigned();
            $table->integer('premium_videos_count')->unsigned();
            $table->integer('white_label_video_count')->unsigned();
            $table->bigInteger('rank')->unsigned();
            $table->bigInteger('rank_premium')->unsigned();
            $table->bigInteger('rank_wl')->unsigned();
            $table->timestamps();

            $table->foreign('person_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statistics');
    }
};

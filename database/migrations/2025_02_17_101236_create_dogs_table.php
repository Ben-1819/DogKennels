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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id')->constrained('owners');
            $table->string('name');
            $table->string('breed');
            $table->string('size');
            $table->integer('age');
            $table->string('training_level');
            $table->string('temperment');
            $table->string('extra_info')->nullable();
            $table->integer('feed_per_day');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};

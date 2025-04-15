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
        Schema::create('glaces', function (Blueprint $table) {
            $table->id();
            $table->string('gout');
            $table->string('image')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('nutrition')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('glaces');
    }
};

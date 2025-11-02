<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('chef')->nullable();
            $table->decimal('initial_rating', 3, 1)->default(0);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('badge')->nullable();
            $table->string('duration')->nullable();
            $table->string('servings')->nullable();
            $table->string('difficulty')->nullable();
            $table->json('ingredients')->nullable();
            $table->json('steps')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Deprecated migration: recipe reviews feature has been removed.
    }

    public function down(): void
    {
        Schema::dropIfExists('recipe_reviews');
    }
};

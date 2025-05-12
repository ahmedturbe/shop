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
        Schema::create('images', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->string('url');
            $table->uuid('imageable_id'); // UUID from products ili variants
            $table->string('imageable_type'); // 'App\Models\Product' or 'App\Models\Variant'
            $table->timestamps();

            $table->index(['imageable_id', 'imageable_type']); // for faster queries
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};

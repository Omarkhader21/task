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
        Schema::create('post_collections_posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_collection_id')->references('id')->on('post_collections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('post_id')->references('id')->on('posts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_collections_posts');
    }
};

<?php

use App\Models\Admin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false);
            $table->string('slug', 255)->nullable(false);
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->foreignIdFor(Admin::class,'admin_id');
            $table->string('main_photo', 255)->nullable();
            $table->text('sub_photos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

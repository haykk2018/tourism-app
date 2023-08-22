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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('description')->nullable();
            $table->string('menu_name')->nullable()->unique();
            $table->text('content')->nullable();
            $table->string('img_src')->nullable()->unique();
            $table->string('img_alt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

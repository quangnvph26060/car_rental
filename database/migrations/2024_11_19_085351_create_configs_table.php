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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('banner')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('website')->nullable();
            $table->string('script')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('fanpage')->nullable();
            $table->longText('description_seo')->nullable();
            $table->longText('keywords_seo')->nullable();
            $table->longText('map')->nullable();
            $table->longText('about-us')->nullable();
            $table->string('about-us-image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};

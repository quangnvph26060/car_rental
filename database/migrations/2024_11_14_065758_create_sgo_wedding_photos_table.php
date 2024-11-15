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
        Schema::create('sgo_wedding_photos', function (Blueprint $table) {
            $table->id();  // Tạo trường khóa chính tự động tăng
            $table->unsignedBigInteger('car_id');  // Tạo trường car_id (khóa ngoại)
            $table->string('photo_url');  // Để lưu đường dẫn ảnh
            $table->string('caption')->nullable();  // Chú thích cho ảnh (có thể null)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sgo_wedding_photos');
    }
};

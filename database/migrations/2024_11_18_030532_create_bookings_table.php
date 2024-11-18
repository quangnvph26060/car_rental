<?php

use App\Models\Car;
use App\Models\Type;
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id');
            $table->unsignedBigInteger('type_id');
            $table->dateTime('start_date');
            $table->unsignedBigInteger('rental_days');
            $table->string('name');
            $table->string('phone', 11);
            $table->text('note')->nullable();


            $table->foreign('car_id')->references('id')->on('sgo_cars')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('sgo_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

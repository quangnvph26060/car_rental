<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('sgo_contact', function (Blueprint $table) {
        $table->id();
        $table->string('headquarters')->nullable();
        $table->string('advisory')->nullable();
        $table->string('phone_number')->nullable();
        $table->string('working_hours')->nullable();
        $table->string('booking_procedure')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('sgo_contact');
}

};

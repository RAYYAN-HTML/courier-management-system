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
    Schema::create('couriers', function (Blueprint $table) {
        $table->id();
        $table->string('tracking_number')->unique();
        $table->string('sender_name');
        $table->string('receiver_name');
        $table->string('origin');
        $table->string('destination');
        $table->foreignId('status_id')->constrained();
        $table->date('delivery_date');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};

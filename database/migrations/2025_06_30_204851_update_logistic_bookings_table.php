<?php

use App\Enums\LogisticBookingEnums;
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
         Schema::table('logistic_bookings', function (Blueprint $table) {
            $table->enum('status',[LogisticBookingEnums::DRAFT, LogisticBookingEnums::CONFIRMED, LogisticBookingEnums::SHIPPED, LogisticBookingEnums::ARRIVED, LogisticBookingEnums::DELIVERED, LogisticBookingEnums::CANCEL])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema
        Schema::table('logistic_bookings', function (Blueprint $table) {
            $table->enum('status',[LogisticBookingEnums::DRAFT, LogisticBookingEnums::CONFIRMED, LogisticBookingEnums::SHIPPED, LogisticBookingEnums::ARRIVED, LogisticBookingEnums::DELIVERED])->change();
        });
    }
};

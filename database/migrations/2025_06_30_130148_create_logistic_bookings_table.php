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
        Schema::create('logistic_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('location_id');
            $table->foreignId('transport_mode_id');
            $table->string('goods_name');
            $table->decimal('weight', 8, 2);
            $table->string('receiver_name');
            $table->string('receiver_email')->nullable();
            $table->string('receiver_phone');
            $table->string('receiver_address')->nullable();
            $table->enum('status',[LogisticBookingEnums::DRAFT, LogisticBookingEnums::CONFIRMED, LogisticBookingEnums::SHIPPED, LogisticBookingEnums::ARRIVED, LogisticBookingEnums::DELIVERED]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logistic_bookings');
    }
};

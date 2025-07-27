<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\LogisticBooking;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Locations\Location;
use App\Models\Transportations\TransportMode;
use App\Enums\LogisticBookingEnums;

class LogisticBookingTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_user_cannot_get_bookings(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);

        $response = $this->get('api/v1/logistic/bookings');

        $response->assertStatus(403);
        $response->assertSeeText('This action is unauthorized');
    }

    public function test_user_can_create_logistic_booking()
    {
        // Create user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);

        // Create dependencies
        $location = Location::factory()->create();
        $transportMode = TransportMode::factory()->create();

        // Send POST request
        $response = $this->post('api/v1/logistic/booking-create', [
            'location_id' => $location->id,
            'transport_mode_id' => $transportMode->id,
            'goods_name' => 'Frozen Fish',
            'weight' => 5.25,
            'receiver_name' => 'Amaka Olarewaju',
            'receiver_email' => 'amaka@gmail.com',
            'receiver_phone' => '08012345678',
            'receiver_address' => '12 Market Street, Lagos',
            'status' => LogisticBookingEnums::DRAFT,
        ]);

        // Assert status and DB
        $response->assertStatus(200); // or 201 depending on your controller
        $this->assertDatabaseHas('logistic_bookings', [
            'goods_name' => 'Frozen Fish',
            'receiver_email' => 'amaka@gmail.com',
        ]);
        $response->assertSeeText('Booking created successfully');
    }
    //
}

<?php

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Booking;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BookingTest extends TestCase
{
    #[Test]
    #[Group('booking')]
    public function booking_can_be_stored()
    {
        $this->withoutExceptionHandling();

        $data = [
            'resource_id' => Resource::first()?->id,
            'user_id'     => User::first()?->id,
            'start_time'  => (string) Carbon::now('UTC'),
            'end_time'    => (string) Carbon::now('UTC'),
        ];

        $response = $this->post('api/bookings', $data);

        $response->assertOk();
    }

    #[Test]
    #[Group('booking')]
    public function booking_can_be_destroyed()
    {
        $this->withoutExceptionHandling();

        $response = $this->delete('api/bookings/' . Booking::first()->id);
        $response->assertOk();
    }
}

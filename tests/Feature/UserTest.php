<?php

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserTest extends TestCase
{
    // use RefreshDatabase;

    #[Test]
    #[Group('booking')]
    public function user_can_be_stored()
    {
        $this->withoutExceptionHandling();

        $data = [
            'name'     => 'Тестовый тесть',
            'password' => '123123123',
        ];

        $response = $this->post('api/users', $data);
        $response->assertOk();
    }
}

<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Resource;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Group;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ResourceTest extends TestCase
{
    // use RefreshDatabase;

    #[Test]
    #[Group('resource')]
    public function resource_can_be_stored()
    {
        $this->withoutExceptionHandling();

        $data = [
            'name'        => 'Тест',
            'type'        => 'Тест',
            'description' => 'Тестовое описание',
        ];

        $response = $this->post('api/resources', $data);
        $response->assertOk();
    }
}

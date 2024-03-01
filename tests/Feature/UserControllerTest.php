<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use App\Events\UserEvent;
use App\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function it_can_create_a_user_and_dispatch_user_event()
    {
        // Disable event broadcasting for this test
        Event::fake();

        // Create a user
        $userData = [
            'email' => 'test@example.com',
            'firstName' => 'John',
            'lastName' => 'Doe',
        ];

        $response = $this->postJson('/api/users', $userData);

        // Assert the response is successful
        $response->assertStatus(201);

        // Assert the user was created in the database
        $this->assertDatabaseHas('users', $userData);

        // Assert that a UserEvent was dispatched
        Event::assertDispatched(UserEvent::class, function ($event) use ($userData) {
            return $event->email === $userData['email'] &&
                   $event->firstName === $userData['firstName'] &&
                   $event->lastName === $userData['lastName'];
        });
    }
}

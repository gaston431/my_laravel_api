<?php

namespace Tests\Feature;

use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/api/testing-the-api');

        $response->assertStatus(200);
    }

    public function test_making_an_api_request(): void
    {
        Sanctum::actingAs(
            \App\Models\User::factory()->create(),
            //['view-tasks'] //['*']
        );

        $response = $this->postJson('/api/v1/posts', [
            'title' => 'Sally', 
            'slug' => 'sally',
            'likes' => 0,
            'content' => 'Sally content', 
        ]);
 
        $response
            ->assertStatus(201)
            ->assertJson([
                'title' => true,
            ]);
    }
}

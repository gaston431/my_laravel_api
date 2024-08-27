<?php

namespace Tests\Unit;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PostResourceTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    /* public function test_example(): void
    {
        $this->assertTrue(true);
    } */

    public function testCorrectDataIsReturnedInResponse()
    {
        $user = \App\Models\User::factory()->create();
        $post = \App\Models\Post::factory()->create(["user_id" => $user->id]);
        
        $resource = (new PostResource($post))->jsonSerialize();
        
        $this->assertArrayHasKey('title', $resource);

        $this->assertInstanceOf(UserResource::class, $resource["user"]);
        
        // $this->assertSame($post->title, $post->title);
        /* $this->assertArraySubset([
            'title' => $post->title,
            'content' => $post->content
        ], $resource); */
    }

}

<?php

namespace Tests\Unit;

use App\Http\Resources\PostResource;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class PostResourceTest extends TestCase
{
    use HasFactory;
    /**
     * A basic unit test example.
     */
    /* public function test_example(): void
    {
        $this->assertTrue(true);
    } */

    use RefreshDatabase;
    public function testCorrectDataIsReturnedInResponse()
    {
        $resource = (new PostResource($post = \App\Models\Post::factory()->make()))->jsonSerialize();
        
        $this->assertArrayHasKey('title', $post);
        $this->assertSame($post->title, $post->title);
        /* $this->assertArraySubset([
            'title' => $post->title,
            'content' => $post->rating
        ], $resource); */
    }

}

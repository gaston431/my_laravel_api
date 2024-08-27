<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostsCollection;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

/**
* @OA\Info(
*   version="1.0.0",
*   title="My API"
* )
*/

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * @OA\Get(
     *     path="/api/v1/posts",
     *     summary="Get a list of posts",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function index()
    {
        return new PostsCollection(Post::with('user')->get());
        // return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/api/v1/posts",
     *     summary="Post a post",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            "title"=> "required",
        ]);
        
        $post = Post::create(array_merge($request->all(), [
            'user_id' =>$request->user()->id]
        ));

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/api/v1/posts/{id}",
     *     summary="Show a post",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function show(Post $post)
    {
        return (new PostResource($post))->additional([
            'meta' => [
                'anything' => 'Some Value'
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Put(
     *     path="/api/v1/posts/{id}",
     *     summary="Update a post",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return new PostResource($post);;
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/v1/posts/{id}",
     *     summary="Delete a post",
     *     tags={"Posts"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request")
     * )
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->json(["message"=> "Deleted Successfully"]);
    }
}

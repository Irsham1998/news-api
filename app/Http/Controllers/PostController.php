<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        // return response()->json(['data' => $posts]);
        return PostResource::collection($posts);
        // hasilnya sama dengan atas, bedanya data yang diberikan bisa diatur
        // pada postresource
    }

    public function show($id)
    {
        $postDetail = Post::with('user:id,username')->findOrFail($id);

        // jika data bukan array, misal show detail data
        // returnnya sperti dibawah
        return new PostDetailResource($postDetail);
    }
}

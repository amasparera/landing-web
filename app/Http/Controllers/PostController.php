<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(Request $request)
    {
        $limit = $request->query('limit'); // 10
        $page = $request->query('page') ?? 0; // 1
        $offset = ($page) * $limit;
        return [
            'posts' => Post::where('status', 'published')->orderBy('created_at', 'desc')->limit($limit ?? 10)->offset($offset)
                ->get()
        ];
    }

    public function show($id)
    {
        $post = Post::query()
            ->where('status', 'published')
            ->with('tags')->findOrFail($id);
        // dd($post->tags->toArray());
        return [
            'post' => $post,
        ];
    }
}

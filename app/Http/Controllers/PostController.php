<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index(Request $request)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        $offset = ($page - 1) * $limit;
        return [
            'posts' => Post::where('status', 'published')->orderBy('created_at', 'desc')->limit($limit ?? 10)->offset($offset ?? 0)
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

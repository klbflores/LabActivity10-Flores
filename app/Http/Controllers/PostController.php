<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query()->where('is_published', true);

        if ($request->filled('q')) {
            $query->where('title', 'like', '%' . $request->query('q') . '%');
        }

        if ($request->filled('category')) {
            $query->where('category', $request->query('category'));
        }

        // 6 posts per page for "Flores"
        $posts = $query->orderByDesc('is_pinned')
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $categories = Post::query()->distinct()->orderBy('category')->pluck('category');

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        // findOrFail throws 404 if post doesn't exist
        $post = Post::findOrFail($id);

        // Abort with 404 if the post is an unapproved draft
        if (! $post->is_published) {
            abort(404);
        }

        // Increment views and save via ActiveRecord
        $post->views += 1;
        $post->save();

        return view('posts.show', compact('post'));
    }
}
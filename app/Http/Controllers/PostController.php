<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\PostPublished;
use App\Jobs\SendPostPublishedEmailJob;

class PostController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Website $website)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body'  => 'required',
        ]);

        $post = Post::create([
            'website_id' => $website->id,
            'title'      => $request->title,
            'slug'       => Str::slug($request->title),
            'body'       => $request->body,
        ]);

        // Send email to subscribers
        dispatch(new SendPostPublishedEmailJob($post, $website->subscribers));

        return response()->json([
            'message' => 'Post created successfully',
            'post' => $post,
        ], 201);
    }
}

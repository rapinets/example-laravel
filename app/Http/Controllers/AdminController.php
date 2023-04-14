<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->latest()->paginate(12);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->user_id = $request->user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $request->slug;
        $post->save();

        return redirect()->route('admin.posts.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
      $post->update($request->validated());

      return redirect(route('admin.posts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('admin.posts'));
    }
}

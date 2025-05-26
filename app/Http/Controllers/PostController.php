<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Edu-Zone';
        $active = 'edu-zone';
        $postUtama = Post::latest()->first();
        $posts = Post::where('id', '!=', $postUtama->id)->latest()->get();
        return view('post.index', compact('active', 'title', 'postUtama', 'posts'));
    }
    public function manage()
    {
        $title = 'Manage Post';
        $active = 'manage-edu-zone';
        $posts = Post::all();
        return view('post.manage', compact('active', 'title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $title = 'Single Post';
        $active = 'single-post';
        return view('post.show', compact('active', 'title', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
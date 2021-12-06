<?php

namespace App\Http\Controllers\Api\Admin\Post;

use Illuminate\Http\Request;
use App\Models\Admin\Post\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = Post::create($request->all());
        return response($post, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->fill($request->all());
        if($post->save()){
            return response($post, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Post\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        if($post->delete()){
            return response('Deleted', 200);
        }
    }
    public function search($searchString)
    {
        $posts = Post::where('name', 'like', '%'.$searchString.'%')->orWhere('content', 'like', '%'.$searchString.'%')->get();
        return $posts;
    }
}

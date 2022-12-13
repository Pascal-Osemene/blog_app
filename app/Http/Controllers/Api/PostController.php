<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        $posts = Post::latest()->paginate();

        return response()->json([
            'success' => true,
            'message' => 'A list of posts',
            'data' => $posts->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'title' => ['required', 'string', 'unique:posts'],
            'body' => ['required', 'string', 'min:28'],
            'image' => ['required', 'url'],
        ]);

        $data = array_merge($valid, [
            'slug' => Str::slug($request->input('title')),
            'user_id' => 1
        ]);

        Post::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Post created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', '=', $slug)->with('user')->firstOrFail();
        return response()->json([
            'success' => true,
            'message' => 'Post fetched',
            'data' => $post->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'unique:posts,title,'.$id],
            'body' => ['required', 'string', 'min:20'],
            'image' => ['nullable', 'url'],
        ]);
        $post = Post::findOrFail($id);
        $data = $request->only('title', 'body');
        if ($request->filled('image')) {
            $data['image'] = $request->input('image');
        }

        $post->update($data);
        return response()->json([
            'success' => true,
            'message' => 'post Successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Successfully deleted',
        ]);
    }
}

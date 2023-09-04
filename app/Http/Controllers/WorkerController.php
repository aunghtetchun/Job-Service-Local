<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Post;
use Illuminate\Http\Request;

class WorkerController extends Controller
{

    public function register(){
        return view('worker.register');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        return $request;
    }
    public function postList()
    {
        return view('worker.post-list');
    }
    public function commentList()
    {
        return view('worker.comment-list');
    }
    public function recommendList()
    {
        return view('worker.recommend-list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        return view('worker.create-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
        $user=auth()->user();
        $request->validate([
            "title" => "required|max:100",
            "description" => "required|max:500",
            // "city" => "required|numeric",
            // "location" => "required|numeric",
            "images.*" => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $post = new Post();
        $post->worker_id = $user->id;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->city=$user->city;
        $post->location=$user->location;
        $post->save();
        if ($request->hasFile('images')) {
            $dir = "public/post";
            foreach ($request->file('images') as $image) {
                $newName = uniqid() . "post." . $image->getClientOriginalExtension();
                $image->storeAs($dir, $newName);
                $photo = new Photo();
                $photo->name = $newName;
                $aa = Post::get()->last();
                $photo->wedding_package_id = $aa->id;
                $photo->save();
            }
        }
        return redirect()->route('worker.postList')->with('status', 'Post created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function showPost(Post $post)
    {
        return view('worker.show-post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editPost(Post $post)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;

        if (($role == 'worker' && $post->worker_id == $user_id)) {
            return view('worker.edit-post', compact('post'));
        } else {
            abort(404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, Post $post)
    {
        $user_id = auth()->user()->id;
        $role = auth()->user()->role;

        if ($role == 'worker' && $post->worker_id == $user_id && $post->status = "waiting") {
            $request->validate([
                "title" => "required|max:100",
                "description" => "required|max:500",
                // "city" => "required|numeric",
                // "location" => "required|numeric",
            ]);
            $post->worker_id = auth()->user()->id;
            $post->title = $request->title;
            $post->description = $request->description;
            // $post->city=$request->city;
            // $post->location=$request->location;
            $post->update();
            return redirect()->route('worker.postList')->with('status', 'Post updated successfully');
        } else {
            abort(404);
        }
    }
}

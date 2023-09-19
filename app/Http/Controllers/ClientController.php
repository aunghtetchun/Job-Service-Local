<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Recommend;
use App\Post;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRecommend(Request $request)
    {
        $request->validate([
            "worker_id" => "required|numeric",
            "remarks" => "required|max:500",
            "rating" => "required|numeric",
        ]);
        $recommend = new Recommend();
        $recommend->user_id = auth()->user()->id;
        $recommend->worker_id= $request->worker_id;
        $recommend->remarks = $request->remarks;
        $recommend->rating = $request->rating;
        $recommend->save();
        return redirect()->back();
    }

    public function likePost(Request $request){
        $request->validate([
            "post_id" => "required|numeric",
            "comment" => "required|max:500",
        ]);
        $post=Post::find($request->post_id);
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->worker_id= $post->worker_id;
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json(['message'=>"success"],200);
    }

}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    public function index(){
    	
    	return PostResource::collection(Post::with('User')->paginate(3));
    }

    public function show($post){
  
    	$posts = Post::find($post);
    	return new PostResource($posts);
    }

    public function store(StorePostRequest $request1){
    	$post = new Post();
    	$post->title = $request1->input('title');
    	$post->description = $request1->input('description');
    	
    	$post->user_id = auth()->user()->id;

    	$post->save();

    	return response()->json(['message', 'Success']);
    }


}

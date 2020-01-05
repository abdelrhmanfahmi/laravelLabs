<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\StorePostRequest;
use App\Post;
use App\Comment;
class PostRequest extends Controller
{
    public function index(){
      $getData = Post::paginate(3);
      //dd($getData);
       
      $arr = array('getData' => $getData);
      return view('index' , $arr);
    }
    public function create(){
      return view('create');
    }
    public function store(Request $request , StorePostRequest $request1){
      $validated = $request1->validated();
      $post = new Post();
      $post->title = $request->input('title');
      $post->description = $request->input('description');

      $post->user_id = $request->user()->id;
      $post->img = $request->file('avatar')->store('avatar');
      $post->save();
      return redirect(route('posts.index'));
    }
    public function show($post){
      $getDataById = Post::find($post);
      $array = array('getDataById' => $getDataById);
      return view('show' , $array);
    }
    public function edit($post){
      $getEditById = Post::find($post);
      $arra = array('getEditById' => $getEditById);
      return view('edit' , $arra);
    }
    public function update(Request $request , $post , StorePostRequest $request1){
        $validated = $request1->validated();
      $editData = Post::find($post);
      $editData->title = $request->input('title');
      $editData->description = $request->input('description');
      $editData->save();
      return redirect(route('posts.index'));
    }
    public function destroy($post){
      $delPost = Post::find($post);
      $delPost->delete();
      return redirect(route('posts.index'));
    }
    public function ShowComment($comment){
      $comment = Post::find($comment);
      return view ('comments' , ['comment' => $comment]);
    }
    public function StoreComment(Request $request,$id){
      $var = Post::find($id);
      $var->comments()->create([
          'comment'=>$request->comment,
      ]);
      return redirect (route('posts.index'));
    }
}
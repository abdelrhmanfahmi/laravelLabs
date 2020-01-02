<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;

class myController extends Controller
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
    public function store(Request $request){
    	$post = new Post();
    	$post->title = $request->input('title');
    	$post->description = $request->input('description');
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
    public function update(Request $request , $post){
    	$editData = Post::find($post);
    	$editData->title = $request->input('titleUpdated');
    	$editData->description = $request->input('descriptionUpdated');
    	$editData->save();
    	return redirect(route('posts.index'));
    }
    public function destroy($post){
    	$delPost = Post::find($post);
    	$delPost->delete();
    	return redirect(route('posts.index'));
    }
}
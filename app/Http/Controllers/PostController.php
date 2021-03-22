<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller{


    //To handel index view
    public function index(){

       
        //$allPosts = Post::all();//object of eloquent collection
        $allPosts = Post::paginate(3); 
        return view('posts.index', [
            'posts' => $allPosts
        ]);

    }


    //To handle creating post view
    public function create(){
        return view('posts.create',[
            'users' => User::all()
        ]);
       
    }


    //to edit a post

    public function edit($post){
        $post = Post::find($post);
        return view('posts.edit', 
         [
            'post' => $post,
            'users' => User::all()
        ]
    );
    }

    public function update(Request $request, $post){
        $post = Post::find($post);
        $requestData = $request->all();
       
        $post->update($requestData);

        return redirect()->route('posts.index');
    }
    //To redirect after saving new post

    public function store(Request $request){
        
        $requestData = $request->all();


        Post::create($requestData);

        return redirect()->route('posts.index');

    }
    
    public function destroy($id){
       
        Post::find($id)->delete(); //object of Post model
        
        return redirect()->route('posts.index');

    }
    public function show($id){
        $post = Post::find($id); //object of Post model
        $user= User::find($post->user_id);
        return view('posts.post', [
            'post' => $post,
            'user' => $user
        ]);
    }
    
}
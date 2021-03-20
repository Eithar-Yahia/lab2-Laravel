<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller{


    //To handel index view
    public function index(){

        //Associative array of posts:
        $allPosts = [
            ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'],
            ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15'],
            ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01'],
        ];

        return view('posts.index', [
            'posts' => $allPosts
        ]);

    }


    //To handle creating post view
    public function create(){
        return view('posts.create');
    }


    //to edit a post

    public function edit($postId){
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];
        return view('posts.edit', 
         [
            'post' => $post,
        ]
    );
    }
    //To redirect after saving new post

    public function store(){
        
        return redirect()->route('posts.index');
    }
    
    public function update(){
        
        return redirect()->route('posts.index');
    }
    public function show($id){
        $post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];

        return view('posts.post', [
            'post' => $post,
        ]);
    }
    
}
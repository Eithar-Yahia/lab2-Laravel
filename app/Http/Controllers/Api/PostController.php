<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;




class PostController extends Controller
{
    //
    

    public function index(){
       
        $posts= Post::paginate();

        return PostResource::collection($posts);
    }

    public function show(Post $post){

        return new PostResource($post);
    }

    public function store(StorePostRequest $request){

        $post=Post::create($request ->all());

        return new PostResource($post); 


    }
}

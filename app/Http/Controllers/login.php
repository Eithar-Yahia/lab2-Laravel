<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

use App\Models\Post;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class login extends Controller
{
    //
    
    public function loginWithGithub(){
        $loginUser = Socialite::driver('github')->user();
       // $email = DB::table('users')->where('email', $loginUser['email']);
        //dd($loginUser);
        $user= User::where('email', $loginUser['email'])->first();
        if($user){
            Auth::login($user);
            return redirect()->route('posts.index');
        }
        else{
            $newUser=User::create([
                'name'=> $loginUser['name'],
                'email'=>$loginUser['email'],
                'password'=>$loginUser['id']
            ]);
            Auth::login($newUser);
            return redirect()->route('posts.index');

        }

    }



        
    public function loginWithGoogle(){
        $loginUser = Socialite::driver('google')->user();
       // $email = DB::table('users')->where('email', $loginUser['email']);
        //dd($loginUser);
        $user= User::where('email', $loginUser['email'])->first();
        if($user){
            Auth::login($user);
            return redirect()->route('posts.index');
        }
        else{
            $newUser=User::create([
                'name'=> $loginUser['name'],
                'email'=>$loginUser['email'],
                'password'=>$loginUser['id']
            ]);
            Auth::login($newUser);
            return redirect()->route('posts.index');

        }

    }
    
}

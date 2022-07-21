<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index(){
        if(Auth::check()){

            $posts = Post::all();
            $counter =1;
            return view('posts.index',[
                'posts'=>$posts,
                'counter'=>$counter
            ]);

        }else{
            return redirect("login");

        }

    }
    public function create(User $user){

            if(Auth::check()){

                return view('posts.create');

            }else{
                return redirect("login");

            }
    }

    public function store(PostRequest $request){

        if(Auth::check()){
            $request->validated();
            if($request->has('img')) {
                $file = $request->file('img')->getClientOriginalName();
                $fileName = time() . "_" . $file;
                Storage::put('public/images', $fileName);
                $path = $request->file('img')->storeAs('public/images',$fileName);
                $id = Auth::id();

                Post::create([
                    "user_id" => $id,
                    "title"=>$request->title,
                    "content"=>$request->body,
                    "img"=>$fileName,
                ]);
            }else{
                $id = Auth::id();

                Post::create([
                    "user_id" => $id,
                    "title"=>$request->title,
                    "content"=>$request->body,
                ]);
            }
            return redirect()->route('posts.index');

        }else{
            return redirect("login");

        }
    }
}

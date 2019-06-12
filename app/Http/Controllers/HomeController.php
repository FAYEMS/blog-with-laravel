<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user();

        $users = Auth::user()->all();

       // $posts =Auth::user()->posts;

        $posts = Post::with('user')->where('user_id', $user->id)->get();

        $allposts = Post::all();

        $categories = Category::all();

        $sportcategories = Post::with('category')->where('category_id',1)->get();

        return view('home', compact ('user','users', 'posts','allposts','categories','sportcategories'));
        
    }

    public function createPost(Request $request){

        $validateData = $request->validate([

            'title' => 'required',
            'body' => 'required'

        ]);

        $userid = Auth::user()->id;

        $post = Post::create(array(

            'title' => Input::get('title'),
            'body' => Input::get('body'),
           'user_id' =>  Auth::user()->id,
            'category_id' => Input::get(1),

        ));

        return redirect()->route('home')->with('success', 'Post has been successfully added!');

    }
}

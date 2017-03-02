<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Post $post)
    {
        resolve('JavaScript')->put([
            'post' => $post
        ]);

        return view('admin.post');
    }

    public function save(Post $post = null){

        $post->title = Input::get('post.title');
        $post->content = Input::get('post.content');

        $post->save();

        return response()->json(json_encode($post));
    }
}

<?php

namespace App\Http\Controllers;
use App\Vedio;
use App\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post =Post::where('status',1)->get();
        $vedio =Vedio::where('status',1)->get();
        // dd($post);
        return view('welcome')->with('posts',$post)->with('vedio',$vedio);
    }

    public function show($id){

        $post =Post::find($id);
        // dd($post);
        return view('main/post_detials')->with('posts',$post);

    }

    public function show_vedio($id){

        $vedio =Vedio::find($id);
        // dd($vedio);
        return view('main/vedio_details')->with('vedio',$vedio);

    }
}

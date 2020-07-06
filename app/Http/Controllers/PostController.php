<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post =Post::all();
       return view('admin/post')->with('posts',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/post_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title'=>'required|unique:posts',
            'des'=>'required',
            'img'=>'required',
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post= new Post();
        // dd($newsup);
        $post->title =  $request->title;
        $post->des =  $request->des;
       

        if($request->img)
        {
            $imageName = time().'.'.request()->img->getClientOriginalExtension();
            $request->img->move('assets/post/upload', $imageName);
            $post->img = $imageName;
        }
        else{
            $post->img = "defultimage.jpg";
        }
        if($post->save()){
            return redirect('posts')->with('message','Post Created Successfully');
        }
        else {
            return redirect('posts/create')->with('message','Erorr!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    public function setapproval(Request $request){
        $id =$request->id;
      
        $managerapproval = Post::find($id);
        if($request->action=="publish"){
            $managerapproval->status=1;
            
        }
        if($request->action=="unpublish"){
            $managerapproval->status=0;


        }
        $managerapproval->update();
        if($managerapproval->update()==true){
            return response()->json(['success' => true, 'message' =>'Status Updated!']);
        }
    }
}

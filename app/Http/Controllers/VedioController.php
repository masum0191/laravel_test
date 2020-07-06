<?php

namespace App\Http\Controllers;

use App\Vedio;
use Illuminate\Http\Request;

class VedioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vedio =Vedio::all();
        return view('admin/vedio')->with('vedioes',$vedio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/vedio_create');
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
            'title'=>'required|unique:vedios',
            'des'=>'required',
            'img'=>'required',
            'vedio'=>'required',
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post= new Vedio();
        // dd($newsup);
        $post->title =  $request->title;
        $post->des =  $request->des;
        // $vedio->vedio_url=$request->vedio;
        $vedio_name =$request->vedio;
        // $request->vedio->move('assets/post/upload', $vedio_name);
        $post->vedio_url = $vedio_name;

        if($request->img)
        {
            $imageName = time().'.'.request()->img->getClientOriginalExtension();
            $request->img->move('assets/vedio/upload', $imageName);
            $post->img = $imageName;
        }
        else{
            $post->img = "defultimage.jpg";
        }
        if($post->save()){
            return redirect('vedio')->with('message','Post Created Successfully');
        }
        else {
            return redirect('vedio/create')->with('message','Erorr!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vedio  $vedio
     * @return \Illuminate\Http\Response
     */
    public function show(Vedio $vedio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vedio  $vedio
     * @return \Illuminate\Http\Response
     */
    public function edit(Vedio $vedio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vedio  $vedio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vedio $vedio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vedio  $vedio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vedio $vedio)
    {
        //
    }

    public function setapproval(Request $request){
        $id =$request->id;
      
        $managerapproval = Vedio::find($id);
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

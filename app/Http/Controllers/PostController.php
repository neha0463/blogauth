<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('home',["data"=>Post::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        if(Auth::guest()){
            return redirect()->route('login');
        
        }
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(Auth::guest()){
            return redirect()->route('login');
        }

        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'image'=>'required'
        ]);

        $filename = time(). "." .$request->image->extension();
        
        $request->image->move(public_path('images'),$filename); 

         Post::create([
            'title'=>$request->title,
            'author'=>$request->author,
            'user_id'=>Auth::id(),
            'body'=>$request->body,
            'image'=>$filename,
    
            
        ]);
        $request->session()->flash('msg',"<div class='alter alter-success'>Data Inserted Successfully</div>");
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post){
        $a["data"] = $post;
        return view('view',$a);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post){
      
    return view('edit',['data'=>$post]);
    
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'author'=>'required',
            'body'=>'required',
            'image'=>'required',
       ]);
       $filename = time(). '.' .$request->image->extension();

       $request->image->move(public_path('images'),$filename);

     Post::find($post->id)->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'user_id'=>Auth::id(),
            'body'=>$request->body,
            'image'=>$filename,
            
        ]);

       
        
        $request->session()->flash('msg',"<div class='alert alert-success'>Data Inserted Successfully</div>");
        return redirect()->route('post.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post,Request $request)
    {
        //
        $post->delete();
        $request->Session()->flash("msg","Delete Data Sucessfully");
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Add DB Table ====>
use App\Models\Post;

//To get admin details
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //

    public function post_page(){
        return view('admin.post_page');
    }

    //For Save Data for Post into DB ====>
    public function add_post(Request $request){

        $user = Auth()->user();
        $userid = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;



        $post = new Post; 
        $post->title=$request->title;
        $post->description=$request->description;



        $post->post_staus='active';
        $post->user_id=$userid;
        $post->name=$name;
        $post->usertype=$usertype;



        //For image to save into DB
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image=$imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Added Successfully');
    }



    public function show_post(){
        $post = Post::all();

        return view('admin.show_post',compact('post'));
    }


    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('message', 'Post Deleted Succesfully');
    }

    public function edit_page($id){
        $post = Post::find($id);
        return view('admin.edit_page',compact('post'));
    }

    public function update_post(Request $request, $id){
       $data =  Post::find($id);
       $data->title=$request->title;
       $data->description=$request->description;

       $image = $request->image;
       if($image){
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('postimage',$imagename);
        $data->image = $imagename;
       }

       $data->save();
       return redirect()->back()->with('message','Post Updated Successfully');

    }

    
}

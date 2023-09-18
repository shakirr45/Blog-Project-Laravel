<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

        //for sweet-alert====>
use Alert;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::id()){
            // $post = Post::all();
            //for getting active post
            $post = Post::where('post_staus','=','active')->get();

            $usertype=Auth()->user()->usertype;
            if($usertype == 'user'){
                // return view('dashboard');
                return view('home.homepage',compact('post'));
            }
            else if($usertype == 'admin'){
                return view('admin.adminhome');
            }else{
                return redirect()->back();
            }
        }

    }

    // public function post(){
    //     return view('post');
    // }


    //===== For Home Page =======>>
    public function homepage(){
        // $post = Post::all();
        //for active post====>
        $post = Post::where('post_staus', '=' , 'active')->get();

        return view('home.homepage',compact('post'));
    }

    //For show detais of post====>
    public function post_details($id){

        $post = Post::find($id);
        return view('home.post_details',compact('post'));
    }

    //for user can post===>
    public function create_post(){
        return view('home.create_post');
    }
    public function user_post(Request $request){

        $user = Auth()->User();
        $userid = $user->id;
        $username = $user->name;
        $usertype = $user->usertype;


        $post = new Post;
        $post->title=$request->title;
        $post->description=$request->description;
        $post->user_id=$userid;
        $post->name=$username;
        $post->usertype=$usertype;
        $post->post_staus="pending";

        $image= $request->image;
        if($image){
            $imagename= time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $post->image=$imagename;

        }

        $post->save();

        //for sweet-alert====>
        // Alert::success('Congrats' , 'You Have Data Successfully');
        
        //for ex==>
        Alert::info('Congrats' , 'You Have Data Successfully');


        return  redirect()->back();
    }

    //for show my post

    public function my_post(){

        $user = Auth()->user();
        $userid=$user->id;

        $data = Post::where('user_id', '=' , $userid)->get();


        return view('home.my_post',compact('data'));
    }

    //user can delete there post
    public function delete_user_post($id){
        $delete = Post::find($id);
        $delete->delete();
        return redirect()->back()->with('message', 'Post Deleted Succesfully');
    }

    //user can edit there post ===>
    public function edit_user_post($id){
        $data = Post::find($id);
        return view('home.edit_user_post',compact('data'));

    }
    public function main_edit(Request $request, $id){
        $data = Post::find($id);
        $data->title=$request->title;
        $data->description=$request->description;

        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('postimage',$imagename);
            $data->image=$imagename ;
        }

        $data->save();
        return redirect()->back()->with('message','Post Updated Successfully');


    }

}

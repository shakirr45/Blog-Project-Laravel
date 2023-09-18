<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')
      
      <style>
        .post_deg{
            padding:30px;
            text-align:center;
            background-color:black;
        }
        .title_deg{
            font-size: 30px;
            padding: 15px;
            font-weight:bold;
            color: white;
        }
        .des_deg{
            font-size: 18px;
            padding: 15px;
            font-weight:bold;
            color: whitesmoke;
        }
        .img_deg{
            height:200px;
            width:300px;
            padding:10px;
            margin: auto;
        }
      </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->

         @if(session()->has('message'))
     <div class="alert alert-success">
      <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>

      {{session()->get('message')}}

     </div>
     @endif




         @foreach($data as $data)
         <div class="post_deg">
            <img class="img_deg" src="postimage/{{$data->image}}" alt="">
            <h4 class="title_deg">{{$data->title}}</h4>
            <p class="des_deg">{{$data->description}}</p>
            <a onclick="return confirm('Are You Sure to Delete This ..??')" href="{{url('delete_user_post' ,$data->id)}}" class="btn btn-danger">Delete</a>
            <a href="{{url('edit_user_post' ,$data->id)}}" class="btn btn-success">Edit</a>


         </div>
         @endforeach


      </div>

    
      <!-- footer section start -->
      @include('home.footer')
</html>
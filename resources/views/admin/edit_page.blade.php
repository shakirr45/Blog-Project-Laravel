<!DOCTYPE html>
<html>
  <head> 

  <base href="/public">
    @include('admin.css')

    <style>
        .post_title{
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white; 
        }
        .div_center{
            text-align: center;
            padding: 30px;
        }

        label{
            disply: inline-block;
            width: 200px;
        }
    </style>
  </head>
  <body>
    <!-- Header Section  -->
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
     <!-- Inside of BodyPart -->
     <div class="page-content">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" alert-hidden="true">x</button>
            {{session()->get('message')}}
    </div>
        @endif

     <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
     @csrf

<div class="div_center">
<h1 class="post_title">Update Post</h1>

    <label>Post Title</label>
    <input type="text" name="title" value="{{$post->title}}">
</div>

<div class="div_center">
    <label>Post Description</label>
    <textarea name="description" >{{$post->description}}</textarea>
</div>

<div  class="div_center">
    <label>Old Image</label>
    <img style="margin:auto;" height="100px" width="150px" src="/postimage/{{$post->image}}" alt="">
</div>


<div  class="div_center">
    <label>Update Old Image</label>
    <input type="file" name="image" >
</div>

<div class="div_center">
  
    <input type="submit" value="Update" class="btn btn-primary" >
</div>
     </form>

</div>

        <!-- Footer Section -->
        @include('admin.footer')
  </body>
</html>
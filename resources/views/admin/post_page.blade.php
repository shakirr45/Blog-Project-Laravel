<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <!-- //CSS for this Page====> -->
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
      <div class="page-content">

    <!-- Get Messagesform AdminController -->
    @if(session()->has('message'))

    <div class="alert alert-success">
        <Button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</Button>

        {{session()->get('message')}}

    </div>

    @endif

      <h1 class="post_title">Add Post</h1>

      <div>
        <form action="{{url('add_post')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="div_center">
                <label>Post Title</label>
                <input type="text" name="title">
            </div>

            <div class="div_center">
                <label>Post Description</label>
                <textarea name="description" ></textarea>
            </div>

            <div  class="div_center">
                <label>Add Image</label>
                <input type="file" name="image">
            </div>

            <div class="div_center">
              
                <input type="submit" class="btn btn-primary" ">
            </div>
        </form>
      </div>

      </div>

        <!-- Footer Section -->
        @include('admin.footer')
  </body>
</html>
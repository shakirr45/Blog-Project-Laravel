<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      @include('home.homecss')

      <style>
        .div_deg{
            text-align:center;

        }
        .title_deg{
            font-size:30px;
            font-weigth: bold;
            color:white;
            padding: 30px;
        }
        label{
            display:inline-block;
            width: 200px;
            color: white;
            font-weight:bold;
            font-size: 18px;
        }
        .field_deg{
            padding:25px;

        }
      </style>
      
   </head>
   <body>
   <!-- //for sweet-alert====> -->
@include('sweetalert::alert')

      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
         <!-- banner section start -->
     
      <div class="div_deg">
        <h1 class="title_deg">Add Post</h1>

        <form action="{{url('user_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field_deg">
                <label >Title</label>
                <input type="text" name="title">
            </div>
            <div class="field_deg">
                <label >Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field_deg">
                <label >Image</label>
                <input type="file" name="image">
            </div>
            <div class="field_deg">
            <input type="submit" value="Add Post" class="btn btn-outline-secondary">
                
            </div>
        </form>
      </div>
      
      <!-- footer section start -->
      @include('home.footer')
</html>
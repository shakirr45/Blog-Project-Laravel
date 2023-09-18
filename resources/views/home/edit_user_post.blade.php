<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
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
        .header_section{
            background-color: black;
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
      @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" alert-hidden="true">x</button>
            {{session()->get('message')}}
    </div>
        @endif
        <h1 class="title_deg">Update Post</h1>

        <form action="{{url('main_edit',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field_deg">
                <label >Title</label>
                <input type="text" value="{{$data->title}}" name="title">
            </div>
            <div class="field_deg">
                <label >Description</label>
                <textarea name="description">{{$data->description}}</textarea>
            </div>

            <div  class="div_center">
            <label>Old Image</label>
            <img style="margin:auto;" height="100px" width="150px" src="/postimage/{{$data->image}}" alt="">
            </div>
            <div class="field_deg">
                <label >Image</label>
                <input type="file" name="image">
            </div>
            <div class="field_deg">
            <input type="submit" value="Update Post" class="btn btn-outline-secondary">
                
            </div>
        </form>
      </div>
      
      <!-- footer section start -->
      @include('home.footer')
</html>
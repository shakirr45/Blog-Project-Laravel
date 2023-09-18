<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
      @include('home.homecss')
      
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>


      <div style="text-align:center;" class="col-md-4">
                     <div><img style="padding:20px; height:400px; width:550px; margin:auto;" src="/postimage/{{$post->image}}" class="services_img"></div>
                     <h3><b>{{$post->title}}</b></h3>
                     <h4>{{$post->description}}</h4>

                     <p>Post by <b>{{$post->name}}</b></p>

                  </div>

     
      <!-- footer section start -->
      @include('home.footer')
</html>



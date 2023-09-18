<!DOCTYPE html>
<html>
  <head> 
  <!-- sweetalert link for delete confirmation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')

    <!-- Css for this page -->
    <style type="text/css">
        .titel_deg{
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }
        .table_deg{
          border: 1px solid white;
          width: 80%;
          text-align:center;
          margin-left: 70px;
        }
        .th_deg{
          Background-color: skyblue;
        }
        .img_deg{
          height: 100px;
          width: 150px;
          padding: 10px;
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
     <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>

      {{session()->get('message')}}

     </div>
     @endif

     <h1 class="titel_deg">All Post</h1>

     <table class="table_deg">
      <tr class="th_deg">
        <th>Post Title</th>
        <th>Description</th>
        <th>Post by</th>
        <th>Post Status</th>
        <th>UserType</th>
        <th>Image</th>
        <th>Delete</th>
        <th>Update</th>
        <th>Status Accept</th>
        <th>Status Reject</th>


      </tr>
        @foreach($post as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->name}}</td>
        <td>{{$post->post_staus}}</td>
        <td>{{$post->usertype}}</td>
        <td>
          <img class="img_deg" src="postimage/{{$post->image}}" alt="">
        </td>

        <!-- Simple Js delete for yes or no -->
        <!-- <td><a class="btn btn-danger" href="{{url('delete_post',$post->id)}}" onclick="return confirm('Are You sure yo Delete this ?')">Delete</a></td> -->


        <!-- For sweetalert Js delete for yes or no -->
        <td><a class="btn btn-danger" href="{{url('delete_post',$post->id)}}" onclick="confirmation(event)">Delete</a></td>

        <td><a class="btn btn-success" href="{{url('edit_page',$post->id)}}">Edit</a></td>

        <td><a onclick="return confirm('are you sure to accept the post..??')" class="btn btn-outline-secondary" href="{{url('accept_post',$post->id)}}">Accept</a></td>

        <td><a onclick="return confirm('are you sure to reject the post..??')" class="btn btn-primary" href="{{url('reject_post',$post->id)}}">Reject</a></td>


      </tr>
      @endforeach


     </table>


    </div>
        <!-- Footer Section -->
        @include('admin.footer')

  <!-- sweetalert script for delete confirmation -->
  <script>
    function confirmation(ev){
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');

      console.log(urlToRedirect);

      swal({
        title: "Are You sure yo Delete this ?",

        text: "You wont't be able to revent this delete",

        icon : "warning",

        buttons: true,
        
        dangerMode: true,


      })
      .then((willCancle)=>{
        if(willCancle){
          window.location.href = urlToRedirect;
        }

      });
    }
  </script>











  </body>
</html>
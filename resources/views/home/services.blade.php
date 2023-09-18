<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Post </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">

               @foreach($post as $post)

                  <div class="col-md-4" style="padding:30px;">
                     <div><img style="margin-bottom:20px;" width="350px" height="200px" src="/postimage/{{$post->image}}" class="services_img"></div>
                     <h4>{{$post->title}}</h4>
                     <p>Post by <b>{{$post->name}}</b></p>
                     <div class="btn_main"><a href="{{url('/post_details',$post->id)}}">Read More</a></div>
                  </div>
                  @endforeach

               </div>
            </div>
         </div>
      </div>
<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    <!-- Header Section  -->
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
     <!-- Inside of BodyPart -->
     @include('admin.body')
        <!-- Footer Section -->
        @include('admin.footer')
  </body>
</html>
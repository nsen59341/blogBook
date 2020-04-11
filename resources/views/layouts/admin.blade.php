<!doctype html>
<html lang="en">
  <head>
    <title>BlogBook</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="icon" href="{{ url('media/favicon.png') }}" />
    <!-- Material Kit CSS -->
    
    <link href="{{ asset('css/libs.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

  </head>
  <body>
    <div class="wrapper">
    <div class="sidebar" data-color="red">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
          <!-- <a href="javascript:void(0);" class="simple-text logo-mini">
              BB
          </a>
 -->
          <a href="javascript:void(0);" class="simple-text logo-normal">
            Blog Book
          </a>
      </div>

      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">        
          <li class="active ">
              <a href="/home">

                    <i class="now-ui-icons design_app"></i>

                  <p>Dashboard</p>
              </a>
          </li>

          <li>
              <a href="/categories">

                    <i class="now-ui-icons design_bullet-list-67"></i>

                  <p>Categories</p>
              </a>
          </li>

          <li>
              <a href="/posts">

                    <i class="now-ui-icons education_atom"></i>

                  <p>Post</p>
              </a>
          </li>

          <li>
              <a href="/users">

                    <i class="now-ui-icons location_map-big"></i>

                  <p>Users</p>
              </a>
          </li>

          <li>
              <a href="/notifications">

                    <i class="now-ui-icons ui-1_bell-53"></i>

                  <p>Notifications</p>
              </a>
          </li>

          <li>
              <a href="/images">

                    <i class="now-ui-icons design_bullet-list-67"></i>

                  <p>Gallery</p>
              </a>
          </li>

          <li>
              <a href="/profile">

                    <i class="now-ui-icons users_single-02"></i>

                  <p>User Profile</p>
              </a>
          </li>

        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
       @yield('content')
    </div>

  </div>

 
</body>
    <!--   Core JS Files   -->
   <script src="{{asset('js/libs.js')}}"></script>
   <script src="{{asset('js/app.js') }}"></script>

    @yield('scripts')


</html>
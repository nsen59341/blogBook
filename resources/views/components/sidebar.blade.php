<body>
    <div class="wrapper">
    <div class="sidebar" data-color="red">
   
      <div class="logo">
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
              <a href="/medias">

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

          <li>
              <a href="/logout">

                    <i class="now-ui-icons users_single-02"></i>

                  <p>Log Out</p>
              </a>
          </li>

        </ul>
      </div>
    </div>

    <div class="main-panel" id="main-panel">
       @yield('content')
    </div>
<!-- Start ID Wrapper End in Content-->
<div id="wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="/">
                        <!-- Logo icon image, you can use font-icon also -->
                      <b>
                        <!--This is dark logo icon-->
                        <img src="/plugins/images/admin-logo.png" alt="home" class="dark-logo" />
                        <!--This is light logo icon-->
                        <img src="/plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
                     </b>
                      
                      <!-- Logo text image you can use text also -->
                      <span class="hidden-xs">
                        <!--This is dark logo text-->
                        <img src="/plugins/images/admin-text.png" alt="home" class="dark-logo" />
                        <!--This is light logo text-->
                        <img src="/plugins/images/admin-text-dark.png" alt="home" class="light-logo" />
                      </span>
                    </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown">
                        @if (Auth::guest())
                          <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">Guest</b><span class="caret"></span> </a>
                        @else
                          <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="/plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->name }}</b><span class="caret"></span> </a>
                        @endif
                        
                        <ul class="dropdown-menu dropdown-user animated flipInY">

                            @if (Auth::guest())
                              <li><a href="/register">Register</a></li>
                              <li><a href="/login">Login</a></li>
                            @else  
                              <li>
                                  <div class="dw-user-box">
                                      <div class="u-img"><img src="/plugins/images/users/varun.jpg" alt="user" /></div>
                                      <div class="u-text">
                                          <h4>{{ Auth::user()->name }}</h4>
                                          <p class="text-muted">{{ Auth::user()->email }}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                  </div>
                              </li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                              <li role="separator" class="divider"></li>
                              <li>
                                  <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">

                                    <i class="fa fa-power-off"></i>  Logout
                                  </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                              </li>
                            @endif

                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu"><img src="/plugins/images/admin-text-dark.png" alt="home" class="light-logo" /></span></h3> </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="/plugins/images/users/varun.jpg" alt="user-img" class="img-circle"></div>
                        @if (Auth::guest())
                          <a  class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Guest</a>
                        @else
                          <a  class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                        @endif
                       
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    <li> <a href="/recipes" class="waves-effect"><i class="mdi mdi-food-fork-drink fa-fw"></i><span class="hide-menu">List All Recipe</span></a> </li>
                    <li> <a href="/recipes/add" class="waves-effect"><i class="mdi mdi-hamburger fa-fw"></i> <span class="hide-menu">Add Recipe</span></a></li>
                    <li><a href="/ingredient" class="waves-effect"><i class="mdi mdi-truck-delivery fa-fw"></i> <span class="hide-menu">Ingredient</span></a></li>
                    <li class="devider"></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
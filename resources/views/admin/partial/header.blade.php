<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{ asset('admin_boostrap/assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                    <img src="{{ asset('PHP2/Asset/fpt.png') }}" style="width: 30%;" alt="homepage" class="light-logo" />
                </b>
                <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                        href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                            class="srh-btn"><i class="ti-close"></i></a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <?php
                        $user_login = "";
                        $user_image = "";
                        if (Auth::user()->trainee) {
                            $user_login = Auth::user()->trainee;
                            $user_image = $user_login->image;
                        }elseif(Auth::user()->trainer) {
                            $user_login = Auth::user()->trainer;
                            $user_image = $user_login->image;
                        }else {
                            $user_image = "https://yt3.ggpht.com/g05SSTf3pGfwYBr0CgrvGCjIzTC59i2DZf9i4r20nc9m4iYsM2_8nTvI_VmU0S6C9i28n7wVGg=s900-c-k-c0x00ffffff-no-rj";
                        }
                    ?>
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ $user_image }}" alt="user" class="rounded-circle"  style="width:35px; height:35px; object-fit: contain"> >
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>
                            Exit</a>
                    </ul>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>
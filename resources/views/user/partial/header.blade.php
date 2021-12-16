<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand navv" href="{{ route('home.home') }}">
        <img src="{{ asset('PHP2/Asset/logo.jpeg') }}" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <div class="dropdown url-option_search" data-url="{{ route('home.search_option') }}">
                <input class="form-control mr-sm-2 input_search dropdown-toggle" id="dropdownMenuButton"
                    data-toggle="dropdown" autocomplete="off" type="search" placeholder="Search course"
                    data-url="{{ route('home.search_course') }}">
                <div class="dropdown-menu option_search" aria-labelledby="dropdownMenuButton">
                    {{-- <a class="dropdown-item" href="#">Action</a> --}}
                </div>
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0 button_search" data-url="{{ route('home.search_dropdown') }}">Search</button>
        </div>

        <!-- Nav Item - User Information -->
        @if (Auth::check())
            <div class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->username }}</span>
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
                    <img src="{{ $user_image }}" style="width:35px; height:35px; object-fit: contain">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </div>
        @else
            <button class="btn btn-primary my-2 my-sm-0 ml-1"><a class="text-white"
                    href="{{ route('login.form') }}">Login</a></button>
        @endif
    </div>
</nav>

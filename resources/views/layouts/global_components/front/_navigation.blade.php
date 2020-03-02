<!-- Nav-->
<nav id="menu">
    <div class="navbar yamm navbar-default">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                    <!-- Nav Bar Items -->
                    <ul class="nav navbar-nav">
                        <!-- Home Nav Items -->
                        <li class="">
                          <a href="{{route('home')}}" >
                            Home
                          </a>
                        </li>
                        <!-- End Home Nav Items -->

                        <!-- About Nav Item -->
                        <li class="">
                          <a href="{{route('about')}}" >
                            About
                          </a>
                        </li>
                        <!-- End About Nav Item -->

                        <!-- Services Nav Item -->

                        <li class="">
                          <a href="{{route('services')}}" >
                            Our Services
                          </a>
                        </li>

                        <!-- News Nav Item -->
                        <li class="dropdown">
                          <a href="{{route('news')}}">
                            News
                          </a>
                        </li>
                        <!-- End News Nav Item -->



                        <!-- Contact Us Nav Item -->
                        <li class="dropdown">
                          <a href="{{route('contact')}}" class="dropdown-toggle">
                            Contact Us
                          </a>
                        </li>
                        <!-- End Contact Us Nav Item -->
                    </ul>
                    <!-- End Nav Bar Items -->

                    <!-- Search Form -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Forms -->
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false">
                            <b class="glyphicon glyphicon-user"></b>
                          </a>
                          <ul class="dropdown-menu" style="padding-left:9px">
                            @if (!auth()->check())

                            <li style="margin-bottom:10px; border-bottom-color:none">
                            <a href="{{route('register')}}">Sign up</a>
                            </li>
                            <li style="margin-bottom:10px; border-bottom-color:none">
                                <a href="{{route('login')}}">Sign in</a>
                            </li>
                            @else
                            <li style="margin-bottom:10px; border-bottom-color:none">
                                <a href="{{'/'}}">Dashboard</a>

                            </li>
                            <hr>
                            <li style="margin-bottom:10px">
                                <a href="javascript:void(0)" onclick="$('#logout-form').submit()">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>

                            @endif

                          </ul>
                        </li>
                    </ul>
                    <!-- End Search Form -->
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- End Nav-->

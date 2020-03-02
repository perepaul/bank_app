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
                          <ul class="dropdown-menu">
                            <li style="margin-bottom:10px; border-bottom-color:none">
                              Sign up
                            </li>
                            <li style="margin-bottom:10px; border-bottom-color:none">
                                Sign in
                            </li>
                            <li style="margin-bottom:10px">
                                Logout
                            </li>
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

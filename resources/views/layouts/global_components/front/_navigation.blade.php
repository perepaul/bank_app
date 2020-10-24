      <!-- Page Header-->
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="20px" data-xl-stick-up-offset="20px" data-xxl-stick-up-offset="20px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="/"><img class="brand-logo-dark" src="{{asset('assets/front/images/logo.jpg')}}" alt="" width="150" height="25"/><img class="brand-logo-light" src="{{asset('assets/front/images/logo.jpg')}}" alt="" width="150" height="25"/></a>
                  </div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                      <li class="rd-nav-item active"><a class="rd-nav-link" href="/">Home</a>
                      </li>
                      <li class="rd-nav-item"><a class="rd-nav-link" href="/about">About</a>
                      </li>
                      {{-- <li class="rd-nav-item"><a class="rd-nav-link" href="services.html">Services</a>
                        <!-- RD Navbar Dropdown-->
                        <ul class="rd-menu rd-navbar-dropdown">
                          <li class="rd-dropdown-item"><a class="rd-dropdown-link" href="single-service.html">Single service</a></li>
                        </ul>
                      </li> --}}
                      {{-- <li class="rd-nav-item"><a class="rd-nav-link" href="/contact">Login</a> --}}
                      <li class="rd-nav-item"><a class="rd-nav-link" href="/contact">Contacts</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="rd-navbar-aside-element">
                  <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                  {{-- <div class="rd-navbar-collapse rd-navbar-info">
                    <div class="icon mdi mdi-cellphone-iphone"></div><a href="tel:+{{config('app.phone')}}">{{config('app.phone')}}</a>
                  </div> --}}
                  <div class="rd-navbar-collapse rd-navbar-info">
                    @if(!auth()->check())
                    <a href="{{route('login-form')}}" >Login</a>
                    @else
                    <img src="{{auth()->user()->image}}" class="" style="width:3.5rem; height:3.5rem; border-radius:50%" alt="">
                    <a href="{{url('dashboard')}}" >{{auth_user_full_name(auth()->user())}}</a>
                    @endif

                  </div>
                  
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
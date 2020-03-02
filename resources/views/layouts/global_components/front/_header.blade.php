  <!-- Header Area -->
  <header id="header">
    <div class="row">
        <!-- Logo Area -->
        <div class="col-md-4 col-lg-5">
            <div class="logo">
                <div class="icon-logo">
                    <i class="fa fa-university"></i>
                </div>
                <a href="{{route('home')}}" style="font-size:25px;">
                    {{config('app.name')}}
                    <span>Your money is safe.</span>
                </a>
            </div>
        </div>
        <!-- End Logo Area -->

        <!-- Login Area -->
        <div class="col-md-8 col-lg-7">
            <div class="info-login" style="width:auto">
                <div class="head-info-login" style="padding:0 8px">
                    @if (auth()->check())
                    <p>Welcome Back {{ auth()->user()->first_name}}!</p>

                    @endif
                </div>
            </div>
        </div>
        <!-- End Login Area -->
    </div>
</header>
<!-- End Header Area -->

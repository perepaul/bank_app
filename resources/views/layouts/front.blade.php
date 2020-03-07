<!DOCTYPE html>
<html lang="en">
    @include('layouts.global_components.front._head')
    <body>
         <!--Preloader-->
        @include('layouts.global_components.front._preloader')
        <!--End Preloader-->

        <div class="page">
            @include('layouts.global_components.front._navigation')

            @yield('background_img')
            
            @yield('content')


        </div>
        <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
        @include('layouts.global_components.front._scripts')
    </body>

</html>

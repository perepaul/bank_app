<!DOCTYPE html>
<html lang="en">
    @include('layouts.global_components.front._head')
    <body>
        <!--Preloader-->
        @include('layouts.global_components.front._preloader')
        <!--End Preloader-->

         <!-- layout-->
         <div id="layout" class="layout-boxed-margin">
            <!-- fond-header-->
            <div id="fond-header" class="fond-header"></div>
            <!-- End fond-header-->


            @include('layouts.global_components.front._header')

            <!-- content-central-->
            <div class="content-central">
                @include('layouts.global_components.front._navigation')

                <!-- Container Area  -  Slide and tabs -->
                <div class="content_info">

                    @yield('title')

                    @include('layouts.global_components.front._breadcrumb')

                    @yield('slider')

                </div>
                <!-- End Container Area - Slide and tabs -->


                @yield('content')




                <!-- Footer -->
                @include('layouts.global_components.front._footer')
                <!-- End Footer -->
         </div>
        <!-- End layout-->


         <!-- JavaScript -->
         @include('layouts.global_components.front._scripts')
         <!-- End JavaScript -->

    </body>

</html>

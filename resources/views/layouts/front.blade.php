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
                    <div class="container">
                        <div class="row">
                             <!-- Content Breadcumbs And Slide-->
                            <div class="col-md-12">

                            <!-- breadcrumbs-->
                            @include('layouts.global_components.front._breadcrumb')
                            <!-- End breadcrumbs-->

                            <!-- Slide Section-->
                            @yield('slider')

                            <!-- End Slide Section-->

                            </div>
                            <!-- End Content Breadcumbs And Slide-->
                        </div>
                    </div>
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

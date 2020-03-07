<!DOCTYPE html>
<html lang="en">

    @include('layouts.global_components.dashboard._header')

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            @include('layouts.global_components.dashboard._sidebar')

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">

                    @include('layouts.global_components.dashboard._top-bar')

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                    @include('layouts.global_components.dashboard._page-header')


                        @yield('content')

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                @include('layouts.global_components.dashboard._footer')
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        @include('layouts.global_components.dashboard._back-to-top')

        @include('layouts.global_components.dashboard._logout-modal')

        @include('layouts.global_components.dashboard._scripts')

        @yield('js')
    </body>

</html>


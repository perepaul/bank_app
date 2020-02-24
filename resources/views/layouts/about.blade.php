@extends('layouts.front')

@section('about-section')

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
    
@endsection
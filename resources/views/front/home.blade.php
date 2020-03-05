@extends('layouts.front')

@section('background_img')
@include('layouts.global_components.front._background')
{{-- end hotlinks section --}}
    
@endsection

@section('content')

            <!-- Info Content  - Clients Downloads Area -->
            @include('layouts.global_components.front._customer_support')
            {{-- end info conent -client Downloads Area --}}

            <!-- Info Content Blog Post-->
            @include('layouts.global_components.front._order_card')
            <!-- end Info Content Blog Post-->

            <!-- Info Content Process-->
            @include('layouts.global_components.front._mini_about_us')
            <!-- End Info Content Process-->

            @include('layouts.global_components.front._statistics')

            @include('layouts.global_components.front._news_letter')

              <!-- footer Container-->
              @include('layouts.global_components.front._footer')
              <!-- End footer Container-->
    
@endsection
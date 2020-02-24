@extends('layouts.front')

@section('slider')
    @include('layouts.global_components.front._slider')
@endsection

@section('content')
{{-- hotlinks section --}}
@include('layouts.global_components.front._hotlinks')
{{-- end hotlinks section --}}

<!-- Info Content  - Clients Downloads Area -->
@include('layouts.global_components.front._client_count')
{{-- end info conent -client Downloads Area --}}

<!-- Info Content Blog Post-->
@include('layouts.global_components.front._blog_post')
<!-- end Info Content Blog Post-->

<!-- Info Content Process-->
@include('layouts.global_components.front._process')
<!-- End Info Content Process-->

<!-- Sponsors Container-->
@include('layouts.global_components.front._sponsors')
<!-- End Sponsors Container-->

@endsection

@php
$title = "About";
@endphp
@extends('layouts.front')

@section('content')

<!-- Breadcrumbs -->
<section class="section section-bredcrumbs">
    <div class="container context-dark breadcrumb-wrapper">
        <h1>About</h1>
        <ul class="breadcrumbs-custom">
            <li><a href="index.html">Home</a></li>
            <li class="active">About</li>
        </ul>
    </div>
</section>
<!-- A Wide Range of Banking & Financial Services-->
<section class="section section-lg">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-12 col-xl-10">
                <h2>Let's Get Acquainted</h2>
                <div class="heading-6 block-lg">
                    Your banking arrangements should fit with your lifestyle, your plans and your ambitions. We can draw
                    on a full range of services to create a highly personalised solution, designed to work for you.
                    <div>
                    </div>
                </div>
</section>
<!-- Services-->
<section class="section section-lg bg-gray-100">
    <div class="container">
        <div class="service-list">
            <div class="row row-20 service-item">
                <div class="col-md-6"><img src="{{asset('assets/front/images/services-1-540x327.jpg')}}" alt=""
                        width="540" height="327" />
                </div>
                <div class="col-md-6">
                    <h3 class="title">Checkings Account</h3>
                    <p class="exeption">The right checking account can help move you closer to your goals, no matter
                        where you are in life. Whether you want to simply handle monthly bills and everyday purchases,
                        or find new ways to earn perks and rewards, a Fifth Bank personal checking account is a
                        convenient way to manage your money with confidence.</p>
                    {{-- <a class="button button-lg button-primary" href="single-service.html">Learn more</a> --}}
                </div>
            </div>
            <div class="row row-20 service-item">
                <div class="col-md-6"><img src="{{asset('assets/front/images/services-2-540x327.jpg')}}" alt=""
                        width="540" height="327" />
                </div>
                <div class="col-md-6">
                    <h3 class="title">Private Banking</h3>
                    <p class="exeption">Our dedicated team offers banking services with a personalised focus. The
                        banking services they provide are supported by the Fifth Bank global network.
                        Our Private Banking focuses on the unique banking and financial needs of high-earning
                        individuals who prefer personalised banking services. Private Banking is about building
                        long-term relationships and offering personal guidance.
                        We offer you a full range of banking, investment and fiduciary products and services. Private
                        Banking leverages the resources and over 150 years of proven expertise of the Fifth Bank Group
                        in asset management, research,
                        securities & foreign exchange trading, credit and corporate finance.
                        We are therefore able to provide custom solutions for complex individual situations. </p>
                </div>
            </div>
            <div class="row row-20 service-item">
                <div class="col-md-6"><img src="{{asset('assets/front/images/services-3-540x327.jpg')}}" alt=""
                        width="540" height="327" />
                </div>
                <div class="col-md-6">
                    <h3 class="title">Mortgages</h3>
                    <p class="exeption">Webster Bank offers a wide range of mortgage lending solutions to help meet your
                        specific need. Whether you're thinking about buying your first home or that vacation home you've
                        always wanted, we offer mortgage solutions for needs big and small—and everything in between</p>
                    {{-- <a class="button button-lg button-primary" href="single-service.html">Learn more</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Call to action-->
{{-- <section class="section section-xs bg-primary-gradient">
    <div class="container">
        <div class="box-cta">
            <div class="box-cta-inner">
                <h3>Choose Your <span class="font-weight-bold">Bank Card</span> Now!</h3>
            </div>
            <div class="box-cta-inner"><a class="button button-lg button-white" href="single-service.html">Order
                    Card</a></div>
        </div>
    </div>
</section> --}}

<!-- footer Container-->
@include('layouts.global_components.front._footer')
<!-- End footer Container-->

@endsection

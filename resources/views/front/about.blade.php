@extends('layouts.front')

@section('title')
<div class="section-title-01">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3>About Us</h3>
                <h5>Great Company</h5>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</p>
            </div>

            <div class="col-md-5 hidden-xs hidden-sm">
                <div class="image-title-section">
                    <img src="assets/front/img/women-head.png" alt="" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<!-- Info Content - Boxes Services-->
<div class="content_info">
    <div class="padding-top padding-bottom-mini">
        <!-- Container Area - Boxes Services -->
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="assets/front/img/gallery/3.jpg" alt="" class="img-responsive">
                </div>

                <div class="col-md-7">
                    <div class="title-subtitle">
                        <h5>Company Value</h5>
                        <h3>Who Are You</h3>
                        <p class="lead">Coop Bank is a company of the envato Foundation through its banking activities to contribute in overcoming the structural causes of poverty in Australia.</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Our Mission</h5>
                            <p>Lorem iur adipiscing elit. Ut vehicula dapibus augue nec maximustiam eleifend magna erat, quis vestibulum lacus mattis sit ametec pellentesque lorem sapien.</p>
                        </div>

                        <div class="col-md-6">
                            <h5>Responsibilty</h5>
                            <p>Lorem iur adipiscing elit. Ut vehicula dapibus augue nec maximustiam eleifend magna erat, quis vestibulum lacus mattis sit ametec pellentesque lorem sapien.</p>
                        </div>
                    </div>
                </div>

                <!-- Col boxes-services -->
                <div class="col-md-12 padding-top">
                  <!-- boxes-services -->
                   <div class="row boxes-services">
                      <!-- item-boxe-services -->
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                          <div class="item-boxed-service">
                              <h4>Loan <br>Request</h4>
                              <span>Helping to fulfill your dreams.</span>
                              <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
                          </div>
                      </div>
                      <!-- End item-boxe-services -->

                      <!-- item-boxe-services -->
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                          <div class="item-boxed-service">
                              <h4>I want to save or <br>invest</h4>
                              <span>Advise your decisions</span>
                              <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
                          </div>
                      </div>
                      <!-- End item-boxe-services -->

                      <!-- item-boxe-services -->
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                          <div class="item-boxed-service">
                              <h4>Request items <br>online</h4>
                              <span>We offer you tools</span>
                              <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
                          </div>
                      </div>
                      <!-- End item-boxe-services -->
                   </div>
                   <!-- End boxes-services -->
                </div>
                <!-- End Col boxes-services -->
            </div>
        </div>
        <!-- End Container Area - Boxes Services -->
    </div>
</div>
<!-- End Info Content - Boxes Services-->

@endsection

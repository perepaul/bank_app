@extends('layouts.front')

@section('title')

    <!-- Info Section title-->
    <div class="section-title-01">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h3>Contact Us</h3>
                    <h5>Great Company</h5>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.</p>
                </div>

                <div class="col-md-5 hidden-xs hidden-sm">
                    <div class="image-title-section">
                        <img src="{{asset('assets/front/img/women-head.png')}}" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Info Section Title-->
    
@endsection


@section('content')

                <!-- Info Content - Boxes Services-->
                <div class="content_info">
                    <div class="padding-top padding-bottom-mini">
                        <!-- Container Area - Boxes Services -->
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8">
                                    <h3>Contact Form</h3>
                                    <p class="lead color-skin">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas Vestibulum tortor quam, feugiat vitae.</p>

                                    <p> ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra.
                                    </p>

                                    <form id="form-contact" class="form-theme" action="http://html.iwthemes.com/coopbank/php/send-mail.php">
                                        <input type="text" placeholder="Name" name="Name" required="">
                                        <input type="email" placeholder="Email" name="Email" required="">
                                        <input type="number" placeholder="Phone" name="Phone" required="">
                                        <textarea placeholder="Your Message" name="message" required=""></textarea>
                                        <input type="submit" name="Submit" value="Send Message" class="btn btn-primary">
                                    </form> 
                                    <div id="result"></div>  
                                </div>

                                <!-- Sidebars -->
                                <div class="col-md-4">
                                    <!-- contact-list-->
                                    <div class="contact-list-container">
                                        <ul class="contact-list">
                                            <li>
                                                <h4><i class="fa fa-envelope-o"></i>Email:</h4>
                                                <a href="#">Contact Customer Service</a>
                                            </li>

                                            <li>
                                                <h4><i class="fa fa-fax"></i>Phones:</h4>
                                                <h5>Miami:</h5>
                                                <p>447 50 12</p>
                                                <h5>Number Single National</h5>
                                                <p>02 4000 4 56234</p>
                                            </li>

                                            <li>
                                                <h4><i class="fa fa-life-ring"></i>Care centers:</h4>
                                                <a href="#"><i class="fa fa-arrow"></i>
                                                   <i class="fa fa-arrow-circle-o-right"></i> Offices
                                                </a>
                                                <a href="#"><i class="fa fa-arrow"></i>
                                                    <i class="fa fa-arrow-circle-o-right"></i>Cashiers
                                                </a>
                                                <a href="#"><i class="fa fa-arrow"></i>
                                                   <i class="fa fa-arrow-circle-o-right"></i> Point friend
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- End contact-list-->

                                    <h4>Download Our App</h4>

                                    <!-- services-full-boxes-->
                                    <div class="services-full-boxes">
                                        <!-- full-box Item-->
                                        <div class="full-box">
                                            <div class="info-full-box">
                                                <a href="#">Download Android App</a>
                                            </div>
                                            <div class="icon-full-box">
                                                <i class="fa fa-android"></i>
                                            </div>
                                        </div>
                                        <!-- End full-box  Item-->

                                        <!-- full-box Item-->
                                        <div class="full-box">
                                            <div class="info-full-box">
                                                <a href="#">Download Apple App</a>
                                            </div>
                                            <div class="icon-full-box">
                                                <i class="fa fa-apple"></i>
                                            </div>
                                        </div>
                                        <!-- End full-box  Item-->
                                    </div>
                                     <!-- End services-full-boxes-->
                                </div>
                                <!-- End Sidebars -->
                            </div>
                        </div>
                        <!-- End Container Area - Boxes Services -->
                    </div>
                </div>
                <!-- End Info Content - Boxes Services-->
    
@endsection

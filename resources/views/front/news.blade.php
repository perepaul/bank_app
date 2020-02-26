@extends('layouts.front')

@section('title')
             <!-- Info Content - Section Title-->
             <div class="content_info">
                <!-- Info Section title-->
                <div class="section-title-01 section-title-01-small">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h3>News.</h3>
                                <h5>FTbank LASTEST EVENTS</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Info Section Title-->
@endsection

@section('content')

<div class="content-central">
   <!-- Info Content - News Items-->
   <div class="content_info">
    <div class="paddings">
        <!-- events Container-->  
        <div class="container">
            <div class="row">
                <div class="col-md-9 blog-post-section">
                    <!--Item Blog Post-->
                    <div class="item-blog-post">
                        <!--Head Blog Post-->
                        <div class="head-item-blog-post">
                            <i class="fa fa-calculator"></i>
                            <h3>Protection With you</h3>
                        </div>
                        <!--End Head Blog Post-->  

                        <!--Img Blog Post-->
                        <div class="img-item-blog-post">
                            <img src="assets/front/img/blog-img/1.jpg" alt="">
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="fa fa-user"></i>
                                        <a href="#">Iwthemes</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                        <span>April 23, 2015</span>
                                    </li>

                                    <li>
                                        <i class="fa fa-eye"></i>
                                        <span>234 Views</span>
                                    </li>
                                </ul>                      
                            </div>
                        </div>
                        <!--End Img Blog Post-->  

                        <!--Ingo Blog Post-->
                        <div class="info-item-blog-post">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
                            <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
                        </div>
                        <!--End Ingo Blog Post-->  
                    </div>
                    <!--End Item Blog Post-->

                    <!--Item Blog Post-->
                    <div class="item-blog-post">
                        <!--Head Blog Post-->
                        <div class="head-item-blog-post">
                            <i class="fa fa-database"></i>
                            <h3>For your future</h3>
                        </div>
                        <!--End Head Blog Post-->  

                        <!--Img Blog Post-->
                        <div class="img-item-blog-post">
                            <img src="assets/front/img/blog-img/2.jpg" alt="">
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="fa fa-user"></i>
                                        <a href="#">Iwthemes</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                        <span>April 23, 2015</span>
                                    </li>

                                    <li>
                                        <i class="fa fa-eye"></i>
                                        <span>234 Views</span>
                                    </li>
                                </ul>                      
                            </div>
                        </div>
                        <!--End Img Blog Post-->  

                        <!--Ingo Blog Post-->
                        <div class="info-item-blog-post">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
                            <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
                        </div>
                        <!--End Ingo Blog Post-->  
                    </div>
                    <!--End Item Blog Post-->  

                    <!--Item Blog Post-->
                    <div class="item-blog-post">
                        <!--Head Blog Post-->
                        <div class="head-item-blog-post">
                            <i class="fa fa-database"></i>
                            <h3>For your future</h3>
                        </div>
                        <!--End Head Blog Post-->  

                        <!--Img Blog Post-->
                        <div class="img-item-blog-post">
                            <img src="assets/front/img/blog-img/2.jpg" alt="">
                            <div class="post-meta">
                                <ul>
                                    <li>
                                        <i class="fa fa-user"></i>
                                        <a href="#">Iwthemes</a>
                                    </li>

                                    <li>
                                        <i class="fa fa-clock-o"></i>
                                        <span>April 23, 2015</span>
                                    </li>

                                    <li>
                                        <i class="fa fa-eye"></i>
                                        <span>234 Views</span>
                                    </li>
                                </ul>                      
                            </div>
                        </div>
                        <!--End Img Blog Post-->  

                        <!--Ingo Blog Post-->
                        <div class="info-item-blog-post">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.</p>
                            <a href="#"><i class="fa fa-plus-circle"></i> View more</a>
                        </div>
                        <!--End Ingo Blog Post-->  
                    </div>
                    <!--End Item Blog Post-->

                    <ul class="pagination">
                        <li><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>

                @include('front.news_components.news_sidebar')
            </div>
        </div>
        <!-- End events Container--> 
    </div>
</div>
<!-- End Info Content - News Items-->
</div>
    
@endsection
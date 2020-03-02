<!-- footer-->
<footer id="footer">


    <!-- Items Footer -->
    <div class="container">
        <div class="row paddings-mini">
            <!-- contact Items Footer -->
            <div class="col-sm-6 col-md-3">
                <div class="border-right txt-right">
                    <h4>Contact us</h4>
                    <ul class="contact-footer">
                        <li>
                            <i class="fa fa-envelope"></i> <a href="#">sales@ftbank.com</a>
                        </li>
                        <li>
                            <i class="fa fa-headphones"></i> <a href="#">55-5698-4589</a>
                         </li>
                        <li class="location">
                            <i class="fa fa-home"></i> <a href="#"> Av new stret - New York</a>
                        </li>
                    </ul>
                    <div class="logo-footer">
                        <div class="icon-logo">
                            <i class="fa fa-university"></i>
                        </div>
                        <a href="index.html">
                            {{config('app.name')}}
                            <span>Your money is safe.</span>
                        </a>
                    </div>
               </div>
            </div>
            <!-- End contact items Footer -->

            <!-- Recent Links Items Footer -->
            <div class="col-sm-6 col-md-3">
                  <div class="border-right border-right-none">
                      <h4>Recent Links</h4>
                      <ul class="list-styles">
                          <li><i class="fa fa-check"></i> <a href="#">Ftbank Web ftBank</a></li>
                          <li><i class="fa fa-check"></i> <a href="#">FTbank Innovation Center</a></li>
                          <li><i class="fa fa-check"></i> <a href="#">Ftbank Responsibility</a></li>
                          <li><i class="fa fa-check"></i> <a href="#">Information of interest</a></li>
                      </ul>
                 </div>
            </div>
            <!-- End Recent Links Items Footer -->

            <!-- Recent Newsletter Footer -->
            <div class="col-sm-6 col-md-6">
                <div class="border-right txt-right">
                    <h4>Newsletter</h4>
                    <p>Please enter your e-mail and subscribe to our newsletter.</p>
                    <form id="newsletterForm" class="newsletterForm" action="#">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input class="form-control" placeholder="Email Address" name="email"  type="email" required="required">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name="subscribe" >Go!</button>
                            </span>
                        </div>
                    </form>
                    <div id="result-newsletter"></div>
               </div>
            </div>
            <!-- End Newsletter Footer -->

        </div>
    </div>
    <!-- End Items Footer -->

    <!-- footer Down-->
    <div class="footer-down">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <!-- Nav Footer-->
                    <ul class="nav-footer">
                        <li><a href="/preview">HOME</a> </li>
                        {{-- <li><a href="#">COMPANY</a></li> --}}
                        <li><a href="/about">ABOUT</a></li>
                        <li><a href="#">NEWS</a></li>
                        <li><a href="#">PORTFOLIO</a></li>
                        <li><a href="/contact">CONTACT</a></li>
                    </ul>
                    <!-- End Nav Footer-->
                </div>
                <div class="col-md-5">
                    <p>&copy; 2015 CoopBank. All Rights Reserved.  2010 - 2020</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footer Down-->
</footer>
<!-- End footer-->

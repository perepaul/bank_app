      <!-- Page Footer-->
      <footer class="section footer-3">
        <div class="row row-flex no-gutters">
          <div class="col-lg-12">
            <div class="footer-wrapper">
              <div class="container">
                <div class="row">
                  <div class="col-md-5 col-lg-6 col-lg-pull-1">
                    <h5 class="title">Contact Information</h5>
                    <!-- Bootstrap tabs-->
                    <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-3">
                      <!-- Nav tabs-->
                      <ul class="nav nav-tabs">
                        <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-3-1" data-toggle="tab">Atlanta</a></li>
                      </ul>
                         <!-- Tab panes-->
                        <div class="tab-content">
                          <div class="tab-pane fade show active" id="tabs-1-1">
                            <ul class="contact-box">
                              <li>
                                  <div class="unit unit-horizontal unit-spacing-xxs">
                                    <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                                    <div class="unit-body"><a class="hover-text" href="#">{{config('app.address')}}</a></div>
                                  </div>
                              </li>
                              <li>
                                <div class="unit unit-horizontal unit-spacing-xxs">
                                  <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                  <div class="unit-body">
                                    <ul class="list-phones">
                                      <li><a class="hover-text" href="tel:{{'+'.config('app.phone')}}">{{config('app.phone')}}</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <div class="unit unit-horizontal unit-spacing-xxs">
                                  <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                                  <div class="unit-body"><a class="hover-text" href="mailto:{{config('app.email')}}">{{config('app.email')}}</a></div>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="col-md-5 col-lg-6 col-lg-push-1">
                    <h5 class="title">Newsletter</h5>
                    <p>Keep up with our always upcoming financial news. Enter your e-mail and subscribe to our newsletter to get all updates right into your inbox.</p>
                    <!-- RD Mailform-->
                          <!-- RD Mailform-->
                          <form class="rd-form rd-mailform rd-form-inline form-sm" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="https://livedemo.zemez.io/html/vistapay/bat/rd-mailform.php">
                            <div class="form-wrap">
                              <input class="form-input" id="subscribe-form-1-email" type="email" name="email" data-constraints="@Email @Required">
                              <label class="form-label" for="subscribe-form-1-email">Your E-mail</label>
                            </div>
                            <div class="form-button">
                              <button class="button button-primary button-round" type="submit">Subscribe</button>
                            </div>
                          </form>
                  </div>
    
                  <div class="col-md-12 col-lg-12 text-center mt-5">
                    <!-- Rights-->
                    <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>All rights reserved</span><span>.&nbsp;</span><a href="#">Privacy Policy</a></p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
@extends('layouts.front')

@section('content')
   <!-- Info Content - User Area-->
   <div class="content_info">
    <div class="paddings">  
        <div class="container">
            <div class="row user-area">
                <!-- Left User Area-->
                @include('front.account.components._sidebar')
                <!-- End Left User Area-->

                <!-- Content Tabs Section-->
                <div class="col-md-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                        <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Personal Info</a>
                      </li>
                      <li role="presentation">
                        <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Change Avatar</a>
                      </li>
                      <li role="presentation">
                        <a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Change Password</a>
                      </li>
                    </ul>
                    <!-- End Nav tabs -->

                    <!-- tab-content-->
                    <div class="tab-content">
                        <!-- tab-Item-1-->
                        <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                            <form action="#" class="form-theme">
                                <label>First Name</label>
                                <input type="number" placeholder="Federick" class="input">

                                <label>Last Name</label>
                                <input type="number" placeholder="Gordon" class="input">

                                <label>Mobile Number</label>
                                <input type="number" placeholder="+1 6358734" class="input">

                                <label>Interests</label>
                                <input type="number" placeholder="Credits, accounts, etc.." class="input">

                                <label>Ocupation</label>
                                <input type="number" placeholder="Web Developer" class="input">

                                <label>About</label>
                                <textarea placeholder="Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas"></textarea>

                                <label>Web Site Url</label>
                                <input type="number" placeholder="http://www.iwthemes.com" class="input">

                                <input type="submit" class="btn" value="Save Changes">
                            </form>
                        </div>
                        <!-- tab-Item-1-->

                        <!-- tab-Item-2-->
                        <div role="tabpanel" class="tab-pane fade in" id="tab2">
                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                            <div class="fcorn-shortcodes">
                                <form class="file-input">
                                    <label for="file99">
                                        <!-- You can use this `onchange="this.parentNode.parentNode.nextElementSibling.value = this.value"` 
                                        in input for file uploader to work -->
                                        <span class="btn left"><input type="file" id="file99">Choose File</span>
                                      </label>
                                      <input type="text" placeholder="No file choosen" class="file-replacer left" readonly="">
                                </form>
                            </div>
                        </div>
                        <!-- tab-Item-2-->

                        <!-- tab-Item-3-->
                        <div role="tabpanel" class="tab-pane fade in" id="tab3">
                            <form action="#" class="form-theme">
                                <label>Current Password</label>
                                <input type="number" placeholder="Federick" class="input">

                                <label>New Password</label>
                                <input type="number" placeholder="Gordon" class="input">

                                <label>Re-type New Password</label>
                                <input type="number" placeholder="+1 6358734" class="input">

                                <input type="submit" class="btn" value="Save Changes">
                            </form>
                        </div>
                        <!-- tab-Item-3-->
                    </div>
                    <!-- End tab-content -->
                </div>
                <!-- End Tabs section-->

                
            </div>
        </div>
    </div>
</div>
<!-- End Info Content - User Area-->
@endsection
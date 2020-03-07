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
                        <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">Account Topup</a>
                      </li>
                      <li role="presentation">
                        <a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Transfer To Others</a>
                      </li>
                    </ul>
                    <!-- End Nav tabs -->

                    <!-- tab-content-->
                    <div class="tab-content">
                        <!-- tab-Item-1-->
                        <div role="tabpanel" class="tab-pane fade in active" id="tab1">
                            <form id="payment-form">
                                <div id="card-element">
                                  <!-- Elements will create input elements here -->
                                </div>
                              
                                <!-- We'll put the error messages in this element -->
                                <div id="card-errors" role="alert"></div>
                              
                                <button id="submit">Pay</button>
                              </form>
                              
                            {{-- <form action="{{route('update-account')}}" class="form-theme" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">$</span>
                                        <input type="text" class="form-control" placeholder="Amount" aria-describedby="basic-addon1">
                                      </div>
                                </div>

                                <div class="form-group">
                                    <label for=""></label>
                                </div>

                                <label>First Name</label>
                               <input type="text" name="first_name" placeholder="Federick" class="input" value="{{auth()->user()->first_name}}" >

                                <label>Last Name</label>
                                <input name="last_name" type="text" placeholder="Gordon" class="input" value="{{auth()->user()->last_name}}" >

                                <label>Address  1</label>
                                <input name="address1" type="text" placeholder="Address line 1" class="input" value="{{auth()->user()->address1}}" >

                                <label>Address  2</label>
                                <input name="address2" type="text" placeholder="Address line 2" class="input" value="{{auth()->user()->address2}}" >

                                <input type="submit" value="Update" class="btn">

                            </form> --}}
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
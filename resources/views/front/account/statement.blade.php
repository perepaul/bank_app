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
               
                <!-- End Tabs section-->

                
            </div>
        </div>
    </div>
</div>
<!-- End Info Content - User Area-->
@endsection
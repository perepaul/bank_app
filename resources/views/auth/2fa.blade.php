@extends('layouts.front')
@section('css')
<style>
   *{
       color:black !important;
   }
   .border-danger {
     border-color: red;
   }
   .text-danger {
     color:red !important;
   }
</style>

@endsection

@section('content')


<section class="section one-screen-page bg-primary-dark">
    <div class="one-screen-page-inner">
<div class="page-content text-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7" style="color:black!important;">
          <!-- Tabs-->

          <div class="card">
            <div class="card-body p-5">
                <img src="{{$user->image}}" alt="Profile Photo" style="height:100px; margin:8px; border-radius:50%">
                <h4 class="text-left">Hi {{$user->last_name}},</h4>
                <p style="font-size: 14px; font-weight:400;">
                    Due to upgrade in bank policies, we've added another security layer to help secure your account, therefore,
                    <strong>please enter the otp sent to your phone number ({{substr($user->phone_number,0,4).'xxxx'.substr($user->phone_number,-3)}}) </strong>
                     or your email address <strong>({{substr($user->email,0,5).'xxxxxx'.substr($user->email,-5)}}) </strong>
                     to proceed to your account.</p>
                <form action="{{route('2fa.auth',$user->id)}}" method="post" class="d-flex justify-content-center mt-3">
                  @csrf
                  <div class="form-group col-8 ">
                    <input type="text" name="token" placeholder="Enter Otp" value="{{old('token')}}" class="form-control form-control-sm @if($errors->has('token')) border-danger  @endif">
                    @if($errors->has('token'))
                      <div class="text-danger text-left">{{$errors->first('token')}}</div>
                    @endif
                    <button class="btn btn-info btn-sm mt-3">Validate</button>
                  </div>

                </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
    </div>
</section>
@endsection
@section('js')

@endsection

@extends('layouts.front')

@section('title')
    <div class="section-title-01 section-title-01-small">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Open Account</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content_info">
        <!-- title-vertical-line-->
        <div class="title-vertical-line">
            <h2><span>Open</span> Account</h2>
            <p class="lead">Open Account and we will be happy to help to save your money.</p>
        </div>
        <!-- End title-vertical-line-->

        <!-- Info Resalt-->
        <div class="paddings">
            <!-- Container Area - services-process -->
            <div class="container">
                <div class="row">


                    <form action="{{route('register')}}" method="post" class="fcorn-register container col-md-8 col-md-push-2">
                        <p class="register-info">Note: All fields are required.</p>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <p class="col-md-6"><input name="first_name" type="text" placeholder="First Name" required="" value="{{old('first_name')}}"></p>
                            <p class="col-md-6"><input name="last_name" type="text" placeholder="Last Name" required="" value="{{old('last_name')}}"></p>
                            </div>
                            <p><input type="email" name="email" placeholder="Email Address" required="" value="{{old('email')}}">
                            </p>
                            <div class="row">
                                <p class="col-md-6"><input name="password" type="password" placeholder="Password" required=""></p>
                                <p class="col-md-6"><input name="password_confirmation" type="password" placeholder="Verify Password" required=""></p>
                            </div>
                            <div class="row">
                                <p class="col-md-6 "><input type="text" name="ssn" id="ssn" placeholder="Social Security Number (SSN)"  value="{{old('ssn')}}"></p>
                                <p class="col-md-6 gender-wrap">
                                    <select name="gender" required>
                                    <option value="0" selected="" disabled="">Choose Gender</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Other</option>
                                    </select>
                                </p>
                            </div>
                            <div>

                            </div>

                            <div class="text-right">

                                <input class="btn btn-primary text-right" type="submit" value="Register Now">
                            </div>
                                <br>
                        </form>


                </div>
            </div>
            <!-- End Container Area - services-process -->
        </div>
        <!-- End Info Resalt-->
    </div>
@endsection

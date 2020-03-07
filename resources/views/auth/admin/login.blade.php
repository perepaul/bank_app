@extends('layouts.front')

@section('title')
    <div class="section-title-01 section-title-01-small">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Login</h3>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content_info">
        <!-- title-vertical-line-->
        <div class="title-vertical-line">
            <h2><span>Login</span></h2>
            <p class="lead">Signin to your internet Banking Account.</p>
        </div>
        <!-- End title-vertical-line-->

        <!-- Info Resalt-->
        <div class="paddings">
            <!-- Container Area - services-process -->
            <div class="container">
                <div class="row">
                    @if ($errors)
                        {{-- @dd($errors) --}}
                            {{-- <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div> --}}
                        @endif

                    <form action="/login" method="post" class="fcorn-register container col-md-8 col-md-push-2 ">
                        <div style="margin-top: 45px">

                                @csrf
                                @method('post')
                                <p><input type="email" name="email" placeholder="Email Address" required="" value="{{old('email')}}">
                                </p>
                                <p><input  name="password" type="password" placeholder="Password" required="">
                                </p>
                                <div class="text-right">
                                    <input class="btn btn-primary" type="submit" value="Login"></p>
                                </div>

                            </div>
                        </form>



                </div>
            </div>
            <!-- End Container Area - services-process -->
        </div>
        <!-- End Info Resalt-->
    </div>
@endsection

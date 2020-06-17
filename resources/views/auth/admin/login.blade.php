@php
$title = "Login"
@endphp
@extends('layouts.front')


@section('content')


<section class="section one-screen-page bg-primary-dark">
    <div class="one-screen-page-inner">
        <div class="page-content text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-4">
                        <!-- Tabs-->
                        <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
                            <!-- Nav tabs-->
                            <!-- Tab panes-->
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs-1-1">
                                    <h3>Welcome Back Admin</h3>

                                    <!-- RD Mailform-->
                                    <form class="rd-form form-lg " action="{{route('admin-login')}}" method="POST">
                                        @csrf
                                        @if(session()->has('username'))
                                        <div class="alert alert-danger text-danger alert-dismissible fade show"
                                            role="alert">
                                            <span class="bg-danger">{{session()->get('username')}}</span>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="form-wrap">
                                            <input class="form-input" id="login-email" type="username" name="username"
                                                data-constraints=" @Required" value="{{old('username')}}">
                                            <label class="form-label" for="login-email">E-mail Or User ID</label>
                                        </div>
                                        <div class="form-wrap">
                                            <input class="form-input" id="login-password" type="password"
                                                name="password" data-constraints=" @Required">
                                            <label class="form-label" for="login-password">Password</label>
                                        </div>
                                        <button class="button button-lg button-round button-block button-primary"
                                            type="submit">Sign In</button>
                                    </form>
                                    <div class="group-sm group-sm-justify group-middle social-items"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

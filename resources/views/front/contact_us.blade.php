@php
    $title = "Contact";
@endphp
@extends('layouts.front')

@section('content')

      <!-- Breadcrumbs -->
      <section class="section section-bredcrumbs">
        <div class="container context-dark breadcrumb-wrapper">
          <h1>Contacts</h1>
          <ul class="breadcrumbs-custom">
            <li><a href="index.html">Home</a></li>
            <li class="active">Contacts</li>
          </ul>
        </div>
      </section>
      <!-- Mailform-->
      <section class="section section-lg bg-default">
        <div class="container">
          <div class="row row-50 justify-content-between">
            <div class="col-md-6 col-lg-4 col-xl-3">
              <!-- Bootstrap tabs-->
              <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-1">
                <!-- Nav tabs-->
                <ul class="nav nav-tabs">
                  <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Atlanta</a></li>
                  {{-- <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">New York</a></li>
                  <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Chicago</a></li> --}}
                </ul>
                <!-- Tab panes-->
                <div class="tab-content">
                  <div class="tab-pane fade show active" id="tabs-1-1">
                    <ul class="contact-box">
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="hover-text" href="#">3344 Peachtree Rd NE 800, <br class="veil reveal-lg-inline">Atlanta, GA 30326 USA</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                          <div class="unit-body">
                            <ul class="list-phones">
                              <li><a class="hover-text" href="tel:#">{{config('app.phone')}}</a></li>
                              {{-- <li><a class="hover-text" href="tel:#">1-800-1234-567</a></li> --}}
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                          <div class="unit-body"><a class="hover-text" href="mailto:{{config('app.email')}}"><span class="__cf_email__" data-cfemail="9ef7f0f8f1defafbf3f1f2f7f0f5b0f1ecf9">[email&#160;protected]</span></a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  {{-- <div class="tab-pane fade" id="tabs-1-2">
                    <ul class="contact-box">
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="hover-text" href="#">2130 Marshall Street, <br class="veil reveal-lg-inline">New York, NY 65432-8767 USA</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                          <div class="unit-body">
                            <ul class="list-phones">
                              <li><a class="hover-text" href="tel:#">1-800-1234-567</a></li>
                              <li><a class="hover-text" href="tel:#">1-800-1234-567</a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                          <div class="unit-body"><a class="hover-text" href="https://livedemo.zemez.io/cdn-cgi/l/email-protection#3d1e"><span class="__cf_email__" data-cfemail="1a73747c755a7e7f7775767374713475687d">[email&#160;protected]</span></a></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-pane fade" id="tabs-1-3">
                    <ul class="contact-box">
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                          <div class="unit-body"><a class="hover-text" href="#">5432 Central Street, <br class="veil reveal-lg-inline">Chicago, IL 43541-3243 USA</a></div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                          <div class="unit-body">
                            <ul class="list-phones">
                              <li><a class="hover-text" href="tel:#">1-800-1234-567</a></li>
                              <li><a class="hover-text" href="tel:#">1-800-1234-567</a></li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="unit unit-horizontal unit-spacing-xxs">
                          <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                          <div class="unit-body"><a class="hover-text" href="https://livedemo.zemez.io/cdn-cgi/l/email-protection#6546"><span class="__cf_email__" data-cfemail="fa93949c95ba9e9f979596939491d495889d">[email&#160;protected]</span></a></div>
                        </div>
                      </li>
                    </ul>
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-6">
              <h4>Get in Touch</h4>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

              <!-- RD Mailform-->
              <form class="rd-form "  method="post" action="{{route('contact-us')}}">
                @csrf
                <div class="form-wrap">
                  <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-name">Name</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                  <label class="form-label" for="contact-email">E-mail</label>
                </div>
                <div class="form-wrap">
                  <label class="form-label" for="contact-message">Message</label>
                  <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                </div>
                @if (session()->has('message'))
                  <div class="alert alert-danger">
                      <ul>
                          {{-- @foreach ($errors->all() as $error) --}}
                              <li class="text-danger">{{ session()->get('message') }}</li>
                          {{-- @endforeach --}}
                      </ul>
                  </div>
              @endif
                <button class="button button-primary" type="submit">Send</button>
              </form>
            </div>
            
          </div>
        </div>
      </section>

         <!-- footer Container-->
         @include('layouts.global_components.front._footer')
         <!-- End footer Container-->

@endsection

<!DOCTYPE html>
<html lang="en">
@include('front.user_dashboard.components.user_head')
<body>
    {{-- wrapper div  --}}
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header"> 
        {{-- navigation profile  --}}
        @include('front.user_dashboard.components.navigation')
        {{-- navigation profile end  --}}

        {{-- sidebar body  --}}
        <div class="app-main">
            @include('front.user_dashboard.components.sidebar')


            {{-- analytics body  --}}
            <div class="app-main__outer">
                @include('front.user_dashboard.components.analytics')
            {{-- analytics body end  --}}

                {{-- footer body  --}}
            <div class="app-wrapper-footer">
                @include('front.user_dashboard.components.footer')

            </div>
                {{-- footer body end  --}}
            </div>

            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

        </div>
        {{-- sidebar body end  --}}

    </div>
    {{-- wrapper div end  --}}

    <script type="text/javascript" src="{{asset('assets/account/js/main.js')}}"></script>

</body>
</html>
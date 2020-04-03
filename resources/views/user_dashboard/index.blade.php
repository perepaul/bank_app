<!DOCTYPE html>
<html lang="en">
@include('user_dashboard.components.user_head')

<body>
    {{-- wrapper div  --}}
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- navigation profile  --}}
        @include('user_dashboard.components.navigation')
        {{-- navigation profile end  --}}

        {{-- sidebar body  --}}
        <div class="app-main">
            @include('user_dashboard.components.sidebar')


            {{-- analytics body  --}}
            <div class="app-main__outer">
                @include('user_dashboard.components.analytics')
                {{-- analytics body end  --}}

                {{-- footer body  --}}
                <div class="app-wrapper-footer">
                    @include('user_dashboard.components.footer')

                </div>
                {{-- footer body end  --}}
            </div>

            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>

        </div>
        {{-- sidebar body end  --}}

    </div>
    {{-- wrapper div end  --}}

    <script type="text/javascript" src="{{asset('assets/account/js/main.js')}}"></script>
    <script type='text/javascript' data-cfasync='false'>
        window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '5f252531-b845-429d-9097-fb5c667bb8c7', f: true }); done = true; } }; })();
    </script>

</body>

</html>

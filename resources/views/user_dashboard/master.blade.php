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
                <div class="app-main__inner">
                    @yield('content')
                </div>
                {{-- @include('user_dashboard.components.analytics') --}}
                {{-- analytics body end  --}}

                {{-- footer body  --}}
                <div class="app-wrapper-footer">
                    @include('user_dashboard.components.footer')

                </div>
                {{-- footer body end  --}}
            </div>

            {{-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> --}}

        </div>
        {{-- sidebar body end  --}}

    </div>
    {{-- wrapper div end  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript" src="{{asset('assets/account/js/main.js')}}"></script>
    <script>
        function changePassword()
        {
          Swal.fire({
            title: 'Change Password',
            html:
                '<div class="form-group text-left">'+
                '<label for="password">New Password</label>'+
                '<input type="password" class="form-control" id="password" placeholder="Enter password">'+
                '</div>'+
                '<div class="form-group text-left">'+
                '<label for="password_confirmation">Confirm Password</label>'+
                '<input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">'+
                '</div>',
            focusConfirm: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return fetch('{{route("user-changePassword")}}', {
                    method:'post',
                    body:JSON.stringify({
                        password:document.getElementById('password').value,
                        password_confirmation:document.getElementById('password_confirmation').value
                    }),
                    headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                    }
                })
                .then(response => response.json())
                .then(response => {
                    if (!response.success) {
                    throw new Error(response.errors.password)
                    }
                    return response;
                })
                .catch(error => {Swal.showValidationMessage(` ${error}`)})
            },
            allowOutsideClick: () => !Swal.isLoading()
            }).then(result => {
            Swal.fire(
                'Password Changed',
                result.value.message,
                'success'
            )
            })



        }
    </script>
    <script type='text/javascript' data-cfasync='false'>
        window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '5f252531-b845-429d-9097-fb5c667bb8c7', f: true }); done = true; } }; })();
    </script>

</body>

</html>

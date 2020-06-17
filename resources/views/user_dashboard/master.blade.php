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
            preConfirm: () => {
                document.getElementById('password').value
                var p_conf = document.getElementById('password_confirmation').value
                return p_conf;

                // return fetch(`//api.github.com/users/${login}`)
                // .then(response => {
                //     if (!response.ok) {
                //     throw new Error(response.statusText)
                //     }
                //     return response.json()
                // })
                // .catch(error => {
                //     Swal.showValidationMessage(
                //     `Request failed: ${error}`
                //     )
                // })
            },
            allowOutsideClick: () => !Swal.isLoading()
            }).then(result => {
                console.log(result);
            })

            // console.log(formValues);
            // if (formValues) {
            // Swal.fire(JSON.stringify(formValues))
            // }
        }
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5ee95c8b9e5f69442290b533/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>

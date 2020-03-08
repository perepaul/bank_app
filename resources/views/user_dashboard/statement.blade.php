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

                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark text-danger">
                                    </i>
                                </div>
                                <div>Account Statement
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-header">Statement 
                        </div>
                        <div class="table-responsive">
                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Transaction #</th>
                                        <th>Type</th>
      
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Amount</th>
                                        <th class="text-center">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transfers as $transfer)
                                    <tr>
                                        <td class="text-center text-muted">{{$transfer->reference}}</td>
                                        <td>
                                            Transfer
                                        </td>
            
                                        <td class="text-center">

                                            <div class="badge badge-success">Success</div>
                                        </td>
                                        <td class="text-center">
                                            {{$transfer->amount}}
                                        </td>
                                        <td class="text-center">
                                            {{$transfer->created_at->format('d m Y')}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-block text-center card-footer mx-auto">
                            {{$transfers->links()}}
                        </div>
                    </div>



                </div>


                {{-- @include('user_dashboard.components.analytics') --}}
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
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.5.0/dist/sweetalert2.all.js"></script>
    <script type="text/javascript" src="{{asset('assets/account/js/main.js')}}"></script>

</body>
</html>
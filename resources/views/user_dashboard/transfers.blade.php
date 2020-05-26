@extends('user_dashboard.master')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-display1 icon-gradient bg-premium-dark text-danger">
                </i>
            </div>
            <div>Transfers
            </div>
        </div>
    </div>

</div>
<div class="main-card mb-3 card">
    <div class="card-header">Transfers
    </div>
    <div class="table-responsive">
        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center">Transfer #</th>
                    <th>Name</th>
                    <th class="text-center">Account Number</th>
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
                        {{$transfer->reciepient_name}}
                    </td>
                    <td class="text-center">{{$transfer->account_number}}</td>
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
@endsection



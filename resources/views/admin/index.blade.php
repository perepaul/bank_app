@extends('layouts.admin_app')
@section('content')
{{-- @dd($transactions) --}}
<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title">Last 5 accounts</h5>

        <table class="table table-striped table-hover text-sm">
            <thead class="thead-dark">
                <tr>
                    <th>User ID</th>
                    <th>Account No.</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->account_id}}</td>
                    <td>{{$user->account_number}}</td>
                    <td>{{$user->last_name.' '.$user->first_name}}</td>
                    <td>@include('layouts.global_components.dashboard.status',['status'=>$user->status])</td>
                    <td>{{$user->created_at->format('D M, Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Last 5 transactions</h5>

        <table class="table table-striped table-hover text-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Ref No.</th>
                    <th>User</th>
                    <th>Recipient</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                <tr>
                    <td>{{$transaction->reference}}</td>
                    <td>{{$transaction->user->first_name}}</td>
                    <td>{{$transaction->reciepient_name}}</td>
                    <td>
                        <div class="btn btn-success btn-sm">sucess</div>
                    </td>
                    <td>{{$user->created_at->format('D M, Y')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

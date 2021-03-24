@extends('layouts.admin_app')
@section('content')
<div class="d-flex justify-content-center mb-5">
    <div class="col-3">
        <select class='users form-control' >
            <option>Select User to filter data </option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->first_name.' '.$user->last_name}}</option>
            @endforeach
        </select>
    </div>
</div>
    <table class="table table-striped table-hover text-sm">
        <thead class="thead-dark">
            <tr>
                <th>reference</th>
                <th>From</th>
                <th>To</th>
                <th>Account number</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->reference }}</td>
                    <td>{{ $transaction->user->first_name . ' ' . $transaction->user->last_name }}</td>
                    <td>{{ $transaction->reciepient_name }}</td>
                    <td>{{$transaction->account_number}}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->created_at->format('D M, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection

@section('js')
<script>
    $(()=>{
        var current_url = '{{basename(request()->path())}}';
        if(current_url !== 'history')
        {
            $('.users').val(current_url)
        }
    })

    $(()=>{
        $(document).on('change','.users',(e)=>{
            var val = $(e.target).val()
            if(val !== '')
            {
                location.href = '{{route("history")}}/'+val
            }
        })
    })
</script>
@endsection

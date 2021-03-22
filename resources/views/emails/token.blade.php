@component('mail::message')
# Hey {{$user->first_name}},

{!!$body!!}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Regards,<br>
{{ config('app.name') }}.
@endcomponent

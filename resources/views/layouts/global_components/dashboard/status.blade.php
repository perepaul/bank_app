@if($status)
    @php
        $text = "Unknown";
        $class = "btn-default";
    @endphp

    @switch($status)
        @case(1)
            @php
                $text = "Active";
                $class = "btn-success";
            @endphp
            @break
        @case(2)
            @php
                $text = "In Active";
                $class = "btn-danger";
            @endphp
            @break
            @case(3)
                @php
                    $text = "On Hold";
                    $class = "btn-warning";
                @endphp
            @break
    @endswitch

    <div class="btn {{$class}} btn-sm">{{$text}}</div>
@endif

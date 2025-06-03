@if($task['priority'] > 1)
    <span class="tag has-text-weight-bold
        @switch($task['priority'])
            @case(2) is-primary @break
            @case(3) is-warning @break
            @case(4) is-danger @break
        @endswitch
    ">
        @switch($task['priority'])
            @case(2) Moderate @break
            @case(3) Urgent @break
            @case(4) Critical! @break
        @endswitch
    </span>
@endif

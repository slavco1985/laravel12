@if(!empty($timing))

<div class="overview services shadow-sm no-margin ">
    <h2 class="border-bottom">Business Timing</h2>
    <ul class="list-group timilist list-group-flush">
        @if(!empty($timing->monday_from) && !empty($timing->monday_to))
        <li class="list-group-item">Monday <span>{{ \Carbon\Carbon::parse($timing->monday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->monday_to)->format('g:i A') }}</span></li>
        @endif
        @if(!empty($timing->tuesday_from) && !empty($timing->tuesday_to))
        <li class="list-group-item">Tuesday <span>{{ \Carbon\Carbon::parse($timing->tuesday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->tuesday_to)->format('g:i A') }}</span></li>
        @endif
        @if(!empty($timing->wednesday_from) && !empty($timing->wednesday_to))
        <li class="list-group-item">Wednesday <span>{{ \Carbon\Carbon::parse($timing->wednesday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->wednesday_to)->format('g:i A') }}</span></li>
        @endif
        @if(!empty($timing->thursday_from) && !empty($timing->thursday_to))
        <li class="list-group-item">Thursday <span>{{ \Carbon\Carbon::parse($timing->thursday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->thursday_to)->format('g:i A') }}</span></li>
        @endif
        @if(!empty($timing->friday_from) && !empty($timing->friday_to))
        <li class="list-group-item">Friday <span>{{ \Carbon\Carbon::parse($timing->friday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->friday_to)->format('g:i A') }}</span></li>
        @endif
        @if(!empty($timing->saturday_from) && !empty($timing->saturday_to))
        <li class="list-group-item">Saturday <span>{{ \Carbon\Carbon::parse($timing->saturday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->saturday_to)->format('g:i A') }}</span></li>
        @endif
        @if(!empty($timing->sunday_from) && !empty($timing->sunday_to))
        <li class="list-group-item">Sunday <span>{{ \Carbon\Carbon::parse($timing->sunday_from)->format('g:i A') }} - {{ \Carbon\Carbon::parse($timing->sunday_to)->format('g:i A') }}</span></li>
        @endif
    </ul>
</div>

@endif
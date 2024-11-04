@if(!empty($social))
<div class="overview services shadow-sm no-margin ">
    <h2 class="border-bottom">Social Links</h2>
    <ul class="list-group social-link timilist list-group-flush">
        @if(!empty($social->facebook))
        <li class="list-group-item">
            <a href="{{ $social->facebook }}" target="_blank">
                <i class="bi bi-facebook"></i> {{ $social->facebook }}
            </a>
        </li>
        @endif
        @if(!empty($social->twitter))
        <li class="list-group-item">
            <a href="{{ $social->twitter }}" target="_blank">
                <i class="bi bi-twitter"></i> {{ $social->twitter }}
            </a>
        </li>
        @endif
        @if(!empty($social->pinterest))
        <li class="list-group-item">
            <a href="{{ $social->pinterest }}" target="_blank">
                <i class="bi bi-pinterest"></i> {{ $social->pinterest }}
            </a>
        </li>
        @endif
        @if(!empty($social->instagram))
        <li class="list-group-item">
            <a href="{{ $social->pinterest }}" target="_blank">
                <i class="bi bi-pinterest"></i> {{ $social->instagram }}
            </a>
        </li>
        @endif
        @if(!empty($social->linkedin))
        <li class="list-group-item">
            <a href="{{ $social->linkedin }}" target="_blank">
                <i class="bi bi-linkedin"></i> {{ $social->linkedin }}
            </a>
        </li>
        @endif
        @if(!empty($social->youtube))
        <li class="list-group-item">
            <a href="{{ $social->youtube }}" target="_blank">
                <i class="bi bi-youtube"></i> {{ $social->youtube }}
            </a>
        </li>
        @endif
       
    </ul>
</div>
@endif
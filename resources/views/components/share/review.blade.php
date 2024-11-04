<li class="rev">
    <i class="bi @if($rating >= 1) act @endif bi-star-fill"></i>
    <i class="bi @if($rating >= 2) act @endif bi-star-fill"></i>
    <i class="bi @if($rating >= 3) act @endif bi-star-fill"></i>
    <i class="bi @if($rating >= 4) act @endif bi-star-fill"></i>
    <i class="bi @if($rating >= 5) act @endif bi-star-fill"></i>
    <small>{{ substr(number_format($rating, 2), 0, -1); }}  ({{ $count }} Reviews)</small>
</li>
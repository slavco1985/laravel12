<div class=" shadow-sm overview mt-4">
    <h2 class="border-bottom">Location</h2>
    <div class="locationcover">
        @if(!empty($iframe))
         <iframe src="{{ $iframe }}" height="250"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        @endif
        <p><i class="bi bi-geo-alt"></i> {{ $address }}</p>
    </div>
</div>


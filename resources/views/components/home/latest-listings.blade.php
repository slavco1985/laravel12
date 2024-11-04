<div class="featured-listing container-fluid">
    <div class="container">
        <div class="section-title mb-3 row">
            <h2>Latest Listings</h2>
            <p>Take a look at the Newly Added Listings. Don’t  find What you looking for ? <a class="text-primary" href="{{ route('all-listings') }}">View All Listings</a>
        </div>
        <div class="featuredrow row">
            @if(!empty($listings)) @foreach($listings as $list)
            <div class="col-lg-4 col-md-6">
                <x-card.grid-card :list="$list" :footTyp="'user'" />
            </div>
            @endforeach @endif
        </div>
    </div>
</div>
<section class="container-fluid featured-city">
    <div class="container">
        <div class="section-title mb-3 row">
            <h2>Explore Hot Locations</h2>
            <p>  Don’t  find What you looking for ? <a class="text-primary" href="{{ route('all-cities') }}">View All Cities</a>
        </div>
        <div class="row cityrow">

            @if($featured_city) @foreach($featured_city as $fc)
                <x-card.city-card :city="$fc" />
            @endforeach @endif

        </div>
         
    </div>
</section>
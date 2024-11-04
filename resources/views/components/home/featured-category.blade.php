<section class="container-fluid featured-category">
    <div class="container">
        <div class="section-title mb-3 row">
            <h2>Featured Category</h2>
            <p>Take a look at the Featured Category. Don’t  find What you looking for ? <a class="text-primary" href="{{ route('all-categories') }}">View All Category</a>
        </div>
        <div class="fcatrow row">
            @if(!empty($featuredCategory)) @foreach($featuredCategory as $fc)
           <x-card.category :category="$fc" />
           @endforeach @endif
        </div>
       
    </div>
</section>
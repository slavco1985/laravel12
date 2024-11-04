<section class="latest-blog container-fluid">
    <div class="container">
        <div class="section-title mb-3 row">
            <h2>News & Tips</h2>
            <p>Check out Latest article from Our Blog. Want to read more? <a class="text-primary" href="{{ route('view-blogs') }}">View All Blogs</a></p>
        </div>
        <div class="blogrow row">
            @if(!empty($latestBlog)) @foreach($latestBlog as $b)
                <x-card.blog-card :blog="$b" />
            @endforeach @endif
        </div>
    </div>
</section>
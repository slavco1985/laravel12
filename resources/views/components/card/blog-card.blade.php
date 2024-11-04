<div class="col-lg-4 col-md-6 blog-col">
    <a href="{{ route('single-blogs', $blog->url) }}">
        <div class="blogcover shadow-sm">
            <div class="blog-img">
                <img src="{{ $blog->resize }}" alt="">
            </div>
            <div class="info">
                <ul>
                    <li><i class="bi bi-folder2-open"></i> {{ $blog->category->name }}</li>
                    <li class="ms-4"><i class="bi bi-calendar2-minus"></i> {{\Carbon\Carbon::parse($blog->created_at)->format('D M Y')}}</li>
                </ul>
            </div>
            <div class="detail">
                <h2>{{ $blog->title }}</h2>
            </div>
        </div>
    </a>
</div>
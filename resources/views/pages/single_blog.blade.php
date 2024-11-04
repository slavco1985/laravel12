<x-home-layout :title="$blog->title" :description="$blog->description" :meta="''" :image="$blog->resize">
    <x-common.breadcrumb :title="$blog->title" :path="'Blogs'"  :pathUrl="route('view-blogs')" />
    <div class="container-fluid latest-blog">
        <div class="container">
            <div class="row blogrow">
                <div class="row">
                    <div class="col-md-9">
                        <div class="blogimg mb-3">
                            <img src="{{ $blog->img }}" alt="">
                        </div>
                        {!! $content !!}
                    </div>
                    <div class="col-md-3 px-3">
                        <h6>Blog by Category</h6>
                        <ul>
                            @if(!empty($category)) @foreach($category as $cat)
                                <li class="p-1">
                                    <a href="{{ route('blog-by-cat', $cat->url) }}">
                                        {{ $cat->name }} <span class="float-end">({{ $cat->blog->count() }})</span>
                                    </a>
                                </li>
                            @endforeach @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
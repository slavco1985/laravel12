<div class="col-lg-2 col-md-3 col-sm-4 col-6 fcatcol mb-4">
    <a href="{{ route('cat', $category->url) }}">
        <div class="fcat shado-xs text-center">
            <div class="icon mx-auto">
                <img src="{{ $category->icon }}" alt="">
            </div>
            <p class="text-truncate">{{ $category->name }}</p>
        </div>
    </a>
</div>
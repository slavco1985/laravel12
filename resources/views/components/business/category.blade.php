<div class="overview services shadow-sm no-margin ">
    <h2 class="border-bottom">Category</h2>
    <ul class="list-group cateul list-group-flush">

        @if(!empty($cat)) @foreach($cat as $c)
            <li class="list-group-item align-items-center">
                <span>
                    <img src="{{ $c->category->icon }}" alt="">
                </span>
                {{ $c->category->name }}
            </li>
        @endforeach @endif

        
        
    </ul>
</div>
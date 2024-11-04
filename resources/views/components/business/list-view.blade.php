<div class="col-lg-9 col-md-8">
    <div class="sort-control mb-4 row">
        <div class="col-6">
            <p class="pt-2">Showing <b> 1 - 
                                @if($listings->perPage() <= $listings->total())
                                    {{ $listings->perPage() }}  
                                @else 
                                    {{ $listings->total() }}
                                @endif of {{ $listings->total() }} results</b></p> 
        </div>
        <div class="col-6">
            <ul>
                <a href="{{ url($curl) }}?rating={{$rating}}&typ=list&key={{$key}}">
                    <li @if($typ != 'grid') class="border-primary" @endif><i class="bi text-primary bi-list-ul"></i></li>
                </a>
                <a href="{{ url($curl) }}?rating={{$rating}}&typ=grid&key={{$key}}">
                    <li @if($typ == 'grid') class="border-primary" @endif class="ms-2"><i class="bi bi-grid"></i></li>
                </a>
               
            </ul>  
        </div>
    </div>

    
        @if($typ == 'grid')
        <div class="featuredrow listgrid row">
                @if(!empty($listings)) @foreach($listings as $list)
                    <div class="col-md-6 ">
                        <x-card.grid-card :list="$list" :footTyp="'review'" />
                    </div>
                @endforeach @endif
        </div>
        @else
            @if(!empty($listings)) @foreach($listings as $list)
                <x-card.list-card :list="$list" />
            @endforeach @endif
        @endif
   

    <div class="pagination listng-pagination row ">
        <nav>
            {{ $listings->onEachSide(5)->links() }}
        </nav>
    </div>
</div>
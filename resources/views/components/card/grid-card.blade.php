<div  class="featurdlist rounded-sm shado-sm">
    <div class="image-cover">
        <a href="{{ url('view/'.$list->url) }}">
            <img src="{{ $list->resize }}" alt="">
        </a> 
        <div class="cat-cover">
            @if(!empty($list->selected[0]))
                {{ $list->selected[0]->category->name }}
            @endif
        </div>
    </div>
    <div class="detail-cov">
        <a href="{{ url('view/'.$list->url) }}">
            <h4> {{ $list->business_name }}</h4>
                <p class="text-truncate"> {{ $list->description }}</p>
            <ul>
                <li><i class="bi bi-telephone"></i> {{ $list->mobile }}</li>
                <li><i class="bi bi-geo-alt"></i> {{ $list->city->name }}</li>
            </ul>
        </a>
    </div>
    <div class="foot-cover  footuser">
        <ul class="d-flex justify-content-between">
            @if($footTyp == 'user' && $list->user->resize)
                <li class="user">
                    <img src="{{ $list->user->resize }}" class="img-fluid" alt="">
                    <span>{{ $list->user->name }}</span>
                </li>
            @else
            <x-share.review :rating="$list->rating" :count="$list->rcount" />
            @endif
            <li class="save saveuser">
               <x-share.like :id="$list->id" :like="$list->like" />
            </li>
        </ul>
    </div>
</div>




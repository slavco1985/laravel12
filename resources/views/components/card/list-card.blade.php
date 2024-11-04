
    <div class="row shadow-sm list-row border rounded">
            <div class="col-lg-4  pe-0 img-col">
                <a href="{{ route('view', $list->url) }}">
                    <img  class="rounded" src="{{ $list->resize }}" alt="">
                </a>
            </div>
            <div class="col-lg-8 detail-col">
                <a href="{{ route('view', $list->url) }}">
                    <div class="bofy-col">
                        <h2 class="text-truncate">{{ $list->business_name }}
                            
                        @if(!empty($list->user->plan))
                            @if($list->user->plan->package->verification == 'Yes')
                            <i  class="bi verify bi-check2-circle">
                            @endif
                        @endif

                        </i></h2>
                        <p class="text-truncate">{{ $list->description }}</p>
                        <ul class="row ms-1">
                            <li class="col-md-4"><i class="bi bi-telephone"></i> {{ $list->mobile }}</li>
                            <li class="col-md-8"><i class="bi bi-envelope"></i> {{ $list->city->name }}</li>

                        </ul>
                        <ul class="row ms-1">
                            <li class="col-md-4"> <i class="bi bi-map"></i> {{ $list->city->name }}</li>
                            <li class="col-md-8"><p class="text-truncate"><i class="bi bi-geo-alt"></i>{{ $list->address }}</p></li>
                        </ul>
                    </div>
                </a>
            
                <div  class="footcover">
                    <ul>
                         <x-share.review :rating="$list->rating" :count="$list->rcount" />
                        <li class="">
                            <div class="save">
                                <x-share.like :id="$list->id" :like="$list->like" />
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </div>

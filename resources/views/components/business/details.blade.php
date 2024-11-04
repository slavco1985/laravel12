<div class="businesscover shadow-sm ">
    <div class="imagecover text-center p-2">
        <img  src="{{ $list->img }}" alt="">
    </div>
    <div class="business-info">
        <h2>{{ $list->business_name }}</h2>
        <p>{{ $list->description }}</p>
    </div>
    <div class="more-info row">
        <div class="col-lg-5 col-md-12">
            <ul>
                <li><i class="bi bi-telephone"></i> {{ $list->mobile }}</li>
                <li><i class="bi bi-envelope"></i> {{ $list->email }}</li>
                <li><a href="{{ $list->website }}"><i class="bi bi-globe"></i> {{ $list->website }}</a></li>
            </ul>
        </div>
        <div class="col-lg-7 col-md-12">
            <ul>
                <li> <i class="bi bi-map"></i> {{ $list->city->name }}</li>
                <li class="text-truncate"><i class="bi bi-geo-alt"></i>  {{ $list->address }}</li>
                <li><i class="bi bi-whatsapp"></i> {{ $list->whatsapp }}</li>
            </ul>
        </div>
       
       
    </div>
    <div class="footcover">
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

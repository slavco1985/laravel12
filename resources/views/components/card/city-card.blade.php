<div class="col-lg-3 col-md-4 col-sm-6 citycol">
    <a href="">
        <div class="citycover">
            <a href="{{ url('filter-by-city/'.$city->url) }}">
                <div class="row g-0">
                    <div class="col-md-4 col-4">
                    <img src="{{$city->image}}" class="img-fluid rounded" alt="{{ $city->name }}">
                    </div>
                    <div class="col-md-8 col-8 my-auto ps-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $city->name }}</h5>
                        <p class="card-text">{{ $city->listings->count() }} listings</p>
                    </div>
                    </div>
                </div>
            </a>
        </div>
    </a>
</div>
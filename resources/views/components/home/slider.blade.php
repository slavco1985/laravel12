<div class="slider-contaienr container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 searchcol">
                <h1>What you are Looking For</h1>
                <p>Explore  top-rated attractions, activities and more...</p>

                <form action="search_with_cat_loc" method="post">
                    @csrf
                    <div class="search-box-card no-margin row">
                        <div class="col-md-3 no-padding">
                            <select name="location" id="" class="form-control selcmk">
                                <option value="">Select Location</option>
                                @if(!empty($locations)) @foreach($locations as $loc)
                                    <option value="{{ $loc->id }}" @if($loc->id == $location_id) selected @endif >{{ $loc->name }}</option>
                                @endforeach @endif
                            </select>
                        </div>
                        <div class="col-md-3 no-padding">
                            <select name="cat" id="" class="form-control selcmk">
                                <option value="">Select Category</option>
                                @if(!empty($category)) @foreach($category as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach @endif
                            </select>
                        </div>
                        <div class="col-md-6 no-padding">
                            <div class="input-group">
                                <input type="text" class="form-control" name="key" placeholder="Search Shops, Services, etc..." aria-label="Search Shops, Services, etc..." aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="input-group-text btn-primary" id="basic-addon2"><i class="fas fa-search"></i> Search</button>
                                </div>
                                </div>
                        </div>
                    </div>
                </form>

                <ul>
                    <li> Popular : </li>
                    @if(!empty($category)) @foreach($category as $cat)
                        @if($loop->index <= 4)
                            <li><a href="{{ route('cat', $cat->url) }}">{{ $cat->name }}</a></li>
                        @endif
                    @endforeach @endif
                </ul>
            </div>
            <div class="col-lg-5 d-none d-lg-block img-col">
                <img src="{{ asset('assets/images/banner.png') }}" alt="">
            </div>
        </div>
       
    </div>
</div>
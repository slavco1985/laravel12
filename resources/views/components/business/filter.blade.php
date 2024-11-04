<div class="col-lg-3 col-md-4 filtercover">
    <div class="filter-col shadow-sm">
        <div  class="category-filterr">
            <div x-data="{cfilter}" class="filter-head">
                 <h2>Filter by Categories <i @click="filterCat()" class="bi cp float-end bi-funnel"></i></h2>
            </div>
           <div id="cfilter" class="filter-body">
                <ul x-data="{url: '{{ url('/') }}' }">
                    @if(!empty($category)) @foreach($category as $c)
                    <li class="cp">
                        <a href="{{ url('cat/'.$c->url.'?rating='.$rating.'&typ='.$typ.'&key='.$key) }}">
                             <input @if($cat == $c->id) checked @endif @click="catFilterClick(url, '{{$c->url}}', {{$rating}}, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="filtercat" id="filtercat"> {{ $c->name }}
                        </a> 
                    </li>  
                    @endforeach @endif                  
                </ul>
           </div>
             <div  x-data="{clocation}" class="filter-head border-top border-bottom">
                 <h2>Filter by Ratings <i @click="filterRating()" class="bi cp float-end bi-funnel"></i></h2>
            </div>
            <div id="clocation" x-data="{url: '{{ URL::current() }}' }" class="filter-body">
                <ul class="rev">
                <li>
                        <input checked  @click="ratingFilterClick(url, 0, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="rating" id="rating">
                       All Ratings
                    </li>
                    <li><input @if($rating == '5') checked @endif; @click="ratingFilterClick(url, 5, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="rating" id="rating">
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                    </li>
                    <li>
                        <input @if($rating == '4') checked @endif; @click="ratingFilterClick(url, 4, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="rating" id="rating">
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                    </li>
                    <li>
                        <input @if($rating == '3') checked @endif; @click="ratingFilterClick(url, 3, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="rating" id="rating">
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                    </li>
                    <li>
                        <input @if($rating == '2') checked @endif; @click="ratingFilterClick(url, 2, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="rating" id="rating">
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                    </li>
                    <li>
                        <input @if($rating == '1') checked @endif; @click="ratingFilterClick(url, 1, '{{$typ}}', '{{$key}}')" class="form-check-input" type="radio" name="rating" id="rating">
                        <i class="bi act bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                        <i class="bi  bi-star-fill"></i>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>


@pushOnce('scripts')

<script>
    function ratingFilterClick(url, rat, typ, key) {
        window.location.href=url+"?rating="+rat+"&typ="+typ+"&key="+key;
    }

    function catFilterClick(url, cat, rat, typ, key){

        if(rat !== undefined){
            window.location.href=url+"/cat/"+cat+"?rating="+rat+"&typ="+typ+"&key="+key;
        }else{
            window.location.href=url+"/cat/"+cat+"?rating=0"+"&typ="+typ+"&key="+key;;
        }
        
    }

    function filterCat(){
        var x = document.getElementById("cfilter");
        if (x.style.display === "flex") {
            x.style.display = "none";
        }else {
            x.style.display = "flex";
        }
        
    }

    function filterRating(){
        var x = document.getElementById("clocation");
        if (x.style.display === "") {
            x.style.display = "flex";
        }else if (x.style.display === "none") {
            x.style.display = "flex";
        } else {
            x.style.display = "none";
        }
    }
</script>

@endPushOnce
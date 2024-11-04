<div x-data="gallery" class="overview products shadow-sm no-margin ">
    <h2 class="border-bottom">Gallery</h2>
    <div x-show="gallery.lengt < 1" class="servrow row no-margin">
        @if(!empty($gallery)) @foreach($gallery as $g)
        <div class="col-md-3 p-2">
            <img src="{{ $g->image }}" alt="">
        </div>
        @endforeach @endif
    </div>

    <div id="my-gallery"  class="servrow row no-margin">
        <template x-for="g in gallery" >  
            <a :href="g.image" target="_blank" class="col-md-3 mb-3">
                <img :src="g.image" alt="">
            </a>
        </template>
    </div>
    @if(sizeof($gallery) >= 6)
    <button x-show="showMore" @click="loadMoreProducts" id="rivmore" type="button" class="btn morefont w-100 mt-2 btn-outline-primary">Show More Products</button>
    @endif
</div>



@pushOnce('scripts')

    <script>
         document.addEventListener('alpine:init', () => {
            Alpine.data('gallery', () => ({
                gallery: [],
                lid : {{$bid}},
                ofset : 1,
                showMore : true,
                init() {
                axios.get(`./../getMoreGallery/${this.lid}/0`).then((e)=>{
                    this.gallery = e.data;
                    })
                },
                loadMoreProducts() {
                    this.showMore = false;
                    axios.get(`./../getMoreGallery/${this.lid}/${this.ofset}`).then((e)=>{
                        Array.prototype.push.apply(this.gallery,e.data); 
                        this.ofset ++;
                        if(e.data.length < 6){
                           this.showMore = false;
                        }else{
                            this.showMore = true;
                        }
                    })  
                },
            }))
        })
    </script>
   
@endPushOnce
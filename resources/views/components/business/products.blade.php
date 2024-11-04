<div x-data="products" class="overview products shadow-sm no-margin ">
    <h2 class="border-bottom">Our Products</h2>
    <div class="servrow row no-margin">


        @if(!empty($products)) @foreach($products as $product)

        <div class="col-lg-4 col-md-6 productcol">
            <div class="row no-margin">
                <div class="col-4 pimg">
                    <img src="{{ $product->image }}" alt="">
                </div>
                <div class="col-8 pdet">
                    <h6 class="text-truncate">{{ $product->name }}</h6>
                    <b>{{currency()}}{{ $product->price }}</b>
                </div>
            </div>
        </div>

         @endforeach @endif
        
         <template x-for="p in products" >   
            <div class="col-lg-4 col-md-6 productcol">
                <div class="row no-margin">
                    <div class="col-4 pimg">
                        <img :src="p.image" alt="">
                    </div>
                    <div class="col-8 pdet">
                        <h6 class="text-truncate" x-text="p.name"></h6>
                        <b>{{currency()}} <span x-text="p.price"></span></b>
                    </div>
                </div>
            </div>
        </template>
        
    </div>
    @if(sizeof($products) >= 6)
    <button x-show="showMore" @click="loadMoreProducts" id="rivmore" type="button" class="btn morefont w-100 mt-2 btn-outline-primary">Show More Products</button>
    @endif
</div>


@pushOnce('scripts')

    <script>
         document.addEventListener('alpine:init', () => {
            Alpine.data('products', () => ({
                products: [],
                bid : {{$bid}},
                ofset : 1,
                showMore : true,
                loadMoreProducts() {
                    this.showMore = false;
                    axios.get(`./../getMoreProducts/${this.bid}/${this.ofset}`).then((e)=>{
                        Array.prototype.push.apply(this.products,e.data); 
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
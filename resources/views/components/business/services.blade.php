<div x-data="dropdown, {service:[], bid: {{$bid}} }" class="overview services shadow-sm no-margin ">
    <h2 class="border-bottom">Our Services</h2>
    <div class="servrow row no-margin">

    @if(!empty($services)) @foreach($services as $serv)
        <div class="col-md-4 servcov">
            <h6 class="text-truncate"><i class="bi bi-arrow-right-short"></i> {{ $serv->name }}</h6>
        </div>
    @endforeach @endif
    <template x-for="s in services" >   
        <div class="col-md-4 servcov">
            <h6 class="text-truncate"><i class="bi bi-arrow-right-short"></i> <span x-text="s.name"></span></h6>
        </div>
    </template>

    </div>
    @if(sizeof($services) >= 6)
    <div class="div m-1 pb-1">
        <button x-show="showMore" @click="loadMoreServices" id="rivmore" type="button" class="btn morefont w-100 btn-outline-primary">Show More Services</button>
    </div>
        
    @endif
</div>

@pushOnce('scripts')

    <script>
         document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                services: [],
                bid : {{$bid}},
                ofset : 1,
                showMore : true,
                loadMoreServices() {
                    this.showMore = false;
                    axios.get(`./../getMoreServices/${this.bid}/${this.ofset}`).then((e)=>{
                        Array.prototype.push.apply(this.services,e.data); 
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
<section x-data="review">
    <div  id="revbox" class="review-box overview shadow-sm ">
        <h2 class="border-bottom">Reviews</h2>

        <div x-show="reviews.lengt < 1">
            @if(!empty($review)) @foreach($review as $rev)
            <div class="row reviewrow">
                <div class="col-md-2 col-3 ">
                    <img class="rounded-circle border border-1 p-2" src="{{ $rev->user->resize }}" alt="">
                </div>
                <div class="col-md-10 align-items-center col-9 rcolm"> 
                    <div class="review">
                        <i class="bi @if($rev->rating >= 1) act @endif act bi-star-fill"></i>
                        <i class="bi @if($rev->rating >= 2) act @endif bi-star-fill"></i>
                        <i class="bi @if($rev->rating >= 3) act @endif bi-star-fill"></i>
                        <i class="bi @if($rev->rating >= 4) act @endif bi-star-fill"></i>
                        <i class="bi @if($rev->rating >= 5) act @endif  bi-star-fill"></i>
                    </div>
                    <h3>{{ $rev->user->name }}</h3>
                    <small> {{ \Carbon\Carbon::parse($rev->created_at)->format('d M Y') }} </small>
                    <div class="review-text">
                        {{ $rev->message }} 
                    </div>
                </div>
            </div>
            @endforeach @endif
        </div>
        

        <template x-for="(r, i) in reviews" >   
            <div class="row reviewrow">
                <div class="col-md-2 col-3 center">
                    <img class="rounded-circle border border-1 p-2" :src="r.user.resize" alt="">
                </div>
                <div class="col-md-10 col-9 align-content-center rcolm"> 
                    <div class="review">
                        <i class="bi bi-star-fill" :class="{ 'act': r.rating >= 1 }"></i>
                        <i class="bi bi-star-fill" :class="{ 'act': r.rating >= 2 }"></i>
                        <i class="bi bi-star-fill" :class="{ 'act': r.rating >= 3 }"></i>
                        <i class="bi bi-star-fill" :class="{ 'act': r.rating >= 4 }"></i>
                        <i class="bi bi-star-fill" :class="{ 'act': r.rating >= 5 }"></i>
                    </div>
                    <h3 x-text="r.user.name"></h3>
                    <small x-text="r.dat">  </small>
                    <div  class="review-text">
                        <span x-show="edit != i" x-text="r.message"></span>
                        <textarea x-show="edit == i" name="" x-model="r.message" class="form-control" id="" cols="30" rows="3"></textarea>
                        
                        <ul x-show="r.user.id == {{$uid}}" class="actionreview">
                            <a data-bs-toggle="modal" data-bs-target="#removeRat" @click="removeRating(i)">
                                <li><i class="bi bi-trash"></i> Delete</li>
                            </a>
                            <li x-show="edit != i" @click="editReview(i)"><i class="bi bi-pencil-square"></i> Edit</li>
                            <li x-show="edit == i" @click="updateReview(i)"><i class="bi bi-check2-square"></i> Save</li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </template>


        @if(sizeof($review) >= 3)
            <div class="div m-1 pb-1">
                <button x-show="showMore" id="rivmore" @click="lodeMoreReview" type="button" class="btn morefont w-100 btn-outline-primary">Show More Reviews</button>
            </div>
        @endif

    </div>

    <div class="add-review overview shadow-sm">
        <h2 class="border-bottom">Add Review</h2>

        <div x-show="success" class="succmsg p-3 pb-0">
            <div class="alert alert-success mb-0" role="alert">
                Review Posted Sucessfully
            </div>
        </div>
       
        <div class="row p-3">
            <div class="col-md-12 add-reviwcol">
                <li class="rev mb-3"> 
                    <label>Select Rating <span>:</span> </label>
                    <i @click="addStar(1)" class="bi bi-star-fill" :class="{ 'act': star >= 1 }"></i>
                    <i @click="addStar(2)" class="bi bi-star-fill" :class="{ 'act': star >= 2 }"></i>
                    <i @click="addStar(3)" class="bi bi-star-fill" :class="{ 'act': star >= 3 }"></i>
                    <i @click="addStar(4)" class="bi bi-star-fill" :class="{ 'act': star >= 4 }"></i>
                    <i @click="addStar(5)" class="bi bi-star-fill" :class="{ 'act': star >= 5 }"></i>
                </li>

            <form  @submit.prevent="postReview"  action="">
                <div class="col-md-12">
                    <textarea x-model="message" :class="{ 'inerror':  error.message !== undefined }" placeholder="Enter Your Message" class="form-control mb-1" name="" id="" cols="30" rows="5"></textarea>
                    <div x-show="error.message != undefined" class="smart-valid" x-text="error.message"></div>
                </div>
                <div class="col-md-12 mt-3 text-end">
                    @auth
                        <button x-show="process" disabled class="btn btn-primary">Submit Your Review</button>
                        <button x-show="!process" class="btn btn-primary">Submit Your Review</button>
                    @endauth

                    @guest
                        <a data-bs-toggle="modal" data-bs-target="#loginAlert" href="#">
                            <button  class="btn btn-primary">Submit Your Review</button>
                        </a>
                    @endguest
                </div>
            </form>
            

        </div>
        
    </div>

            <!-- Modal -->
    <div class="modal fade" id="removeRat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure Want to Delete ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button @click="confirmRemove" type="button" class="btn btn-danger" data-bs-dismiss="modal">Yes Delete</button>
            </div>
            </div>
        </div>
    </div>

</section>


@pushOnce('scripts')

<script>
         document.addEventListener('alpine:init', () => {
            Alpine.data('review', () => ({
              message : '',
              star : 3,
              lid : {{$bid}},
              error : [],
              reviews : [],
              process:false,
              success:false,
              ofset : 1,
              showMore : true,
              removeId : 0,
              edit:-1,
              init() {
                axios.get(`./../getMoreReviews/${this.lid}/0`).then((e)=>{
                    this.reviews = e.data;
                })
              },
              addStar(s){
                this.star = s
              },
              setProcess(){
                this.process = false;
              },
              removeRating(id){
                 this.removeId = id;
              },
              confirmRemove(){
                  var rid = this.reviews[this.removeId].id;
                axios.delete(`./../deleterating/${rid}`).then(()=>{
                    this.reviews.splice(this.removeId, 1);
                })
              },
              editReview(i){
                this.edit = i;
              },
              updateReview(i){
                    axios.put('./../updaterating/'+this.reviews[i].id, this.reviews[i]).then((e)=>{
                        this.edit = -1;
                    })
              },
              postReview(){
                    this.process = true;
                    axios.post('./../rating',{message:this.message,star:this.star,lid:this.lid}).then((e)=>{
                        this.process = false;
                        if(e.data.error !== undefined){
                            this.error = e.data.error;
                        }else{
                            this.ofset = 0;
                            this.lodeReview();
                            this.addStar(4);
                            this.message = '';
                            this.error = [];
                            this.success = true;
                        }
                       
                    })
              },
              lodeMoreReview(){
                    this.showMore = true;
                    axios.get(`./../getMoreReviews/${this.lid}/${this.ofset}`).then((e)=>{
                        Array.prototype.push.apply(this.reviews,e.data); 
                        this.ofset ++;
                        if(e.data.length < 3){
                           this.showMore = false;
                        }else{
                            this.showMore = true;
                        }
                    })  
              },
              lodeReview(){
                 axios.get(`./../getMoreReviews/${this.lid}/${this.ofset}`).then((e)=>{
                    this.reviews = e.data;
                 })
              }
            }))
        })
    </script>

@endPushOnce
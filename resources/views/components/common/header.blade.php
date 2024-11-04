<header>
         <div class="container head-container">
            <div class="row">
               <div  class="col-lg-3 col-md-4 logo">
                 <a href="{{ url('/') }}" class="cp">
                    @if(!empty($logo))
                        <img src="{{ $logo }}" alt="">
                    @else
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    @endif
                  </a> 
                  <a class="d-md-none small-menu" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="bi bi-list"></i>
                  </a>

                  <x-common.mobile-menu/>

               </div>
               
               <div  class="col-lg-5 d-none d-lg-block col-md-8 search">
                  <div class="search-row row no-margin">
                     <div x-data="" class="col-md-4 no-padding">
                        <form id="location" action="{{ route('set-location') }}" method="post">
                        @csrf
                           <select @change="handleChange" onchange="change_city()" required name="location" id="bb" class="form-control rounded-start">
                              <option value="">All Cities</option>
                              @if(!empty($locations)) @foreach($locations as $loc)
                                 <option value="{{ $loc->id }}" @if($loc->id == $location_id) selected @endif >{{ $loc->name }}</option>
                              @endforeach @endif
                           </select>
                        </form>   
                     </div>
                     <form class="display-contents" action="{{ url('search_listings') }}" method="post">
                     @csrf
                        <div class="col-md-7 no-padding">
                           <input type="text" name="key" value="{{ $search }}" required placeholder="Search Business" class="form-control ">
                        </div>
                        <div class="col-md-1  no-padding">
                           <button type="submit" class="btn rounded-end btn-primary"><i class="bi bi-search"></i></button>
                        </div>
                     </form>
                  </div>
               </div>

               @if (Auth::check())
                  <div class="col-lg-4 col-md-8 slink  d-none d-md-block  login-options right">
                     <div class="dropdown">
                        <a class=" dropdown-toggle" href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img src="{{ Auth::user()->resize }}" alt="">
                        <span class="d-none d-lg-block">{{Auth::user()->name}}</span> 
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                           <a class="dropdown-item" href="{{ route('user-dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
                           <a class="dropdown-item" href="{{ route('user-settings') }}"><i class="bi bi-gear"></i> Settings</a>
                           <a class="dropdown-item" href="{{ route('listing.create') }}"><i class="bi bi-plus-square"></i> New Listing</a>
                           <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" href="" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                   <i class="bi bi-box-arrow-in-left"></i> Logout
                                </a>
                            </form>
                        </div>
                     </div>
                  </div>
               @else
                  <div class="col-lg-4 col-md-8 slink  d-none d-md-block  right">
                     <ul class="float-end">
                        <li class="me-3"><a href="{{ route('listing.create') }}"><button type="button" class="btn btn-outline-primary">Add Business</button></a></li>
                        <li ><a href="{{ route('login') }}"><button class="btn btn-primary ">Log In / Sign Up</button></a></li>
                     </ul>
                  </div>
               @endif
            </div>
         </div>
      </header>


@pushOnce('scripts')
   <script>
         function handleChange(){
            document.getElementById("location").submit();
         }
   </script>
@endPushOnce

      
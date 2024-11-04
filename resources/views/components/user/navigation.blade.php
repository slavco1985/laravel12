<div class="side-card">
    <div class="row user-prof">
        <div class="image col-3">
            <img src="assets/images/user/member-02.jpg" alt="">
        </div>
        <div class="col-9 detail">
        <h6>James Antony</h6>
        <p>Status <span>Online</span></p>
        </div>
    </div>
    <div class="row user-menu">
        <ul class="no-padding">
        <li><a href="user_dashboard.html"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li><a href="profile_settings.html"><i class="bi bi-person"></i> Profile Settings</a></li>
        <li class="act"><a href="my_ads.html"><i class="bi bi-list-stars"></i> My Listings</a></li>
        <li><a href="post_add.html"><i class="bi bi-plus-square"></i> New Listing</a></li>
        <li><a href="favourite_posts.html"><i class="bi bi-heart"></i> Bookmarks</a></li>
        <li><a href="messages.html"><i class="bi bi-credit-card-2-front"></i> Active Plan</a></li>
        <li><a href="payments.html"><i class="bi bi-credit-card-2-back"></i> Payments</a></li>
      
        <li><a href="settings.html"><i class="bi bi-gear"></i> Account Settings</a></li>
        <li>
    
        <form method="POST" action="{{ route('logout') }}">
        <i class="bi bi-box-arrow-left"></i>
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
    </li>
        </ul>
    </div>
    </div>

    <div class="ad-slot mt-3">
        <img src="assets/images/ad.jpg" alt="">
    </div>
</div
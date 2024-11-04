<div class="bycard shadow-sm overview d-none mb-4">
    <h2 class="border-bottom">Posted By</h2>
    <div class="usercover">
        <img src="{{ $user->resize }}" alt="">

        <h4>{{ $user->name }}</h4>
        <p>Member Since {{\Carbon\Carbon::parse($user->created_at)->format('M Y')}}</p>
    </div>
</div>

@if($user->role == 'admin')
    <form action="{{ route('claim.request') }}" method="post">
        @csrf
        <input type="hidden" name="business_id" value="{{ $business_id }}" >
        <button class="btn w-100 fw-bold btn-primary">Claim Business</button>
    </form>
    
@endif
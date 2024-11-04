<x-home-layout>
    <x-common.breadcrumb :title="'Add Payment'" :path="'Choos Package'"  :pathUrl="url('choos-package')" />
    <div class="container-fluid featured-category">
        <div class="container">
            <div class="row fcatrow auth-container pt-5 pb-5">
                <div class="col-lg-6 col-md-10 mx-auto shadow authcard">

                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        {{ \Session::forget('error') }}
                    @endif
                    @if(\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        {{ \Session::forget('success') }}
                    @endif
                    
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Name</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                           <label for="">{{ $pack->name }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Price</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <label for="">{{currency()}}{{ $pack->price }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Validity</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                             <label for="">{{ $pack->validity }} Months</label> 
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-4">
                           
                        </div>
                        <div class="col-md-8">
                            @forelse($paymentGateway as $pg)
                                @if($pg->slug == 'razorpay')
                                    <button class="btn btn-primary p-1 px-3 ms-2">
                                        <form action="{{ route('razorpay/payment') }}" method="POST" >
                                            @csrf
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                                    data-key="{{ $pg->key }}"
                                                    data-amount="{{ $pack->price * 100 }}"
                                                    data-buttontext="Pay with Razorpay"
                                                    data-name="{{ $siteinfo->title }}"
                                                    data-description="{{ $siteinfo->description }}"
                                                    data-image="{{ $fav }}"
                                                    data-prefill.name="name"
                                                    data-prefill.email="email"
                                                    data-theme.class="btn"
                                                    data-theme.color="#263da6">
                                            </script>
                                            <input type="hidden" name="pid" value="{{ $pack->id }}">
                                            <input type="hidden" name="uid" value="{{ $uid }}">
                                            <input type="hidden" name="amount" value="{{ $pack->price }}">
                                        </form>
                                    </button>
                                @else
                                    <a href="{{ route($pg->slug) }}">
                                        <button class="btn btn-primary">Pay with {{ $pg->name }}</button>   
                                    </a>
                                @endif
                            @empty
                                 
                            @endforelse
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
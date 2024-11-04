<x-home-layout>
    <x-common.breadcrumb :title="'Add Payment'" :path="'Choos Package'"  :pathUrl="url('choos-package')" />
    <div class="container-fluid featured-category">
        <div class="container">
            <div class="row fcatrow auth-container pt-5 pb-5">
                <div class="col-lg-6 col-md-10 mx-auto shadow authcard">

                
                    <div class="alert alert-success">Paymnt Recieved Sucessfully!</div>
                       
                    
                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Name</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                           <label for="">{{ $transaction->package->name }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Price</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                            <label for="">{{currency()}}{{ $transaction->amount }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Package Validity</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                             <label for="">{{ $transaction->package->validity }} Months</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Status</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                             <label class="text-success for="">Success</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-4">
                            <label for="">Transaction ID</label>
                            <span class="spcol">:</span>
                        </div>
                        <div class="col-md-8">
                             <label for="">{{ $transaction->payment_id }}</label> 
                        </div>
                    </div>

                    <div class="row form-row">
                      
                        <div class="col-md-12 justify-content-around d-flex">
                            <a href="{{ route('listing.create') }}">
                               <button class="btn ps-5 pe-5 btn-primary">Add New Listing   </button> 
                            </a>
                            <a href="{{ route('user-dashboard') }}">
                               <button class="btn ps-5 pe-5 btn-primary">Go to Dashboard </button> 
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
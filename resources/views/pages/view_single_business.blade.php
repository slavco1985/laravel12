<x-home-layout :title="$list->business_name" :description="$list->description" :meta="''" :image="$list->resize">
    <x-common.breadcrumb :title="$list->business_name" :path="'Listings'"  :pathUrl="route('all-listings')" /> 
    <div class="container-fluid single-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <x-business.details :list="$list" />
                    <x-business.overview :bname="$list->business_name" :bid="$list->id" />
                    <x-business.services :bid="$list->id" />
                    <x-business.products :bid="$list->id" />
                    <x-business.gallery :bid="$list->id" />
                    @if($isreview)
                        <x-business.review :bid="$list->id" />
                    @endif
                </div>
                <div class="col-md-4 sidecl">
                    <x-business.postedby :user="$list->user" :bid="$list->id" />
                    <x-business.location :address="$list->address" :bid="$list->id" />
                    <x-business.contact-form :bid="$list->id" :uid="$list->user_id" />
                    <x-business.social-link :bid="$list->id" />
                    <x-business.category :cat="$list->selected" />
                    <x-business.timing :bid="$list->id" />
                   
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
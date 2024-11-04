@php
    $title =''; $description = '';
    if(!empty($key)){
        $title = 'Search results for  '.$key;
    }else{
        if(empty($category)){
            $title = 'View all Listings';
        }else{
            $description = $category->description;
            $title = 'Listings in  '.$category->name;
        }
    }
@endphp

<x-home-layout :title="$title" :description="$description">
    @if(!empty($key))
         <x-common.breadcrumb :title="'Search results for  '.$key" :path="'All Listings'"  :pathUrl="url('all-listings?typ='.$typ)" />
    @else
        @if(empty($category))
            <x-common.breadcrumb :title="'View all Listings'" :path="''"  :pathUrl="''" />
        @else
            <x-common.breadcrumb :title="'Listings in  '.$category->name" :path="'All Listings'"  :pathUrl="url('all-listings?typ='.$typ)" />
        @endif
    @endif
   

    <div class="container-fluid business-listing">
        <div class="container">
            <div class="row">
                <x-business.filter :rating="$rating" :cat="$cat" :typ="$typ" :key="$key" />
                <x-business.list-view :listings="$listings" :typ="$typ" :rating="$rating" :key="$key" />
            </div>
        </div>
    </div>
</x-home-layout>
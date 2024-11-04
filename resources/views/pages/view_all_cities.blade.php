<x-home-layout :title="'View all Cities'">
    <x-common.breadcrumb :title="'View all Cities'" :path="''"  :pathUrl="''" />
    <div class="container-fluid featured-city">
        <div class="container">
            <div class="row cityrow">
                @if($city) @foreach($city as $c)
                    <x-card.city-card :city="$c" />
                @endforeach @endif
            </div>
        </div>
    </div>
</x-home-layout>
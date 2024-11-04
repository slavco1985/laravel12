<x-home-layout :title="'View All Category'">
    <x-common.breadcrumb :title="'View all Category'" :path="''"  :pathUrl="''" />
    <div class="container-fluid featured-category">
        <div class="container">
            <div class="row fcatrow">
                @if($category) @foreach($category as $c)
                    <x-card.category :category="$c" />
                @endforeach @endif
            </div>
        </div>
    </div>
</x-home-layout>
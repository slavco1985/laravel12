<x-home-layout>
    <x-common.breadcrumb :title="$page->title" :path="''"  :pathUrl="''" />
    <div class="container-fluid featured-category">
        <div class="container">
            <div class="row  fcatrow">
                <div class="col-md-10 mx-auto ">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
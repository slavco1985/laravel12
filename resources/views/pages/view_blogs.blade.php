<x-home-layout>
    @if(!empty($typ == 'cat'))
        <x-common.breadcrumb :title="$cat->name" :path="'All Blogs'"  :pathUrl="route('view-blogs')" />
    @else
        <x-common.breadcrumb :title="'View Blogs'" :path="''"  :pathUrl="''" />
    @endif
    <div class="container-fluid latest-blog">
        <div class="container">
            <div class="row blogrow">
                @if(!empty($blogs)) @foreach($blogs as $b)
                    <x-card.blog-card :blog="$b" />
                @endforeach @endif
            </div>
            <div class="pagination listng-pagination row ">
                <nav>
                    {{ $blogs->onEachSide(5)->links() }}
                </nav>
            </div>
        </div>
    </div>
</x-home-layout>
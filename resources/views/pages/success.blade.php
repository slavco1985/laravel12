<x-home-layout>
    <x-common.breadcrumb :title="$title" :path="''"  :pathUrl="''" />
    <div class="container-fluid featured-category">
        <div class="container">
            <div class="row mb-5 mt-5 fcatrow">
                <div class="col-md-6 mx-auto ">
                <div class="card shadow p-4 py-5">
                    <div class="card-body text-center">
                        <i class="bi fs-1 text-success bi-check-circle"></i>
                        <h4 class="mt-3 text-success">{{ $title }}</h4>
                        <p>{{ $message }}</p>  
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-home-layout>
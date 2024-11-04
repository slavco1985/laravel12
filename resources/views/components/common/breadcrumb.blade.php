<div class="breadcrumb contaienr-fluid">
    <div class="container">
        <div class="row">
            <h2>{{ $title }}</h2>
            <ul>
                <li><a href="{{ route('/') }}"><i class="bi bi-house-door"></i> Home</a>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path></svg>
                </li>
                @if(!empty($path))
                <li><a href="{{ $pathUrl }}">{{ $path }}</a>
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M10.061 19.061 17.121 12l-7.06-7.061-2.122 2.122L12.879 12l-4.94 4.939z"></path></svg>
                </li>
                @endif

                <li>{{ $title }} </li>
            </ul>
        </div>
    </div>
   
</div>
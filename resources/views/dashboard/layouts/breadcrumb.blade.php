    <div class="d-md-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $titlePage }}</h5>

        <nav aria-label="breadcrumb" class="d-inline-block mt-2 mt-sm-0">
            <ul class="breadcrumb bg-transparent rounded mb-0 p-0">
                <li class="breadcrumb-item text-capitalize"><a href="{{ route('dashboard.' . $UrlPreviousPage) }}">{{ $PreviousPage }}</a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page">{{ $currentPage }}</li>
            </ul>
        </nav>
    </div>

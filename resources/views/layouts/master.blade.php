<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid page-header">
        <div class="py-5">
            <h2 class="page-title">@yield('pageTitle')</h1>
            <p class="page-subtitle">@yield('pageSubtitle')</p>
        </div>
    </div>

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-7">
                @yield('main')
            </div>
            <div class="col-md-4 offset-md-1">
                <div class="my-5 shadow rounded">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="input-group p-4">
                            <input name="search" type="text" class="py-3 form-control" placeholder="Search here ..." aria-describedby="search" style="border-color: #85C32D">
                            <button class="btn btn-primary" type="submit" id="search" style="border-color: #85C32D; background: linear-gradient(137.06deg, #97D446 1.96%, #6EAC0D 115.89%);">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.0965 20.1475L28 26.0496L26.0496 28L20.1475 22.0965C17.9514 23.857 15.2199 24.8145 12.4052 24.8105C5.55755 24.8105 0 19.2529 0 12.4052C0 5.55755 5.55755 0 12.4052 0C19.2529 0 24.8105 5.55755 24.8105 12.4052C24.8145 15.2199 23.857 17.9514 22.0965 20.1475ZM19.3315 19.1247C21.0808 17.3258 22.0577 14.9144 22.0538 12.4052C22.0538 7.07374 17.7354 2.75672 12.4052 2.75672C7.07374 2.75672 2.75672 7.07374 2.75672 12.4052C2.75672 17.7354 7.07374 22.0538 12.4052 22.0538C14.9144 22.0577 17.3258 21.0808 19.1247 19.3315L19.3315 19.1247Z"
                                        fill="white" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="my-5 shadow rounded">
                    <div class="p-4">
                        <h3 class="recent-post-heading text-light px-3 py-2 mb-3">Recent Post</h3>
                        @foreach ($recentPosts as $recentPost)
                            <div class="card mb-3 border-0">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('uploads/blogs/'. $recentPost->image) }}" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body py-0 pe-0">
                                            <h5 class="card-title" style="font-weight: 500; font-size: 20px; line-height: 30px; color: #000">{{ $recentPost->title }}</h5>
                                            <p class="card-text align-text-bottom">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.334 2.00033H14.0007C14.1775 2.00033 14.347 2.07056 14.4721 2.19559C14.5971 2.32061 14.6673 2.49018 14.6673 2.66699V13.3337C14.6673 13.5105 14.5971 13.68 14.4721 13.8051C14.347 13.9301 14.1775 14.0003 14.0007 14.0003H2.00065C1.82384 14.0003 1.65427 13.9301 1.52925 13.8051C1.40422 13.68 1.33398 13.5105 1.33398 13.3337V2.66699C1.33398 2.49018 1.40422 2.32061 1.52925 2.19559C1.65427 2.07056 1.82384 2.00033 2.00065 2.00033H4.66732V0.666992H6.00065V2.00033H10.0007V0.666992H11.334V2.00033ZM2.66732 6.00033V12.667H13.334V6.00033H2.66732ZM4.00065 7.33366H5.33398V8.66699H4.00065V7.33366ZM4.00065 10.0003H5.33398V11.3337H4.00065V10.0003ZM6.66732 7.33366H12.0007V8.66699H6.66732V7.33366ZM6.66732 10.0003H10.0007V11.3337H6.66732V10.0003Z" fill="black"/>
                                                </svg>
                                                <small class="text-dark">{{ $recentPost->created_at->format('d M, Y') }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="my-5 shadow rounded">
                    <div class="p-4">
                        <h3 class="recent-post-heading text-light px-3 py-2 mb-3">Categories</h3>
                        <ul class="list-group list-group-flush categories">
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $category->name }}
                                    <span class="badge bg-primary pill" style="background: #252525 !important; font-weight: 400;">{{ count($category->posts) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="my-5 shadow rounded">
                    <div class="p-4">
                        <h3 class="recent-post-heading text-light px-3 py-2 mb-3">Popular Tags</h3>
                        <div class="d-flex">
                            @foreach ($tags as $tag)
                                <span class="p-3 me-4 my-3 rounded" style="background-color: #F0F0F0">{{ $tag->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

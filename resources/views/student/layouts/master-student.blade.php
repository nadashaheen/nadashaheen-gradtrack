<!DOCTYPE html>

@yield('details_js')

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title','Student Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin />
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap') }}"
          rel="stylesheet" />

    @yield('details_style')

</head>

<body>
<div class="dashboard-page-container d-flex">
    @include('student.partials.sidebar-student')

    <div class="content">
        <div class="head bg-white p-20 d-flex align-items-center primary-color">
            <h3 class="text-center p-relative mb-0 fs-sm-20">Welcome,</h3>
            <span class="fs-20 m-lr-5 fs-sm-16">{{\Illuminate\Support\Facades\Auth::user()->name }}</span>
        </div>
        <div class="main-sections">
            @yield('content')
        </div>
    </div>
</div>

@include('student.partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/studentdashboard.js') }}"></script>
</body>
</html>

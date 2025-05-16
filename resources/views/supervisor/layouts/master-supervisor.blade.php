<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title','Supervisor Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="{{ asset('https://fonts.gstatic.com') }}" crossorigin />
    <link href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap') }}"
          rel="stylesheet" />

</head>

<body>

<div class="dashboard-supervisor-dashboard">
    <div class="head bg-white p-20 d-flex align-items-center justify-content-between primary-color">
        <div class="d-flex align-items-center">
            <h3 class="text-center p-relative mb-0 fs-sm-20">Hello,</h3>
            <span class="fs-20 m-lr-5 fs-sm-16">Prof. {{\Illuminate\Support\Facades\Auth::user()->name }}</span>
        </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button style="font-size: 25px" type="submit" class="dropdown-item text-primary">
                    <i  class="fa fa-sign-out"></i>
                </button>
            </form>

    </div>

    <div class="dashboard-supervisor-content">
    @include('supervisor.partials.navbar-supervisor')

    <!-- هون بتحط div عرض المحتوى -->
        <div id="tab-content-area" class="p-3">
                @yield('content')
        </div>
    </div>
</div>
@include('supervisor.partials.footer')

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/studentdashboard.js') }}"></script>
</body>

</html>

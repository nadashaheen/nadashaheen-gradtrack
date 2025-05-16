{{--<form method="POST" action="{{ route('logout') }}" class="d-inline">--}}
{{--    @csrf--}}
{{--    <button type="submit" class="btn btn-outline-danger btn-sm">--}}
{{--        <i class="bi bi-box-arrow-right"></i> تسجيل الخروج--}}
{{--    </button>--}}
{{--</form>--}}
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grad Track</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/all.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/common.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet" />
</head>

<body class="d-flex align-items-center justify-content-center vh-100">
<div class=" auth-card login-card card-authntucation-color ">
    <img src="assets/logo1-1.png" alt="GradTrack Logo" class="mb-15" />
    <h3 class="fs-20 fw-700 mb-20 primary-color fs-sm-18">Welcome to GradTrack</h3>
    <form method="POST" action="{{ route('login') }}">
@csrf
        <div class="input-container d-flex align-items-center mb-15 p-10">
            <i class="fa-solid fa-university primary-color mr-10"></i>

            <input type="text" id="stdNo" name="stdNo" placeholder="university number" />
        </div>
        <p id="university-number-error"></p>

        <div class="input-container d-flex align-items-center mb-15 p-10">
            <i class="fa-solid fa-lock primary-color mr-10"></i>
            <input type="password" id="password" name="password" placeholder="Password" />
            <!-- أيقونة العين -->

        </div>
        <p id="password-error"></p>

        <button type="submit" class="btn-login primary-color p-10 fs-18 white-color">Login</button>


        </p>
    </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/auth.js"></script>
</body>

</html>



{{--<form method="POST" action="{{ route('login.form') }}">--}}
{{--@csrf--}}

{{--<!-- البريد الإلكتروني -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="email">البريد الإلكتروني</label>--}}
{{--        <input type="email" name="email" class="form-control" required autofocus>--}}
{{--    </div>--}}

{{--    <!-- كلمة المرور -->--}}
{{--    <div class="form-group mt-3">--}}
{{--        <label for="password">كلمة المرور</label>--}}
{{--        <input type="password" name="password" class="form-control" required>--}}
{{--    </div>--}}

{{--    <!-- زر تسجيل الدخول -->--}}
{{--    <div class="form-group mt-4">--}}
{{--        <button type="submit" class="btn btn-primary w-100">--}}
{{--            تسجيل الدخول--}}
{{--        </button>--}}
{{--    </div>--}}
{{--</form>--}}


{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Grad Track</title>--}}
{{--    <link rel="stylesheet" href="css/bootstrap.min.css" />--}}
{{--    <link rel="stylesheet" href="css/all.min.css" />--}}
{{--    <link rel="stylesheet" href="css/style.css" />--}}
{{--    <link rel="stylesheet" href="css/common.css" />--}}
{{--    <link rel="preconnect" href="https://fonts.googleapis.com" />--}}
{{--    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet" />--}}
{{--</head>--}}

{{--<body class="d-flex align-items-center justify-content-center vh-100">--}}
{{--<div class=" auth-card login-card card-authntucation-color ">--}}
{{--    <img src="assets/logo1-1.png" alt="GradTrack Logo" class="mb-15" />--}}
{{--    <h3 class="fs-20 fw-700 mb-20 primary-color fs-sm-18">Welcome to GradTrack</h3>--}}
{{--    <form id="loginForm"  method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}


{{--        <div class="input-container d-flex align-items-center mb-15 p-10">--}}
{{--            <i class="fa-solid fa-university primary-color mr-10"></i>--}}

{{--            <label for="email">كلمة المرور</label>--}}
{{--            <input type="email" name="email" class="form-control" id="university-number" name="university-number" placeholder="University Number" required autofocus>--}}

{{--            <input type="text" id="university-number" name="university-number" placeholder="University Number" />--}}
{{--        </div>--}}
{{--        <p id="university-number-error"></p>--}}

{{--        <div class="input-container d-flex align-items-center mb-15 p-10">--}}
{{--            <i class="fa-solid fa-lock primary-color mr-10"></i>--}}
{{--             <label for="password">كلمة المرور</label>--}}
{{--            <input type="password" name="password" class="form-control" placeholder="Password" required>--}}

{{--            <input type="password" id="password" name="password" placeholder="Password" />--}}
{{--            <i id="toggle-password" class="fa-solid fa-eye-slash primary-color ml-10 toggle-password"></i>--}}
{{--            <!-- أيقونة العين -->--}}

{{--        </div>--}}
{{--        <p id="password-error"></p>--}}

{{--        <button type="submit" class="btn-login primary-color p-10 fs-18 white-color">Login</button>--}}

{{--        <p class="sign-up-link mt-10">--}}
{{--            Don't have an account?--}}
{{--            <a href="signup.html" class="primary-color fw-bold ">Sign Up</a>--}}
{{--        <p id="login-error" style=" text-align: center;"></p>--}}

{{--        </p>--}}
{{--    </form>--}}
{{--</div>--}}

{{--<script src="js/bootstrap.bundle.min.js"></script>--}}
{{--<script src="js/auth.js"></script>--}}
{{--</body>--}}

{{--</html>--}}



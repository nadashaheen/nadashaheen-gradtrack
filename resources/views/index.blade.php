<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grad Track</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Google Fonts بدون asset() -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />
</head>

<body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <!-- Logo -->
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('assets/logo1-1.png') }}" alt="GradTrack Logo" class="logo" />
                </a>

                <!-- Toggle button for mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars bar-icon"></i>
                </button>

                <!-- Collapsible menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 d-flex justify-content-between primary-color w-90">
                        <li class="nav-item">
                            <a class="nav-link active fw-400 fs-18" href="#home">Home Page</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-400 fs-18" href="#featured-projects">Featured Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-400 fs-18" href="#about-us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-400 fs-18" href="#opinions">Opinions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-400 fs-18" href="#contact-us">Contact Us</a>
                        </li>
                    </ul>

                    <!-- Login Button -->
                    <a href="{{ route('login.form') }}" class="btn main-btn ms-lg-3 mt-3 mt-lg-0">
                        <i class="fa-solid fa-arrow-right-to-bracket p-l-r-5"></i> LOGIN
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>


<!--start home  -->
<div id="home" class="home-section d-flex align-items-center justify-content-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="white-color">
                        Explore featured projects by <span>GradTrack </span> students
                    </h1>
                    <p class="white-color p-15 fs-18 fs-sm-16">
                        A platform dedicated to following up on students’ graduation
                        projects and promoting their creative ideas.
                    </p>
                    <a href="{{ route('login.form') }}" class="btn main-btn m-10">
                        Start your graduation project
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end home -->

<!-- start featured project -->
<div id="featured-projects" class="featured-project-section p-15 m-10">
    <div class="container">
        <div class="section-title">
            <h3 class="text-center p-15 secoundary-color fw-bold mb-20">
                Featured Projects for our students
            </h3>
        </div>
        <div class="row m-10">
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{ asset('assets/aii.jpeg') }}" class="card-img-top" alt="AI Research Project" />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">AI Research Project</h5>
                        <p class="card-text fs-18 m-10 fs-sm-16">
                            A comprehensive study on AI applications in real-world
                            scenarios.
                        </p>
                        <a href="#" class="view-more-btn">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{ asset('assets/blockchain.jpeg') }}" class="card-img-top" alt="Blockchain Development" />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Blockchain Development</h5>
                        <p class="card-text fs-18 m-10 fs-sm-16">
                            An innovative approach to secure transactions using blockchain
                            technology.
                        </p>
                        <a href="#" class="view-more-btn">View More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="{{ asset('assets/web-development.jpeg') }}" class="card-img-top" alt="Web Development Project" />
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Web Development Project</h5>
                        <p class="card-text fs-18 m-10 fs-sm-16">
                            A modern web application built using the latest technologies.
                        </p>
                        <a href="#" class="view-more-btn">View More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured project -->

<!-- start about -->
<div id="about-us" class="about p-15 m-10">
    <div class="container">
        <div class="section-title">
            <h3 class="text-center p-15 secoundary-color fw-bold mb-20">
                About Us
            </h3>
        </div>
        <div class="row m-10 p-15">
            <div class="col-lg-6 about-container">
                <img src="{{ asset('assets/3.jpg') }}" alt="About GradTrack" class="about-img" />
                <div class="d-flex align-items-center grad-icon-container fs-18">
                    <i class="fa-solid fa-graduation-cap p-l-r-5"></i>
                    <p class="mb-0">GradTrack</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <h3 class="fw-bold p-15">
                        What is <span class="primary-color"> GradTrack</span> ?🤔
                    </h3>
                    <p class="fs-18 fs-sm-16">
                        is a web-based platform that improves the management of
                        graduation projects by enhancing communication and project
                        tracking.
                    </p>
                    <p class="fs-18 fs-sm-16">
                        Initially designed for Al-Aqsa University, it can be adopted by
                        other institutions seeking an efficient graduation project
                        management solution.
                    </p>
                    <ul class="mt-20">
                        <li class="d-flex align-items-center fs-18 fs-sm-16">
                            <span>1</span>
                            Improve communication between students and supervisors.
                        </li>
                        <li class="d-flex align-items-center fs-18 fs-sm-16">
                            <span>2</span>
                            Provide timely updates, and streamline the graduation process.
                        </li>
                        <li class="d-flex align-items-center fs-18 fs-sm-16">
                            <span>3</span>
                            Enable students to monitor stages and submit deliverables on
                            time.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end about -->

<!-- start opinions -->
<div id="opinions" class="opinions p-15 m-10">
    <div class="container">
        <div class="section-title">
            <h3 class="text-center p-15 secoundary-color fw-bold mb-20">
                Opinions of our students
            </h3>
        </div>
        <div class="row p-15 align-items-center justify-content-center">
            <div class="col-lg-3">
                <div class="card">
                    <div
                        class="d-flex align-items-center gap-3 justify-content-center card-header p-15">
                        <i class="fa-solid fa-person"></i>
                        <div>
                            <h5 class="card-title m-0">John Doe</h5>
                            <p class="card-text fs-sm-16">computer science graduate</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-center fs-18 fs-sm-16">
                            " GradTrack was the perfect platform to highlight my
                            Graduation project "
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div
                        class="d-flex align-items-center gap-3 justify-content-center card-header p-15">
                        <i class="fa-solid fa-person-dress grile-icon"></i>
                        <div>
                            <h5 class="card-title m-0">Emily Brown</h5>
                            <p class="card-text fs-sm-16">health sciences graduate</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-center fs-18 fs-sm-16">
                            " Thanks to GradTrack, my idea is now a functional application
                            ready to launch "
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div
                        class="d-flex align-items-center gap-3 justify-content-center card-header p-15">
                        <i class="fa-solid fa-person"></i>
                        <div>
                            <h5 class="card-title m-0">Jane Smith</h5>
                            <p class="card-text fs-sm-16">computer science graduate</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-center fs-18 fs-sm-16">
                            " The support and resources I received here were invaluable
                            for my final project. "
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end opinions -->

<!-- start contact us -->
<div id="contact-us" class="contact-us">
    <div class="container">
        <div
            class="section-title d-flex flex-column align-items-center justify-content-center p-25">
            <h2 class="text-center fw-bold fs-sm-20">
                Are you ready to launch your project?
            </h2>
            <a href="{{ route('login.form') }}" class="btn main-btn m-10">LOGIN NOW</a>
        </div>
    </div>
</div>
<!-- end contact us -->

<!-- start footer -->
<div class="footer">
    <div class="container">
        <div class="row pt-10">
            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                <p>© 2025 GradTrack</p>
                <div class="socail-media">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

</body>

</html>

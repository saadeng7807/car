<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

    <meta charset="UTF-8">
    <title>@yield('title', 'معرض السيارات')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
       @vite(['resources/css/app.css', 'resources/js/app.js'])

      <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

    <!-- Navbar -->
    <header>
     <nav class="navbar navbar-expand-lg navbar-dark sticky-top custom-header">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <span class="fw-bold fs-3 tracking-tighter">VELOCITY<span class="text-danger">MOTORS</span></span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active px-3" href="#">الرئيسية</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="carsDropdown" role="button" data-bs-toggle="dropdown">
                        أنواع السيارات
                    </a>
                    <ul class="dropdown-menu shadow-lg border-0 animate slideIn text-white">
                        <li><a class="dropdown-item" href="#">سيارات رياضية</a></li>
                        <li><a class="dropdown-item" href="#">سيارات عائلية SUV</a></li>
                        <li><a class="dropdown-item" href="#">كهربائية بالكامل</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#">العروض</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3" href="#">خدمات الصيانة</a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">
                <a href="tel:+123456" class="text-light d-none d-xl-block text-decoration-none fw-bold">
                    <i class="bi bi-headset"></i> 92000XXXX
                </a>
                <button class="btn btn-danger btn-rounded-pill px-4 py-2 shadow-sm fw-bold">
                    احجز تجربة قيادة
                </button>
            </div>
        </div>
    </div>
</nav>
    </header>

    <!-- Content -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-4 pb-3 mt-5">
        <div class="container text-center">
            <p>© 2026 جميع الحقوق محفوظة | معرض السيارات</p>

            <div>
                <a href="#" class="text-light mx-2"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-light mx-2"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-light mx-2"><i class="bi bi-twitter"></i></a>
            </div>
        </div>
    </footer>

    <!-- JS -->
   
</body>
</html>
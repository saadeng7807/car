<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>لوحة تحكم | معرض السيارات</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            overflow-x: hidden;
            background-color: #f8f9fa;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            transition: all 0.3s;
            z-index: 1000;
        }
        .list-group-item {
            border: none;
            padding: 12px 20px;
            transition: 0.3s;
        }
        .list-group-item:hover {
            background-color: rgba(13, 110, 253, 0.1) !important;
            color: #0d6efd !important;
        }
        .nav-link.dropdown-toggle::after {
            display: none;
        }
        /* لتنسيق المحتوى الرئيسي */
        #page-content-wrapper {
            flex: 1;
            min-width: 0;
        }
    </style>
</head>
<body>

    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <button class="btn btn-outline-light me-2" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
                <a class="navbar-brand fw-bold ms-3" href="#">إدارة <span class="text-primary">المنصة</span></a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex me-auto my-2 my-lg-0">
                        <div class="input-group">
                            <input class="form-control bg-secondary text-white border-0" type="search" placeholder="بحث سريع..." aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </form>

                    <ul class="navbar-nav ms-3 align-items-center">
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link position-relative" href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-bell fs-5"></i>
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3+</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start shadow border-0">
                                <li><a class="dropdown-item" href="#">طلب إضافة سيارة جديد</a></li>
                                <li><a class="dropdown-item" href="#">تنبيه بنقص المخزون</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-center" href="#">عرض كل التنبيهات</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                <span class="ms-2 d-none d-lg-inline text-white-50 small">أحمد محمد</span>
                                <img class="rounded-circle border border-secondary" src="https://via.placeholder.com/35" alt="User" width="35" height="35">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start shadow border-0">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i> الملف الشخصي</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> الإعدادات</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> تسجيل الخروج</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="d-flex">
        <div class="bg-dark text-white border-end shadow" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom p-4 fs-5 fw-bold text-primary">
                لوحة التحكم
            </div>
            
            <div class="list-group list-group-flush pr-0">
                <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white border-0">
                    <i class="bi bi-speedometer2 ms-2"></i> الإحصائيات
                </a>

                 <a href="{{ route('dashboard.brand') }}" class="list-group-item list-group-item-action bg-dark text-white border-0">
                  <i class="bi bi-chevron-down small"></i>  الفئات
                </a>
               
                  <a href="{{ route('dashboard.cars') }}" class="list-group-item list-group-item-action bg-dark text-white border-0">
                  <i class="bi bi-chevron-down small"></i>  السيارات
                </a>
               
               
                <div class="collapse ps-3 bg-black bg-opacity-25" id="carMenu">
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-white-50 border-0 py-2">قائمة السيارات</a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-white-50 border-0 py-2">إضافة سيارة جديدة</a>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent text-white-50 border-0 py-2">تقارير المبيعات</a>
                </div>

                <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0">
                    <i class="bi bi-people ms-2"></i> العملاء
                </a>
                
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white border-0 mt-auto">
                    <i class="bi bi-gear ms-2"></i> إعدادات النظام
                </a>
            </div>
        </div>

        <div id="page-content-wrapper" class="p-4">
            <div class="container-fluid">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                        <li class="breadcrumb-item active text-primary" aria-current="page">نظرة عامة</li>
                    </ol>
                </nav>

                <div class="card border-0 shadow-sm p-4 mt-4">
                    @yield('content')
                   
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-white border-top mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">© 2026 جميع الحقوق محفوظة لشركة Velocity Motors.</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.getElementById('sidebar-wrapper').classList.toggle('d-none');
            });
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'الوزارات المصرية')</title>

    <!-- إضافة ملفات Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
            margin-top: 0;
        }

        .navbar-brand img {
            height: 50px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="navbar-brand">
                    <a class="d-flex align-items-center text-decoration-none text-white" href="{{route('home')}}">
                        <img src="{{ asset('storage/images/download.png') }}" alt="" style="width: 100px; height: auto;">
                        <span class="me-2">الوزارات المصرية</span>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('home')}}">الرئيسية</a>
                        </li>

                        <!-- وزارة الداخلية -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#">وزارة الداخلية</a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                <li><a class="dropdown-item" href=""> قطاع الامن العام </a></li>
                                <li><a class="dropdown-item" href="{{route('cert')}}    ">قطاع الاحوال المدنيه </a></li>
                                <li><a class="dropdown-item" href="#">الاداره العامه للجوازات والهجره </a></li>
                                <li><a class="dropdown-item" href="#"> الاداره العامه  لنظم المعلومات واجهزه المرور   </a></li>
                            </ul>
                        </li>

                        <!-- وزارة التعليم -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#">وزارة التعليم</a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                <li><a class="dropdown-item" href="#">المدارس</a></li>
                                <li><a class="dropdown-item" href="#">الجامعات</a></li>
                                <li><a class="dropdown-item" href="#">النتائج</a></li>
                            </ul>
                        </li>

                        <!-- وزارة الصحة -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#">وزارة الصحة</a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                <li><a class="dropdown-item" href="#">حجز موعد</a></li>
                                <li><a class="dropdown-item" href="#">دليل المستشفيات</a></li>
                            </ul>
                        </li>

                        @guest
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('register')}}">تسجيل جديد</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{route('login')}}">تسجيل دخول</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active text-decoration-underline">{{ ucwords(Auth::user()->name) }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-danger-emphasis" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fs-5 text-dark" aria-hidden="true"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mb-4">
        @yield('content')
    </div>
    {{-- <div style="height: 50px; background: #fff;"></div> --}}

    {{-- <footer class="bg-primary text-white text-center py-3 mt-auto shadow" style="position: sticky; bottom: 0; left: 0; width: 100%; z-index: 1030;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
            <span>&copy; {{ date('Y') }} البوابة الإلكترونية للوزارات المصرية. جميع الحقوق محفوظة.</span>
        </div>
    </footer> --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
@yield('scripts')

</html>

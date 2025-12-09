<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'الوزارات المصرية'); ?></title>

    <!-- إضافة ملفات Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/all.min.css')); ?>">

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
                    <a class="d-flex align-items-center text-decoration-none text-white" href="<?php echo e(route('home')); ?>">
                        <img src="<?php echo e(asset('storage/images/download.png')); ?>" alt="" style="width: 100px; height: auto;">
                        <span class="me-2">الوزارات المصرية</span>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="mainNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo e(route('home')); ?>">الرئيسية</a>
                        </li>

                        <!-- وزارة الداخلية -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#">وزارة الداخلية</a>
                            <ul class="dropdown-menu dropdown-menu-end text-end">
                                <li><a class="dropdown-item" href=""> قطاع الامن العام </a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('cert')); ?>    ">قطاع الاحوال المدنيه </a></li>
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

                        <?php if(auth()->guard()->guest()): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo e(route('register')); ?>">تسجيل جديد</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="<?php echo e(route('login')); ?>">تسجيل دخول</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link active text-decoration-underline"><?php echo e(ucwords(Auth::user()->name)); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active text-danger-emphasis" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out fs-5 text-dark" aria-hidden="true"></i>
                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mb-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    

    
    <script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
</body>
<?php echo $__env->yieldContent('scripts'); ?>

</html>
<?php /**PATH C:\xampp\htdocs\network\resources\views/layouts/app.blade.php ENDPATH**/ ?>
@extends('layouts.app')

@section('title', 'الرئيسية')

@section('content')
    <header class="text-center py-5" style="background-image: url('{{ asset('storage/images/Egyptian_Police_Emblem.svg') }}'); background-size: cover; background-position: center; min-height: 600px; position: relative; width: 100vw; margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%);">
        <div class="container" style="position: relative; z-index: 2;">
            <h1 class="display-4 text-white">مرحباً بكم في البوابة الإلكترونية للوزارات المصرية</h1>
            <p class="lead text-white">يمكنك من هنا الوصول إلى خدمات جميع الوزارات بسهولة وسرعة.</p>
        </div>
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5);"></div>
    </header>

    <section class="py-5 text-center">
        <div class="container">
            <h2>خدمات مميزة</h2>
            <style>
                .hover-card {
                    transition: box-shadow 0.3s, transform 0.3s, background-color 0.3s;
                }
                .hover-card:hover {
                    box-shadow: 0 8px 24px rgba(0,0,0,0.2);
                    transform: translateY(-8px) scale(1.03);
                    background-color: #f8f9fa;
                    cursor: pointer;
                }
            </style>
            <div class="row mt-4 g-4 justify-content-center">
                <div class="col-md-4">
                    <a href="{{ route('formcert') }}" class="text-decoration-none">
                        <div class="card p-3 shadow-sm hover-card h-100">
                            <h5 class="text-primary">وزارة الداخلية</h5>
                            <p class="text-muted">قطاع الاحوال المدنية (<span class="fw-bolder">شهادة الميلاد</span>)</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('formid') }}" class="text-decoration-none">
                        <div class="card p-3 shadow-sm hover-card h-100">
                            <h5 class="text-primary">وزارة الداخلية</h5>
                            <p class="text-muted">قطاع الاحوال المدنية ( <span class="fw-bolder"> بطاقة الرقم القومي</span> )</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 shadow-sm hover-card h-100">
                        <h5 class="text-primary">وزارة الصحة</h5>
                        <p class="text-muted">حجز مواعيد الكشف الطبي والحصول على الخدمات الصحية.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

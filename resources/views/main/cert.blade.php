@extends('layouts.app')

@section('title', ' شهادة ميلاد')

@section('content')
    <header class="text-center py-5" style="background-image: url('{{ asset('storage/images/Egyptian_Police_Emblem.svg') }}'); background-size: cover; background-position: center; min-height: 600px; position: relative; width: 100vw; margin-left: calc(-50vw + 50%); margin-right: calc(-50vw + 50%);">
        <div class="container" style="position: relative; z-index: 2;">
            <h1 class="display-4 text-white">مرحباً بكم في قطاع الاحوال المدنيه </h1>
            <p class="lead text-white">يمكنك من هنا الوصول إلى خدمات الاحوال المدنيه بسهولة </p>
        </div>
        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.5);"></div>
    </header>
    <div class="container my-5">
        <div class="row justify-content-center g-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-primary h-100">
                    <div class="card-body py-5">
                        <h5 class="card-title text-primary fw-bold mb-3">طلب استخراج شهادة الميلاد</h5>
                        <p class="card-text text-muted mb-4">
                            يمكنك الآن استخراج شهادة الميلاد إلكترونيًا بخطوات بسيطة وسريعة.
                        </p>
                        <a href="{{route('formcert')}}" class="btn btn-outline-primary px-4">تقديم الطلب</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm border-primary h-100">
                    <div class="card-body py-5">
                        <h5 class="card-title text-primary fw-bold mb-3">طلب استخراج بطاقة الرقم القومي</h5>
                        <p class="card-text text-muted mb-4">
                            يمكنك تقديم طلب لاستخراج بطاقة الرقم القومي بسهولة وسرعة عبر منصتنا الإلكترونية.
                        </p>
                        <a href="{{route('formid')}}" class="btn btn-outline-primary px-4">تقديم الطلب</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection


@extends('layouts.app')

@section('title', ' شهادة ميلاد')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 text-center">البحث عن شهادة ميلاد</h3>
    <form action="{{ route('birth-certificate.search') }}" method="GET">
        @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif
        <div class="mb-3">
            <label for="national_id" class="form-label">الرقم القومي</label>
        <input type="text"
            class="form-control"
            id="national_id"
            name="national_id"
            title="الرقم القومي يجب أن يتكون من 14 رقمًا"
            placeholder="أدخل الرقم القومي"
            inputmode="numeric"
            pattern="\d*"
            maxlength="14"
            oninput="this.value = this.value.replace(/[^0-9]/g, '')">

        </div>
        <div class="mb-3 text-center ">
            <button type="submit" class="btn btn-primary ">بحث</button>
        </div>
    </form>
</div>
@endsection

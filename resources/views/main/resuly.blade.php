@extends('layouts.app')

@section('title', 'شهادة ميلاد')

@section('content')
<div class="container my-5" id="certificate-content">
    <div class="card birth-certificate p-4 shadow">
        <div class="header">
            <img src="{{ asset('storage/images/egypt_logo.png') }}" alt="شعار جمهورية مصر العربية" class="logo d-print-none">
            <h2 class="title">جمهورية مصر العربية</h2>
            <h5 class="subtitle d-print-none">وزارة الصحة - مكتب الصحة</h5>
        </div>

        <div class="body">
            <p><strong>تشهد وزارة الصحة بأن السيدة/السيد</strong> {{ $birthCertificate->name }}</p>
            <p><strong>الرقم القومي:</strong> {{ $birthCertificate->national_id }}</p>
            <p><strong>تاريخ الميلاد:</strong> {{ $birthCertificate->birth_date }}</p>
            <p><strong>النوع:</strong> {{ $birthCertificate->gender == 'male' ? 'ذكر' : 'أنثى' }}</p>
            <p><strong>محل الميلاد:</strong> {{ $birthCertificate->address }}</p>
        </div>

            <div class="footer">
                <div class="issue-date text-left">
                    <strong>تاريخ الإصدار:</strong> {{ now()->format('Y-m-d') }}
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-4 d-print-none">
        <button class="btn btn-primary" onclick="printCertificate()">طباعة الشهادة</button>
    </div>
</div>

<style>
.birth-certificate {
    border: 2px solid #3498db;
    border-radius: 12px;
    background: #f9f9f9;
    padding: 24px;
    box-shadow: 0 2px 8px rgba(44,62,80,0.08);
    max-width: 600px;
    margin: 0 auto;
    font-family: 'Arial', sans-serif;
    direction: rtl;
    text-align: right;
}
.birth-certificate .header, .birth-certificate .footer { text-align: center; margin-bottom: 20px; }
.birth-certificate .logo { width: 60px; margin-bottom: 8px; }
.birth-certificate .title { color: #2c3e50; margin-bottom: 4px; font-size: 1.5rem; }
.birth-certificate .subtitle { color: #777; font-size: 1rem; }
.birth-certificate .body p { font-size: 1.1rem; margin-bottom: 12px; }
.birth-certificate .body strong { color: #2980b9; }
.birth-certificate .footer { color: #555; font-size: 0.9rem; text-align: left; }
@media print {
    body { background: #fff !important; }
    .d-print-none { display: none !important; }
}
</style>

<script>
    function printCertificate() {
        const content = document.getElementById('certificate-content').innerHTML;
        const win = window.open('', '', 'width=900,height=700');
        win.document.write(`
            <html>
                <head>
                    <title>شهادة ميلاد</title>
                    <style>
                        body {
                            font-family: 'Arial', sans-serif;
                            direction: rtl;
                            text-align: right;
                            padding: 40px 20px;
                            background: #f9f9f9;
                        }
                        h2 {
                            text-align: center;
                            margin-bottom: 30px;
                            color: #2c3e50;
                        }
                        .card {
                            border: 2px solid #3498db;
                            border-radius: 12px;
                            background: #fff;
                            padding: 32px 24px;
                            box-shadow: 0 2px 8px rgba(44,62,80,0.08);
                            max-width: 600px;
                            margin: 0 auto;
                        }
                        .card p {
                            font-size: 1.15rem;
                            margin-bottom: 18px;
                        }
                        .card strong {
                            color: #2980b9;
                        }
                        .d-print-none { display: none !important; }
                    </style>
                </head>
                <body>
                    <h2>شهادة ميلاد</h2>
                    ${content.replace(/<h2.*?<\/h2>/, '')}
                </body>
            </html>
        `);
        win.document.close();
        win.print();
    }
</script>

@endsection

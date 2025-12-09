<?php $__env->startSection('title', 'بطاقة الرقم القومي'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5" id="certificate-content">
    <div class="card national-id-card p-4 shadow">
        <div class="header">
            <img src="<?php echo e(asset('storage/images/egypt_logo.png')); ?>" alt="شعار جمهورية مصر العربية" class="logo d-print-none">
            <h2 class="title">جمهورية مصر العربية</h2>
            <h5 class="subtitle d-print-none ">وزارة الداخلية - مصلحة الأحوال المدنية</h5>
        </div>

        <div class="body">


            <div class="info">
                <p><strong>الاسم:</strong> <?php echo e($birthCertificate->name); ?></p>
                <p><strong>الرقم القومي:</strong> <?php echo e($birthCertificate->national_id); ?></p>
                <p><strong>تاريخ الميلاد:</strong> <?php echo e($birthCertificate->birth_date); ?></p>
                <p><strong>النوع:</strong> <?php echo e($birthCertificate->gender == 'male' ? 'ذكر' : 'أنثى'); ?></p>
                <p><strong>العنوان:</strong> <?php echo e($birthCertificate->address); ?></p>
            </div>
        </div>

        <div class="footer">
            <p class="issue-date"><strong>تاريخ الإصدار:</strong> <?php echo e(now()->format('Y-m-d')); ?></p>
        </div>
    </div>

    <div class="text-center mt-4 d-print-none">
        <button class="btn btn-primary" onclick="printCertificate()">طباعة البطاقة</button>
    </div>
</div>

<style>
.national-id-card {
    border: 2px solid #3498db; border-radius: 12px; background: #f9f9f9;
    padding: 24px; box-shadow: 0 2px 8px rgba(44,62,80,0.08);
    max-width: 600px; margin: 0 auto; font-family: 'Arial',sans-serif;
    direction: rtl; text-align: right;
}
.national-id-card .header { text-align: center; margin-bottom: 20px; }
.national-id-card .header .logo { width: 60px; margin-bottom: 8px; }
.national-id-card .header .title { color: #2c3e50; margin-bottom: 4px; font-size: 1.5rem; }
.national-id-card .header .subtitle { color: #777; font-size: 1rem; }
.national-id-card .body { display: flex; align-items: center; }
.national-id-card .body .info { flex-grow: 1; }
.national-id-card .body .info p { font-size: 1.1rem; margin-bottom: 12px; }
.national-id-card .body .info strong { color: #2980b9; }
.national-id-card .footer { text-align: left; margin-top: 20px; color: #555; }
.national-id-card .footer .issue-date { font-size: 0.9rem; }
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
                    <title>بطاقة الرقم القومي</title>
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
                    <h2> بطاقة الرقم القومي</h2>
                    ${content.replace(/<h2.*?<\/h2>/, '')}
                </body>
            </html>
        `);
        win.document.close();
        win.print();
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\network\resources\views/main/resultid.blade.php ENDPATH**/ ?>
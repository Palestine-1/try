<?php $__env->startSection('title', ' شهادة ميلاد'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3 class="mb-4 text-center">البحث عن شهادة ميلاد</h3>
    <form action="<?php echo e(route('birth-certificate.search')); ?>" method="GET">
        <?php if(session('error')): ?>
            <div class="alert alert-danger text-center"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\network\resources\views/main/formcert.blade.php ENDPATH**/ ?>
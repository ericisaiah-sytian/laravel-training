<?php if(session()->has('success')): ?>
<div class = "success-wrapper mt-10">
    <div class = "container">
            <p class = "success"><?php echo e(session('success')); ?></p>
    </div>
</div>
<?php endif; ?><?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/components/success.blade.php ENDPATH**/ ?>
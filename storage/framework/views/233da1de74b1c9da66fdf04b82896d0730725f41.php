<?php if(session()->has('alert')): ?>
<div class = "alert-wrapper mt-10">
    <div class = "container">
            <p class = "alert"><?php echo e(session('alert')); ?></p>
    </div>
</div>
<?php endif; ?><?php /**PATH F:\xampp\htdocs\laravel\laravel-training\resources\views/components/alert.blade.php ENDPATH**/ ?>
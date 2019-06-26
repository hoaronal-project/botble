<div class="col-md-4">
<?php if ($__env->exists('main::views.general.popular')) echo $__env->make('main::views.general.popular', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Popular News -->
<?php if ($__env->exists('main::views.general.reviews')) echo $__env->make('main::views.general.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Reviews News -->
<?php if ($__env->exists('main::views.general.most_coment')) echo $__env->make('main::views.general.most_coment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- Most Commented News -->
<?php if ($__env->exists('main::views.general.editor_conor')) echo $__env->make('main::views.general.editor_conor', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<!-- Right Section -->
<?php /**PATH C:\xampp\htdocs\botble\platform\plugins\blog\src\Providers/../../../../themes/general//views/general/right_sidebar.blade.php ENDPATH**/ ?>
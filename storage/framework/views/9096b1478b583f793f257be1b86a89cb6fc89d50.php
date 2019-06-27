<?php if(Auth::user()->hasPermission($route . '.edit')): ?>
    <a href="<?php echo e(Route::has($route . '.edit') ? route($route . '.edit', $item->id) : '#'); ?>" class="tip" title="<?php echo e(trans('plugins/language::language.current_language')); ?>"><i class="fa fa-check text-success"></i></a>
<?php else: ?>
    <i class="fa fa-check text-success"></i>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\botble\platform\plugins/language/resources/views//partials/status/active.blade.php ENDPATH**/ ?>
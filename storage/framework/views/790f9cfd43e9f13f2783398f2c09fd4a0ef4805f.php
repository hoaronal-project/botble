<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('plugins/blog::settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('plugins/blog::settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group">
                <label class="text-title-field"
                       for="blog_page_id"><?php echo e(trans('plugins/blog::settings.blog_page_id')); ?>

                </label>
                <div class="ui-select-wrapper">
                    <select name="blog_page_id" class="ui-select" id="blog_page_id">
                        <option value=""><?php echo e(trans('plugins/blog::settings.select')); ?></option>
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($page->id); ?>" <?php if(setting('blog_page_id') == $page->id): ?> selected <?php endif; ?>><?php echo e($page->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <svg class="svg-next-icon svg-next-icon-size-16">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#select-chevron"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\botble\platform\plugins/blog/resources/views//settings.blade.php ENDPATH**/ ?>
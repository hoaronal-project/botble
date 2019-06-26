<?php if(isset($populars)): ?>
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Popular News</a></h2>
    </div>
    <?php $__currentLoopData = $populars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="media">
        <div class="media-left">
            <a href="<?php echo e(route('public.blog.details')); ?>/<?php echo e($post->slug ?? ''); ?>"><img class="media-object sidebar-img" src="<?php echo e(asset($post->image_link ?? '')); ?>"
                             alt="Generic placeholder image"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="<?php echo e(route('public.blog.details')); ?>/<?php echo e($post->slug ?? ''); ?>" target="_self"><?php echo e(str_limit($post->name,30) ?? ''); ?></a>
            </h3> <span class="media-date"><a href="javascript:;"><?php echo e($post->created_at->toDateString()); ?></a>,  by: <a href="javascript:;"><?php echo e($post->author->first_name); ?></a></span>

            <div class="widget_article_social">
                <span>
                    <a href="javascript:;" target="_self"> <i class="fa fa-eye"></i><?php echo e($post->views ?? 0); ?></a> Views
                </span>
                <span>
                    <a href="javascript:;" target="_self"><i class="fal fa-comments"></i>4</a> Comments
                </span>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\botble\platform\plugins\blog\src\Providers/../../../../themes/general//views/general/popular.blade.php ENDPATH**/ ?>
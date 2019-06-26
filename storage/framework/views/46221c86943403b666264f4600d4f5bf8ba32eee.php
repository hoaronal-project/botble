<?php if(isset($videoList)): ?>
    <div class="video-section">
        <div class="swiper-container swiper-video">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $videoList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <div class="embed-responsive embed-responsive-4by3">
                            <?php echo $video->embed; ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\botble\platform\plugins\blog\src\Providers/../../../../themes/general//views/home/video.blade.php ENDPATH**/ ?>
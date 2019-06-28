<div class="flexbox-annotated-section">
    <div class="flexbox-annotated-section-annotation">
        <div class="annotated-section-title pd-all-20">
            <h2><?php echo e(trans('packages/optimize::optimize.settings.title')); ?></h2>
        </div>
        <div class="annotated-section-description pd-all-20 p-none-t">
            <p class="color-note"><?php echo e(trans('packages/optimize::optimize.settings.description')); ?></p>
        </div>
    </div>

    <div class="flexbox-annotated-section-content">
        <div class="wrapper-content pd-all-20">
            <div class="form-group">
                <label class="text-title-field"
                       for="optimize_page_speed_enable"><?php echo e(trans('packages/optimize::optimize.settings.enable')); ?>

                </label>
                <label class="hrv-label">
                    <input type="radio" name="optimize_page_speed_enable" class="hrv-radio"
                           value="1"
                           <?php if(setting('optimize_page_speed_enable')): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.yes')); ?>

                </label>
                <label class="hrv-label">
                    <input type="radio" name="optimize_page_speed_enable" class="hrv-radio"
                           value="0"
                           <?php if(!setting('optimize_page_speed_enable')): ?> checked <?php endif; ?>><?php echo e(trans('core/setting::setting.general.no')); ?>

                </label>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\botble\platform\packages/optimize/resources/views//setting.blade.php ENDPATH**/ ?>
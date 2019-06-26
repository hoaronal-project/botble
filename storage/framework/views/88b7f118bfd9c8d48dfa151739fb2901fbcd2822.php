<?php echo SeoHelper::render(); ?>


<?php echo Theme::asset()->styles(); ?>

<?php echo Theme::asset()->container('after_header')->styles(); ?>

<?php echo Theme::asset()->container('header')->scripts(); ?>


<?php echo apply_filters(THEME_FRONT_HEADER, null); ?>

<?php /**PATH C:\xampp\htdocs\botble\platform\packages/theme/resources/views//partials/header.blade.php ENDPATH**/ ?>
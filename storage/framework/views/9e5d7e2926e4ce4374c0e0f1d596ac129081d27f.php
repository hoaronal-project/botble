<?php if(session('message') && session('error')== false): ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'success',
            title: '<?php echo e(session('message')); ?>'
        });
    </script>
    <?php endif; ?>

<?php if(session('message') && session('error')== true): ?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'error',
            title: '<?php echo e(session('message')); ?>'
        });
    </script>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\botble\platform\plugins\blog\src\Providers/../../../../themes/general//views/layouts/notify.blade.php ENDPATH**/ ?>
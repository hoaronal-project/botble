@if(session('message') && session('error')== false)
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'success',
            title: '{{session('message')}}'
        });
    </script>
    @endif

@if(session('message') && session('error')== true)
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            type: 'error',
            title: '{{session('message')}}'
        });
    </script>
@endif

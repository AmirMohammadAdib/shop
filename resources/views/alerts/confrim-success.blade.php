@if (session('swal-confrim-success'))
    <script>
        $(document).ready(function() {
            Swal.fire(
                '{{ explode("@", session('swal-confrim-success'))[0] }}',
                '{{ explode("@", session('swal-confrim-success'))[1] }}',
                'success'
            )
        })
    </script>
@endif

@if (session('toast-error'))
    <section class="toast" data-delay="5000">
        <section class="toast-body py-3 d-flex bg-danger text-white">
            <strong class="ml-auto">{{ session('toast-error') }}</strong>
            <button type="button" class="mr-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </section>
        <script>
            $(document).ready(() => {
                $('.toast').toast("show")
            })
        </script>
    </section>
@endif

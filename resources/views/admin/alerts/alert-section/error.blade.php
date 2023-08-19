@if (session('alert-section-error'))
    <div class="alert alert-danger fade show alert-dismissible" role="alert">
        <h4 class="alert-heading">خطا</h4>
        <hr>
        <p class="mb-0">{{ session('alert-section-error') }}</p>
    </div>
@endif

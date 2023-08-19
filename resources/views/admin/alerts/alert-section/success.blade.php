@if (session('alert-section-success'))
    <div class="alert alert-success fade show alert-dismissible" role="alert">
        <h4 class="alert-heading">عملیات موفق</h4>
        <hr>
        <p class="mb-0">{{ session('alert-section-success') }}</p>
    </div>
@endif

@if (session('alert-section-warning'))
    <div class="alert alert-warning fade show alert-dismissible" role="alert">
        <h4 class="alert-heading">هشدار</h4>
        <hr>
        <p class="mb-0">{{ session('alert-section-warning') }}</p>
    </div>
@endif

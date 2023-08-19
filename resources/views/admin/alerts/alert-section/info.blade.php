@if (session('alert-section-info'))
    <div class="alert alert-info fade show alert-dismissible" role="alert">
        <h4 class="alert-heading">جزئیات</h4>
        <hr>
        <p class="mb-0">{{ session('alert-section-info') }}</p>
    </div>
@endif

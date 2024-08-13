@if (session('mensaje')) <!--Data actualizada -->
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif
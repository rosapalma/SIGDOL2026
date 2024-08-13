@if (session('error'))
    <div style="margin-top: 2%" class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('message'))
    <div class="alert alert-info" role="alert">
        <strong>Info:</strong>
        {{ session('message') }}
    </div>
@endif

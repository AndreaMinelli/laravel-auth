@if (session('msg'))
    <div class="alert alert-{{ session('type') }}" role="alert">
        {{ session('msg') }}
    </div>
@endif

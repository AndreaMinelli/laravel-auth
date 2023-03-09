@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="row g-3"
        enctype="multipart/form-data" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" class="row g-3" enctype="multipart/form-data"
            novalidate>
@endif

@csrf
<div class="col-4">
    <label for="name" class="form-label">Nome Progetto:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        placeholder="Inserisci nome progetto" value="{{ old('name', $project->name) }}" required>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="col-4">
    <label for="project_link" class="form-label">Git Hub Link:</label>
    <input type="url" class="form-control @error('project_link') is-invalid @enderror" id="project_link"
        name="project_link" value="{{ old('project_link', $project->project_link) }}"
        placeholder="Inserisci url del link" required>
    @error('project_link')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="col-4" id="upload-image">
    <label for="project_img" class="form-label">Immagine:</label>
    <div class="input-group mb-3">
        <button type="button" class="btn btn-primary rounded-end" id="show-image-input"
            style='display:{{ $project->exists ? 'block' : 'none' }}'>Cambia immagine</button>
        <input type="file" class="form-control rounded-start @error('project_img') is-invalid @enderror"
            id="project_img" name="project_img" style='display:{{ $project->exists ? 'none' : 'block' }}'>
        @error('project_img')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="col-12">
    <label for="description" class="form-label">Descrizione:</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="text-end mt-5">
    <a class="btn btn-secondary"
        href="@if ($project->exists) {{ route('admin.projects.show', $project->id) }}
    @else
    {{ route('admin.projects.index') }} @endif">Annulla</a>
    <button class="btn btn-success">Salva</button>
</div>
</form>

@section('scripts')
    <script>
        const showImageInput = document.getElementById("show-image-input");
        const uploadImage = document.getElementById("project_img");
        showImageInput.addEventListener("click", () => {
            showImageInput.style.display = 'none';
            uploadImage.style.display = 'block';
        });
    </script>
@endsection

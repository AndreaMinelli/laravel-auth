@if ($project->exists)
    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" class="row g-3" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.projects.store') }}" method="POST" class="row g-3" novalidate>
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
    <label for="project_img" class="form-label">Immagine:</label>
    <input type="url" class="form-control @error('project_img') is-invalid @enderror" id="project_img"
        name="project_img" value="{{ old('project_img', $project->project_img) }}"
        placeholder="Inserisci url dell'immagine" required>
    @error('project_img')
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

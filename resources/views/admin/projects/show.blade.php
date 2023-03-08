@extends('layouts.app')

@section('title', $project->name)

@section('content')

    <h1 class="text-center my-4 text-capitalize">{{ $project->name }}</h1>
    <p>{{ $project->description }}</p>
    <div class="d-flex justify-content-between">
        <p><strong>Repository: <a href="{{ $project->project_link }}">{{ $project->getProjectLink() }}</a></strong></p>
        <p><strong>Ultimo Aggiornamento:</strong> {{ $project->updated_at }}</p>
    </div>
    <div class="d-flex justify-content-center">
        @if ($project->project_img)
            <img src="{{ $project->project_img }}" alt="{{ $project->name }}">
        @endif
    </div>
    <div class="d-flex justify-content-end my-4">
        <a class="btn btn-secondary btn-sm" href="{{ route('admin.projects.index') }}">Torna indietro</a>
    </div>

@endsection

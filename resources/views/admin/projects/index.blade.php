@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h1 class="text-center my-4">I miei progetti</h1>
    <div class="text-end my-4">
        <a class="btn btn-success btn-sm" href="{{ route('admin.projects.create') }}">Aggiungi progetto</a>
    </div>
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Link Git Hub</th>
                <th scope="col">Ultimo Aggiornamento</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->name }}</th>
                    <td>{{ $project->getDescription() }}</td>
                    <td><a href="{{ $project->project_link }}">{{ $project->getProjectLink() }}</a></td>
                    <td>{{ $project->updated_at }}</td>
                    <td class="">
                        <a class="btn btn-primary btn-sm"
                            href="{{ route('admin.projects.show', $project->id) }}">Visualiza</a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" scope="row" class="text-center">
                        Non ci sono progetti da visualizzare
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection

@extends('layouts.app')

@section('title', 'Projects')
@section('cdns')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css'
        integrity='sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=='
        crossorigin='anonymous' />
@endsection

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
                <th scope="col">Ultimo Agg.</th>
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
                    <td class="d-flex justify-content-between">
                        <a class="btn btn-primary btn-sm" href="{{ route('admin.projects.show', $project->id) }}"><i
                                class="fa-solid fa-eye"></i></a>
                        <a class="btn btn-warning btn-sm text-white"
                            href="{{ route('admin.projects.edit', $project->id) }}"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" class="delete-form"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
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
    <div class='d-flex justify-content-center my-5 '>
        {{ $projects->links() }}
    </div>
@endsection

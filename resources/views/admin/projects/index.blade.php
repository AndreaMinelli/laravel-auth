@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <h1 class="text-center my-4">I miei progetti</h1>
        <table class="table table-striped ">
            <thead>
                <tr class="text-center">
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
                        <td>{{ $project->description }}</td>
                        <td><a href="{{ $project->project_link }}">{{ $project->project_link }}</a></td>
                        <td>{{ $project->updated_at }}</td>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

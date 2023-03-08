<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'project_img' => 'nullable|url',
            'description' => 'required|string',
            'project_link' => 'required|url',
        ], [
            'name.required' => 'Devi inserire un nome valido!',
            'description.required' => 'Devi inserire una descrizione!',
            'project_img.url' => 'L\'immagine deve avere un url valido!',
            'project_link.required' => 'Devi inserire un link valido!',
            'project_link.url' => 'Il link del progetto non è valido.',
        ]);
        $data = $request->all();
        $project = new Project();
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project->id)->with('msg', "Il progetto $project->name è stato aggiunto correttamente.")->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string',
            'project_img' => 'nullable|url',
            'description' => 'required|string',
            'project_link' => 'required|url',
        ], [
            'name.required' => 'Devi inserire un nome valido!',
            'description.required' => 'Devi inserire una descrizione!',
            'project_img.url' => 'L\'immagine deve avere un url valido!',
            'project_link.required' => 'Devi inserire un link valido!',
            'project_link.url' => 'Il link del progetto non è valido.',
        ]);
        $data = $request->all();
        $project->fill($data);
        $project->save();

        return to_route('admin.projects.show', $project->id)->with('msg', "Il progetto $project->name è stato modificato.")->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('msg', "Il progetto $project->name è stato eliminato.")->with('type', 'danger');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller {
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Create
    public function create() {
        return view('admin.projects.create');
    }

    // Store
    public function store(StoreProjectRequest $request) {
        $data_list = $request->validated();
        $project = Project::create($data_list);
        return redirect()->route('admin.projects.index');
    }

    // Index
    public function index() {
        $projects_list = Project::paginate(5);
        return view('admin.projects.index', compact('projects_list'));
    }

    // Show
    public function show(Project $project) {
        return view('admin.projects.show', compact('project'));
    }

    // Edit
    public function edit(Project $project) {
        return view('admin.projects.edit', compact('project'));
    }

    // Update
    public function update(UpdateProjectRequest $request, Project $project) {
        $data_list = $request->validated();
        $project->update($data_list);
        return redirect()->route('admin.projects.index');
    }

    // Delete
    public function destroy(Project $project) {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}

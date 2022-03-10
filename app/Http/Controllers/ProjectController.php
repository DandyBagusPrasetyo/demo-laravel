<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectFile;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::get();

        return view('project.index', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        $projectFiles = ProjectFile::where('project_id', $id)->get();

        return view('project.show', compact('project', 'projectFiles'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'customer' => ['required'],
            'value' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'sla' => ['required'],
            'status' => ['required']
        ]);

        $project = $request->all();
        Project::create($project);

        if ($project) {
            return redirect()->route('project.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('project.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('project.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'customer' => ['required'],
            'value' => ['required', 'numeric'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'sla' => ['required'],
            'status' => ['required']
        ]);

        $project = Project::findOrFail($id);
        $project->update($request->all());

        if ($project) {
            return redirect()->route('project.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('project.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        if ($project) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}

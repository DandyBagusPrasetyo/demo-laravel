<?php

namespace App\Http\Controllers;

use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    public function create($projectId)
    {
        return view('project.file.create', compact('projectId'));
    }

    public function store(Request $request)
    {
        foreach ($request->input('project_id') as $key => $value) {

            $file = $request->file('file')[$key];
            $fileName = time() . '-' . $file->getClientOriginalName();

            $data = new ProjectFile;
            $data->project_id = $request->get('project_id')[$key];
            $data->file = $fileName;
            $data->save();

            $file->storeAs('public/project/file', $data->project_id . '/' . $fileName);
        }

        return redirect()->route('project.show', ['id' => $data->project_id])->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show($id)
    {
        $doc = ProjectFile::findOrFail($id);

        $extension = pathinfo(storage_path('/app/public/project/file/' . $doc->project_id . '/' . $doc->file), PATHINFO_EXTENSION);

        return view('project.file.show', compact('doc', 'extension'));
    }

    public function download($id)
    {
        $doc = ProjectFile::findOrFail($id);

        return response()->download(storage_path('/app/public/project/file/' . $doc->project_id . '/' . $doc->file));
    }

    public function destroy(ProjectFile $doc)
    {
        Storage::disk('local')->delete('public/project/file/' . $doc->project_id . '/' . basename($doc->file));

        $doc = ProjectFile::findOrFail($doc->id);
        $doc->delete();

        if ($doc) {
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

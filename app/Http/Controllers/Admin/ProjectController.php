<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Controllers\Controller;

//model
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;

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
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create',compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $formData = $request->validated();

        $preview_path = null;
        if (isset($formData['preview'])) {
            $preview_path = Storage::put('uploads', $formData['preview']);
        }


        $project = Project::create([
            'title'=>$formData['title'],
            'preview'=>$preview_path,
            'collaborators'=>$formData['collaborators'],
            'type_id'=>$formData['type_id'],
            'description'=>$formData['description'],
        ]);

        if(isset($formData['technologies'])){
            foreach ($formData['technologies'] as $technologyId) {
                $project->technologies()->attach($technologyId);
            }
        }

        return redirect()->route('admin.projects.show', ['project' => $project->id]);
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
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $formData = $request->validated();
        $project = Project::create([
            'title'=>$formData['title'],
            'preview'=>$formData['preview'],
            'collaborators'=>$formData['collaborators'],
            'type_id'=>$formData['type_id'],
            'description'=>$formData['description'],
        ]);

        if(isset($formData['technologies'])){
            $project->technologies()->sync($formData['technologies']);
        }
        else{
            $project->technologies()->detach();
        }
         
        return redirect()->route('admin.projects.show', ['project' => $project->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}

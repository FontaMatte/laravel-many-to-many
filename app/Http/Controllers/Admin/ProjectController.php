<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Validation\Rule;

// Helpers
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

// Mail
use App\Mail\NewProject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if (array_key_exists('img', $data)) {
            $imgPath = Storage::put('projects', $data['img']);
            $data['img'] = $imgPath;
        }
        
        $newProject = Project::create($data);

        // Mail::to('matteo@classe84.com')->send(new NewProject($newProject));

        return redirect()->route('admin.projects.show', $newProject)->with('success', 'Project successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        return view('admin.projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        if (array_key_exists('delete_img', $data)) {
            if ($project->img) {
                Storage::delete($project->img);

                $project->img = null;
                $project->save();
            }
        }
        else if (array_key_exists('img', $data)) {
            $imgPath = Storage::put('projects', $data['img']);
            $data['img'] = $imgPath;

            if ($project->img) {
                Storage::delete($project->img);
            }
        }

        $project->update($data);

        return redirect()->route('admin.projects.show', $project->id)->with('success', 'Project successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->img) {
            Storage::delete($project->img);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project successfully deleted');
    }
}

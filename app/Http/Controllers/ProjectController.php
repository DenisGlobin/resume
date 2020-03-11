<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

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
        return view('admin.projects', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project;

        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->tags = json_encode($request->tags);
        $project->site_url = $request->siteUrl;
        $project->github_url = $request->githubUrl;
        $project->is_test_task = isset($request->testTask) ? $request->testTask : false;
        if ($request->hasFile('thumbnail')) {
            //Call uploadFile method if the request have upload file
            $project->thumbnail = $this->uploadFile($request);
        } else {
            $project->thumbnail = asset('images/projects/default_thumb.png');
        }

        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->title = $request->title;
        $project->subtitle = $request->subtitle;
        $project->tags = json_encode($request->tags);
        $project->site_url = $request->siteUrl;
        $project->github_url = $request->githubUrl;
        $project->is_test_task = isset($request->testTask) ? $request->testTask : false;
        // If user want to delete thumbnail of this project
        if ($request->resetThumb) {
            $project->thumbnail = asset('images/projects/default_thumb.png');
        } elseif ($request->hasFile('thumbnail')) {
            //Call uploadFile method if the request have upload file
            $project->thumbnail = $this->uploadFile($request);
        }

        $project->save();
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }

    /**
     * Uploading file on the server
     *
     * @param Request $request
     * @return string
     */
    private function uploadFile(Request $request)
    {
        $file = $request->file('thumbnail');
        $fileName = $file->hashName();
        $path = $file->storeAs(
            'public/images/projects', $fileName
        );
        return asset('storage/images/projects/' . $fileName);
    }
}

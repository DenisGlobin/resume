<?php

namespace App\Http\Controllers;

use App\Experience;
use App\Http\Requests\ExperienceRequest;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experiences', ['experiences' => $experiences]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ExperienceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExperienceRequest $request)
    {
        $experience = new Experience;

        $experience->name = $request->name;
        $experience->title = $request->title;
        $experience->text = $request->text;
        $experience->years = $request->years;
        $experience->location = $request->location;
        $experience->type = $request->type;

        $experience->save();
        return redirect()->route('experiences.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ExperienceRequest  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(ExperienceRequest $request, Experience $experience)
    {
        $experience->update($request->all());
        return redirect()->route('experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        try {
            $experience->delete();
            return redirect()->route('experiences.index');
        } catch (\Exception $exception) {
            return redirect()->route('experiences.index')->with('errors', $exception->getMessage());
        }
    }
}

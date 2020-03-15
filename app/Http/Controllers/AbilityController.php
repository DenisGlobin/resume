<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Http\Requests\AbilityRequest;
use Illuminate\Http\Request;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abilities = Ability::all();
        return view('admin.abilities', ['abilities' => $abilities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ability = new Ability;
        $ability->name = $request->name;
        $ability->level = $request->level;
        $ability->type = $request->type;

        $ability->save();
        return redirect()->route('abilities.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\AbilityRequest  $request
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function update(AbilityRequest $request, Ability $ability)
    {
        $ability->update($request->all());
        return redirect()->route('abilities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability)
    {
        try {
            $ability->delete();
            return redirect()->route('abilities.index');
        } catch (\Exception $exception) {
            return redirect()->route('abilities.index')->with('errors', $exception->getMessage());
        }
    }
}

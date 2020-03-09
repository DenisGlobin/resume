<?php

namespace App\Http\Controllers;

use App\Ability;
use App\Experience;
use App\Project;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'user' => User::first(),
//            'experiences' => Experience::all(),
            'educations' => Experience::where('type', 'education')->get(),
            'careers' => Experience::where('type', 'career')->get(),
            'abilities' => Ability::all(),
            'projects' => Project::all(),
        ];
        return view('home', $data);
    }
}

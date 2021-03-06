<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::firstOrFail();
        return view('admin.profile', ['user' => $user]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->skype = $request->skype;
        $user->age = $request->age;
        $user->location = $request->location;
        $user->about = $request->about;
        // If user want to delete his photo
        if ($request->resetPhoto) {
            $user->avatar = asset('images/avatar/default_avatar.jpg');
        } elseif ($request->hasFile('avatar')) {
            //Call uploadFile method if the request have upload file
            $user->avatar = $this->uploadFile($request);
        }
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Uploading file on the server
     *
     * @param Request $request
     * @return string
     */
    private function uploadFile(Request $request)
    {
        $file = $request->file('avatar');
        $fileName = $file->hashName();
        $path = $file->storeAs(
            'public/images/avatar', $fileName
        );
        return asset('storage/images/avatar/' . $fileName);
    }
}

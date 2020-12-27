<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        $userId = auth()->user()->id;
        if(UserProfile::where('user_id', $userId)->exists())
        {
            $profile = User::findOrFail($userId)->user_profile()->get();

            return view('mentee.profile.show', compact('profile'));
        }
        return view('mentee.profile.create');

    }

    public function store()
    {
        // validate the data
        $data = \request()->validate([
            'firstname'=> 'required',
            "middlename" => "required",
            "lastname" => "required",
            "tel_no" => "required",
            "student_id" => "required",
            "course" => "required",
            "faculty" => "required"
        ]);

        auth()->user()->user_profile()->create($data); // create the profile of the logged in user

        return redirect('/profile/'.auth()->user()->id);
    }

    public function show($id)
    {
        $profile = User::findOrFail($id)->user_profile()->get();

        return view('mentee.profile.show', compact('profile'));
    }

    public function edit($id)
    {
        $data = \request()->validate([
            "tel_no" => "required",
        ]);

        $user = User::findOrFail($id);
        $user->user_profile()->update($data);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Controllers\Controller;
use App\Models\SelectedMentor;
use App\Models\User;

//meeting model
use App\Models\Meeting;
use DB;
use Illuminate\Http\Request;

class CreateMeetingController extends Controller
{

/*
    public function index()
    {
        $mentors = User::where('role', 'mentor')->get();
        $hasMentor = SelectedMentor::where('user_id', auth()->user()->id);
        $mentor_id = $hasMentor->pluck('mentor_id');

        $mentor = User::findOrFail($mentor_id);

        return view('mentee.dashboard', [
            'mentors' => $mentors,
            'hasMentor' => $hasMentor->exists(),
            'mentor' => $mentor
        ]);
    }
    */

    public function index(){
    return view("mentee.modals.create_meeting");
    }
    public function requestMeeting(){
     $user_id = auth()->user()->id;

      //$mentor_id = DB::select("SELECT mentor_id FROM selected_mentor WHERE user_id =  $user_id")->mentor_id;
        //$value = SelectedMentor::find(['mentor_id'],$user_id);
        $mentor_id = SelectedMentor::where('user_id', $user_id)->pluck('mentor_id')->all();

       //dd($mentor_id);
       $meeting = New Meeting;
       $meeting ->meeting_id = 0;
       $meeting ->mentor_id = $mentor_id[0];
       $meeting -> user_id = $user_id;
       $meeting -> meeting_details = 0;
       $meeting ->meeting_date = " 2021-01-02";
       $meeting -> save();
    return view("mentee.modals.create_meeting");
    }
    public function viewCases(){
        $prosecutor_id = Auth::user()->prosecutor_id;
        $cases = CaseFile::all()->where(['prosecutor_id'],$prosecutor_id);;
        return view('prosecutors.view_cases')->with('cases', $cases, $prosecutor_id);
    }
    public function createMeeting(){
        $user_id = auth()->user()->pluck('email');
        return view("mentee.modals.create_meeting");
        dd($user_id);
    }


}

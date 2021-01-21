<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Controllers\Controller;
use App\Models\SelectedMentor;
use App\Models\User;

//meeting model
use App\Models\Meeting;
use App\Notifications\MeetingRequests;
use DB;
use Illuminate\Http\Request;

class RequestMeetingController extends Controller
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


    public function requestMeeting(Request $request){
        $request->validate([
            'meeting_details' => 'required',
            'meeting_date' => 'required',
        ]);

        $user_id = auth()->user()->id;

        $mentor_id = SelectedMentor::where('user_id', $user_id)->pluck('mentor_id')->all();

        // insert into DB
        Meeting::create([
            'user_id' => $user_id,
            'mentor_id' => $mentor_id[0],
            'meeting_details' => $request->meeting_details,
            'meeting_date' => $request->meeting_date,
        ]);

        // send notification to mentor
        $mentor = User::find($mentor_id[0]);
        $mentee = auth()->user()->name;

        $mentor->notify(new MeetingRequests($mentee,$mentor_id[0]));

        return redirect()->back();
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

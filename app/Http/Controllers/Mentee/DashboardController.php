<?php

namespace App\Http\Controllers\Mentee;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\SelectedMentor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $mentors = User::where('role', 'mentor')->get();
        $hasMentor = SelectedMentor::where('user_id', auth()->user()->id);
        $mentor_id = $hasMentor->pluck('mentor_id');

        $mentor = User::findOrFail($mentor_id);

        // check if mentee has requested meeting
        $meeting_status = Meeting::where('user_id', auth()->user()->id)->exists();


        return view('mentee.dashboard', [
            'mentors' => $mentors,
            'hasMentor' => $hasMentor->exists(),
            'mentor' => $mentor
        ]);
    }
}

<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Models\User;
use App\Notifications\MeetingRequests;
use App\Notifications\RequestStatus;
use Illuminate\Http\Request;

class CheckRequestsController extends Controller
{
    public function index()
    {
        $meeting_requests = Meeting::where('mentor_id', auth()->user()->id)->get();

        return view('mentor.check_requests.index', [
            'meeting_requests' => $meeting_requests
        ]);
    }

    public function acceptRequest($id)
    {
        $meeting_request = Meeting::find($id);
        $meeting_request->status = 1;
        $meeting_request->save();

        // send email to user
        $notified_mentee = User::find($meeting_request->user_id);
        $mentor = auth()->user()->name;

        $notified_mentee->notify(new RequestStatus($mentor, ''));

        return redirect()->back();
    }

    public function rescheduleMeeting(Request $request, $id)
    {
        $request->validate([
            'reschedule_meeting' => 'required'
        ]);

        $meeting_requests = Meeting::find($id);
        $notified_mentee = User::find($meeting_requests->user_id);
        $mentor = auth()->user()->name;

        $notified_mentee->notify(new RequestStatus($mentor, $request->reschedule_meeting));

        return redirect()->back();

    }
}

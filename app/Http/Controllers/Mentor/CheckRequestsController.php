<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Meeting;
use App\Notifications\MeetingRequests;
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
}

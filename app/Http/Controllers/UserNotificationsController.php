<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications;
        $notifications->markAsRead();

        return view('mentor.notifications.index', [
            'notifications' => $notifications
        ]);
    }

    public function mentee_notifications()
    {
        $notifications = auth()->user()->notifications;
        $notifications->markAsRead();

        return view('mentee.notifications.mentee_notifications', [
            'notifications' => $notifications
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SelectMentorController extends Controller
{
    public function selectMentor($id)
    {
        // select mentor by putting mentors id in selected mentor table
        auth()->user()->selected_mentor()->create([
            'mentor_id' => $id
        ]);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Team;

class UserTeamController extends Controller
{
    public function show()
    {
        return view('admin.team.my-team');
    }

    public function accept(Team $team)
    {
        auth()->user()->update(['team_id' => $team->id]);

        return redirect()->route('team.show');
    }
}

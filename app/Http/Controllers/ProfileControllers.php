<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Thread;
use App\User;
use Illuminate\Http\Request;

class ProfileControllers extends Controller
{
    //
    public function show(User $user)
    {
    
        return view('profiles.show',[
            'profileUser'=>$user,
            'threads' => $user->threads()->paginate(30),
            'activities' => \App\Activity::feed($user)
        ]);
    }
    
    /**
     * @param User $user
     * @return static
     */
    public function getActivity(User $user)
    {
       return $user->activity()->latest()->take(50)->with('subject')->get()->groupBy(function ($activity) {
            return $activity->created_at->format('Y-m-d');
        });
       
    }
    
    
}

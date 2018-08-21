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
            'activities' => Activity::feed($user)
        ]);
    }
    

    
    
}

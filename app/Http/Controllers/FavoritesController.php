<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Reply $reply)
    {
        //
       return $reply->favorite();
    }
    
    /**
     * @param Reply $reply
     */
   
    
    
}
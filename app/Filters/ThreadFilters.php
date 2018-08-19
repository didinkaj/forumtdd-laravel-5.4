<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends filters
{
    protected $filters = ['by','popular'];
    
    
    /**
     * @param $builder
     * @param $username
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        
        return $this->builder->where('user_id', $user->id);
    }
    /*
     * filter the query according to most popular threads
     * */
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }
    
}
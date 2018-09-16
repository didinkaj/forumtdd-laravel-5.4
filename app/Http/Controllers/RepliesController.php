<?php

namespace App\Http\Controllers;

use App\Inspections\Spam;
use App\Reply;
use Illuminate\Http\Request;

use App\Thread;
use Mockery\Exception;

class RepliesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'index']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($channelId, Thread $thread)
    {
        //
        return $thread->replies()->paginate(10);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param $channelId
     * @param Thread $thread
     * @param Spam $spam
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     */
    public function store($channelId, Thread $thread)
    {
        //
        try {
            $this->validateReply();
            
            $reply = $thread->addReply([
                                           'body' => request('body'),
                                           'user_id' => auth()->id()
                                       ]);
            
        } catch (\Exception $e) {
            
            return response("Sorry your reply could not be saved at this time", 422);
        
        }
        
        
        return $reply->load('owner');
        
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param Reply $reply
     * @param Spam $spam
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(Reply $reply)
    {
        //
        $this->authorize('update', $reply);
        
        try {

            $this->validateReply();
    
            $reply->update(request(['body']));
            
        }catch (\Exception $e){
            
            return response("Sorry your reply could not be saved at this time", 422);
        }
    
        return response("Updated", 200);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('update', $reply);
        
        $reply->delete();
        
        if (request()->expectsJson()) {
            return response(['status' => 'Reply deleted']);
        }
        
        return back();
    }
    
    public function validateReply()
    {
        $this->validate(request(), ['body' => 'required']);
        
        resolve(Spam::class)->detect(request('body'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Advertisment;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Advertisment $advertisment)
    {
      $attributes = request()->validate(['body' => 'required']);
       // $spam->detect(request('body'));

      $replys = Reply::create([
        'body' => request('body'),
        'user_id' => auth()->id(),
        'advertisments_id' => $advertisment->id
      ]);
      return back()->with('flash','Your reply has been left.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        // if($reply->id != auth()->id()){
        //     abort(403);
        // }
        // $this->authorize('update',$reply);
        $reply->update([
            'body' => request('body')
        ]);
    }

    /**
     * Remove the specified resource from storage
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        // $this->authorize('update',$reply);
        $reply->delete();
        if(request()->expectsJson()){
            return response(['status' => 'Reply delted']);
        }
        return back();
    }
}
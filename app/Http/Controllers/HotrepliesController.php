<?php

namespace App\Http\Controllers;

use App\Hotreplies;
use Illuminate\Http\Request;

class HotrepliesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Smallslider $smallslider)
	{
		$attributes = request()->validate(['body' => 'required']);
		$replys = Hotreplies::create([
			'body' => request('body'),
			'user_id' => auth()->id(),
			'smallslider_id' => $smallslider->id
		]);
		return back()->with('flash','Your reply has been left.');
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Reply  $reply
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Hotreplies $hotreplies)
	{
		// if($reply->id != auth()->id()){
		//     abort(403);
		// }
		// $this->authorize('update',$reply);
		$hotreplies->update([
			'body' => request('body')
		]);
	}
	
	/**
	 * Remove the specified resource from storage
	 * @param  \App\Reply  $reply
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Hotreplies $hotreplies)
	{
		// $this->authorize('update',$reply);
		$hotreplies->delete();
		if(request()->expectsJson()){
			return response(['status' => 'Reply delted']);
		}
		return back();
	}
}

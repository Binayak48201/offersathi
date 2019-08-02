<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserNotificationController extends Controller
{
	/**
	 * UserNotificationController constructor.
	 */
	public function __construct()
    {
    	$this->middleware('auth');
    }
	
	/**
	 * @return mixed
	 */
	public function index()
    {
    	return auth()->user()->unreadNotifications;
    }
	
	/**
	 * @param User $user
	 * @param $notificationId
	 */
	public function destroy($user, $notificationId)
    {	
    	auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
    }
}

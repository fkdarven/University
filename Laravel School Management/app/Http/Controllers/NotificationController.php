<?php

namespace App\Http\Controllers;

use Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function index()
	{
		foreach (auth()->user()->notifications as $notification) {
			$notification->markAsRead();
		}
		
		return back();
	}
    public function markAsRead ($id)
    {
    	$notification = auth()->user()->notifications()->findOrFail($id)->markAsRead();
    	return redirect('/enrollments');	
    }
     public function markAsRead2 ($id)
    {
    	auth()->user()->notifications()->findOrFail($id)->markAsRead();
    	return redirect('/enrollments/activate_enrollments');	
  
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RootController extends Controller {

    /**
    * Responds to requests to GET /
    */
    public function showHome() {
		
		$timelines = \App\Timeline::all();
		$users_timelines = null;
		
		if (\Auth::check()) {
			$user = \Auth::user();
			$users_timelines = \App\Timeline::where('user_id', '=', $user->id)
				->get(); 
		}

        return view('root.showHome')
			->with('timelines', $timelines)
			->with('users_timelines', $users_timelines);
    }
}
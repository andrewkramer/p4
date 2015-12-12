<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelinesController extends Controller {
	
	/**
    * Show timeline /
    */
    public function showTimeline($timeline_id) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
		$created_by = \App\User::where('id', '=', $timeline->created_by)
			->first();
		$last_modified_by = \App\User::where('id', '=', $timeline->last_modified_by)
			->first();
		
		$timeline_events = $timeline->event()
			->orderBy('start_date')
			->get();

        return view('timelines.showTimeline')
			->with('timeline', $timeline)
			->with('created_by', $created_by)
			->with('last_modified_by', $last_modified_by)
			->with('timeline_events', $timeline_events);
    }
	
	/**
    * Create a new timeline /
    */
    public function newTimeline(Request $request) {
		
		if ($request -> input('showForm') == 'true') {
			return view('timelines.newTimeline')
				->with('showForm', 'true');
		} else {
			if ( \Auth::check() ) {
				// Validate the request data
				$this->validate($request, [
					'name' => 'required',
				]);
				
				$timeline = new \App\Timeline();
				$user = \Auth::user();

				$timeline->name = $request -> input('name');
				$timeline->description = $request -> input('description');
				$timeline->user_id = $user->id;
				$timeline->created_by = $user->id;
				$timeline->last_modified_by = $user->id;

				$timeline->save();

				return view('timelines.newTimeline')
					->with('showForm', 'false')
					->with('timeline', $timeline);
			} else {
					return 'Access Denied';
			}
		}
    }

    /**
    * Edit timeline /
    */
    public function editTimeline($timeline_id, Request $request) {
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first(); 
			
		$timeline_events = $timeline->event()
			->orderBy('start_date')
			->get();
		
        if ($request -> input('showForm') == 'true') {
				return view('timelines.editTimeline')
					->with('showForm', 'true')
					->with('timeline', $timeline)
					->with('timeline_events', $timeline_events);
			} else { // Else submit form
				// Validate the request data
				$this->validate($request, [
					'name' => 'required',
				]);
			
				$user = \Auth::user();
			
				$timeline->name = $request -> input('name');
				$timeline->description = $request -> input('description');
				$timeline->last_modified_by = $user->id;
				
				$timeline->save();
				
				
				// Delete events
				for ($e = 0; $e < count($timeline_events); $e++) {
					if($request -> input('delete_event'.$e) == 'true' ) {
						
						\DB::table('character_event')
							->where('event_id', '=', $timeline_events[$e]->id)
							->delete();
							
						\DB::table('event_location')
							->where('event_id', '=', $timeline_events[$e]->id)
							->delete();
						
						$event = \App\Event::where('id', '=', $timeline_events[$e]->id)->first();
						
						if($event) {
							$event->delete();
						}
					}
				}
				
				
				// Return success message
				return view('timelines.editTimeline')
					->with('showForm', 'false')
					->with('timeline', $timeline);
			}
    }
}
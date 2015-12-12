<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimelinesController extends Controller {

    /**
    * List all timelines /
    */
    public function listTimelines() {
        return "List Timelines";
    }
	
	/**
    * Show timeline /
    */
    public function showTimeline($timeline_id) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first(); 
			
		$timeline_events = array();
		foreach($timeline->event as $event) {
			$timeline_events[] = $event;
		}


        return view('timelines.showTimeline')
			->with('timeline', $timeline)
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
			
			$timeline = new \App\Timeline();

			$timeline->name = $request -> input('name');
			$timeline->description = $request -> input('description');

			$timeline->save();

			return view('timelines.newTimeline')
				->with('showForm', 'false')
				->with('timeline', $timeline);
		}
    }

    /**
    * Edit timeline /
    */
    public function editTimeline($timeline_id, Request $request) {
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first(); 
			
		$timeline_events = array();
		foreach($timeline->event as $event) {
			$timeline_events[] = $event;
		}
		
        if ($request -> input('showForm') == 'true') {
				return view('timelines.editTimeline')
					->with('showForm', 'true')
					->with('timeline', $timeline)
					->with('timeline_events', $timeline_events);
			} else { // Else submit form	
				$timeline->name = $request -> input('name');
				$timeline->description = $request -> input('description');
				
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
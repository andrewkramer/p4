<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
    public function newTimeline() {
        return "New Timeline";
    }

    /**
    * Edit timeline /
    */
    public function editTimeline($timeline_id) {
        return "Edit Timeline " . $timeline_id;
    }
}
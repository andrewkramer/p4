<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EventsController extends Controller {

    /**
    * List all Events /
    */
    public function listEvents() {
        return "List Events";
    }
	
	/**
    * Show Event /
    */
    public function showEvent($timeline_id, $event_id) {
        $event = \App\Event::where('id', '=', $event_id)
			->first(); 
			
		$event_characters = array();
		foreach($event->characters as $character) {
			$event_characters[] = $character;
		}
		
		$event_locations = array();
		foreach($event->locations as $location) {
			$event_locations[] = $location;
		}
		

		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();


        return view('events.showEvent')
			->with('event', $event)
			->with('event_characters', $event_characters)
			->with('event_locations', $event_locations)
			->with('timeline', $timeline);
    }
	
	/**
    * Create a new Event /
    */
    public function newEvent() {
        return "New Event";
    }

    /**
    * Edit Location /
    */
    public function editEvent($timeline_id, $event_id) {
        return "Edit Event " . $event_id . " from timeline " . $timeline_id;
    }
}
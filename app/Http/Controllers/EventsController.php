<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function newEvent($timeline_id, Request $request) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
		
		if ($request -> input('showForm') == 'true') {
			$characters = \App\Character::where('timeline_id', '=', $timeline_id)
				->orderBy('name')
				->get(); 
				
			$locations = \App\Location::where('timeline_id', '=', $timeline_id)
				->orderBy('name')
				->get(); 
				
			return view('events.newEvent')
				->with('showForm', 'true')
				->with('characters', $characters)
				->with('locations', $locations)
				->with('timeline', $timeline);
		} else {
			#if ( \Auth::check() ) {
			#	$user = \Auth::user();
				$event = new \App\Event();

				$event->name = $request -> input('name');
				$event->start_date = $request -> input('start_date');
				$event->end_date = $request -> input('end_date');
				$event->description = $request -> input('description');
				$event->timeline_id = $timeline_id;
			#	$event->created_by = $user -> name;

				$event->save();
				
				# Attach Characters to the event
				for ($i=1; $i<5; $i++) {
					$character_input = $request -> input('character'.$i);
					if ($character_input != 'Choose a Character') {
							$character = \App\Character::where('name','LIKE',$character_input)->first();
							$event->characters()->save($character);
					}
				}
				
				# Attach Locations to the event
				for ($i=1; $i<3; $i++) {
					$location_input = $request -> input('location'.$i);
					if ($location_input != 'Choose a Location') {
							$location = \App\Location::where('name','LIKE',$location_input)->first();
							$event->locations()->save($location);
					}
				}

				return view('events.newEvent')
					->with('showForm', 'false')
					->with('event', $event)
					->with('timeline', $timeline);
			#} else {
			#		return 'Access Denied';
			#}
		}
    }

    /**
    * Edit Location /
    */
    public function editEvent($timeline_id, $event_id, Request $request) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
			
		$event = \App\Event::where('id', '=', $event_id)
			->first();
		
		if ($event) {
			
			if ($request -> input('showForm') == 'true') {
				return view('events.editEvent')
					->with('showForm', 'true')
					->with('event', $event)
					->with('timeline', $timeline);
			} else {	
				
					$event->name = $request -> input('name');
					$event->start_date = $request -> input('start_date');
					$event->end_date = $request -> input('end_date');
					$event->description = $request -> input('description');

					$event->save();

					return view('events.editEvent')
						->with('showForm', 'false')
						->with('event', $event)
						->with('timeline', $timeline);
				
			}
		} else {
			return "Update failed. Event does not exist.";
		}
    }
}
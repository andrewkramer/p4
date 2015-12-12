<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventsController extends Controller {

	
	/**
    * Show Event /
    */
    public function showEvent($timeline_id, $event_id) {
        $event = \App\Event::where('id', '=', $event_id)
			->first();
		$created_by = \App\User::where('id', '=', $event->created_by)
			->first();
		$last_modified_by = \App\User::where('id', '=', $event->last_modified_by)
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
			->with('created_by', $created_by)
			->with('last_modified_by', $last_modified_by)
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
			if ( \Auth::check() ) {
				$user = \Auth::user();
				$event = new \App\Event();

				$event->name = $request -> input('name');
				$event->start_date = $request -> input('start_date');
				$event->end_date = $request -> input('end_date');
				$event->description = $request -> input('description');
				$event->timeline_id = $timeline_id;
				$event->created_by = $user->id;
				$event->last_modified_by = $user->id;

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
			} else {
					return 'Access Denied';
			}
		}
    }

    /**
    * Edit Location /
    */
    public function editEvent($timeline_id, $event_id, Request $request) {
		// Try to get event
		$event = \App\Event::where('id', '=', $event_id)
			->first();
		
		// If event exists, continue
		if ($event) {
			
			$timeline = \App\Timeline::where('id', '=', $timeline_id)
				->first();
			
			$event_characters = array();
			foreach($event->characters as $character) {
				$event_characters[] = $character;
			}
			
			$event_locations = array();
			foreach($event->locations as $location) {
				$event_locations[] = $location;
			}
			
			$characters = \App\Character::where('timeline_id', '=', $timeline_id)
				->orderBy('name')
				->get(); 
				
			$locations = \App\Location::where('timeline_id', '=', $timeline_id)
				->orderBy('name')
				->get(); 
			
			// If form has not been submitted, show form
			if ($request -> input('showForm') == 'true') {
				return view('events.editEvent')
					->with('showForm', 'true')
					->with('event', $event)
					->with('event_characters', $event_characters)
					->with('event_locations', $event_locations)
					->with('characters', $characters)
					->with('locations', $locations)
					->with('timeline', $timeline);
			} else { // Else submit form	
					$user = \Auth::user();
				
					$event->name = $request -> input('name');
					$event->start_date = $request -> input('start_date');
					$event->end_date = $request -> input('end_date');
					$event->description = $request -> input('description');
					$event->last_modified_by = $user->id;
					
					$event->save();
					
					// Edit existing locations
					for ($l = 0; $l < count($event_locations); $l++) {
						
						$location = \DB::table('event_location')
							->where('location_id', '=', $request -> input('location_id'.$l))
							->where('event_id', '=', $event_id)
							->first();
						
						if($location) {
							if($request -> input('location'.$l) == '--Delete Location--') {
								\DB::table('event_location')
									->where('location_id', '=', $request -> input('location_id'.$l))
									->where('event_id', '=', $event_id)
									->delete();
							} else { 
								$location_name = \App\Location::where('name', '=', $request -> input('location'.$l))
									->first();
							
								\DB::table('event_location')
									->where('location_id', '=', $request -> input('location_id'.$l))
									->where('event_id', '=', $event_id)
									->update(['location_id' => $location_name->id]);
							}
						}
					}
					
					// Add new location to database
					$location_input = $request -> input('location_new');
					if ($location_input != 'Choose a Location') {
							$location = \App\Location::where('name','LIKE',$location_input)->first();
							$event->locations()->save($location);
					}
					
					
					
					
					// Edit existing characters
					for ($c = 0; $c < count($event_characters); $c++) {
						
						$character = \DB::table('character_event')
							->where('character_id', '=', $request -> input('character_id'.$c))
							->where('event_id', '=', $event_id)
							->first();
						
						if($character) {
							if($request -> input('character'.$c) == '--Delete Character--') {
								\DB::table('character_event')
									->where('character_id', '=', $request -> input('character_id'.$c))
									->where('event_id', '=', $event_id)
									->delete();
							} else { 
								$character_name = \App\Character::where('name', '=', $request -> input('character'.$c))
									->first();
							
								\DB::table('character_event')
									->where('character_id', '=', $request -> input('character_id'.$c))
									->where('event_id', '=', $event_id)
									->update(['character_id' => $character_name->id]);
							}
						}
					}
					
					// Add new character to database
					$character_input = $request -> input('character_new');
					if ($character_input != 'Choose a Character') {
							$character = \App\Character::where('name','LIKE',$character_input)->first();
							$event->characters()->save($character);
					}

					// Return success message
					return view('events.editEvent')
						->with('showForm', 'false')
						->with('event', $event)
						->with('timeline', $timeline);
				
			}
		} else { // Else fail
			return "Update failed. Event does not exist.";
		}
    }
}
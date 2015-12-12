<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationsController extends Controller {

    /**
    * List all Locations /
    */
    public function listLocations($timeline_id) {
        $locations = \App\Location::where('timeline_id', '=', $timeline_id)
			->orderBy('name')
			->get(); 
			
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();

        return view('locations.listLocations')
			->with('locations', $locations)
			->with('timeline', $timeline);
    }
	
	/**
    * Show Location /
    */
    public function showLocation($timeline_id, $location_id) {
        $location = \App\Location::where('id', '=', $location_id)
			->first(); 
			
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();

        return view('locations.showLocation')
			->with('location', $location)
			->with('timeline', $timeline);
    }
	
	/**
    * Create a new Location /
    */
    public function newLocation($timeline_id, Request $request) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
		
		if ($request -> input('showForm') == 'true') {
			return view('locations.newLocation')
				->with('showForm', 'true')
				->with('timeline', $timeline);
		} else {
			if ( \Auth::check() ) {
				$location = new \App\Location();
				$user = \Auth::user();

				$location->name = $request -> input('name');
				$location->description = $request -> input('description');
				$location->timeline_id = $timeline_id;
				$location->created_by = $user->id;
				$location->last_modified_by = $user->id;

				$location->save();

				return view('locations.newLocation')
					->with('showForm', 'false')
					->with('location', $location)
					->with('timeline', $timeline);
			} else {
					return 'Access Denied';
			}
		}
    }

    /**
    * Edit Location /
    */
    public function editLocation($timeline_id, $location_id, Request $request) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
			
		$location = \App\Location::where('id', '=', $location_id)
			->first();
		
		if ($location) {
			
			if ($request -> input('showForm') == 'true') {
				return view('locations.editLocation')
					->with('showForm', 'true')
					->with('location', $location)
					->with('timeline', $timeline);
			} else {	
				
					$location->name = $request -> input('name');
					$location->description = $request -> input('description');

					$location->save();

					return view('locations.editLocation')
						->with('showForm', 'false')
						->with('location', $location)
						->with('timeline', $timeline);
				
			}
		} else {
			return "Update failed. Location does not exist.";
		}
    }
}
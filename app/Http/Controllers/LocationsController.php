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
			
			$location = new \App\Location();

			$location->name = $request -> input('name');
			$location->description = $request -> input('description');
			$location->timeline_id = $timeline_id;

			$location->save();

			return view('locations.newLocation')
				->with('showForm', 'false')
				->with('location', $location)
				->with('timeline', $timeline);
		}
    }

    /**
    * Edit Location /
    */
    public function editLocation($timeline_id, $location_id) {
        return "Edit Location " . $location_id . " from timeline " . $timeline_id;
    }
}
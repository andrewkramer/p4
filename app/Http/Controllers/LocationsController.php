<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
    public function newLocation() {
        return "New Location";
    }

    /**
    * Edit Location /
    */
    public function editLocation($timeline_id, $location_id) {
        return "Edit Location " . $location_id . " from timeline " . $timeline_id;
    }
}
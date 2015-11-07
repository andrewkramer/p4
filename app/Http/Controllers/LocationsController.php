<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LocationsController extends Controller {

    /**
    * List all Locations /
    */
    public function listLocations() {
        return "List Locations";
    }
	
	/**
    * Show Location /
    */
    public function showLocation($timeline_id, $location_id) {
        return "Location " . $location_id . " from timeline " . $timeline_id;
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
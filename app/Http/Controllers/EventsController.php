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
        return "Event " . $event_id . " from timeline " . $timeline_id;
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
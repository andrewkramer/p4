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
        return "Timeline " . $timeline_id;
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
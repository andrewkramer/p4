<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RootController extends Controller {

    /**
    * Responds to requests to GET /
    */
    public function showHome() {
		
		$timelineList = "<ul>"; // string to hold html containing the list of all timelines
		
		$timelines = \App\Timeline::all();
		
		foreach($timelines as $timeline) {
			$timelineList = $timelineList . "<li><a href='/timelines/" . $timeline['id'] . "'>" . $timeline['name'] . "</a></li>";
		}
		
		$timelineList = $timelineList . "</ul>";

        return view('root.showHome')->with('timelines', $timelines);
    }
}
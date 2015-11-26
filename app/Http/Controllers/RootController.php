<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class RootController extends Controller {

    /**
    * Responds to requests to GET /
    */
    public function showHome() {
		
		$timelines = \App\Timeline::all();

        return view('root.showHome')->with('timelines', $timelines);
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CharactersController extends Controller {

    /**
    * List all characters /
    */
    public function listCharacters($timeline_id) {
        $characters = \App\Character::where('timeline_id', '=', $timeline_id)
			->orderBy('name')
			->get(); 
			
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();

        return view('characters.listCharacters')
			->with('characters', $characters)
			->with('timeline', $timeline);
    }
	
	/**
    * Show character /
    */
    public function showCharacter($timeline_id, $character_id) {
        $character = \App\Character::where('id', '=', $character_id)
			->first(); 
			
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();

        return view('characters.showCharacter')
			->with('character', $character)
			->with('timeline', $timeline);
    }
	
	/**
    * Create a new character /
    */
    public function newCharacter($timeline_id, Request $request) {
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
		
		if ($request -> input('showForm') == 'true') {
			return view('characters.newCharacter')
				->with('showForm', 'true')
				->with('timeline', $timeline);
		} else {
			
			$character = new \App\Character();

			$character->name = $request -> input('name');
			$character->race = $request -> input('race');
			$character->biography = $request -> input('biography');
			$character->timeline_id = $timeline_id;

			$character->save();

			return view('characters.newCharacter')
				->with('showForm', 'false')
				->with('character', $character)
				->with('timeline', $timeline);
		}
    }

    /**
    * Edit character /
    */
    public function editCharacter($timeline_id, $character_id) {
        return "Edit Character " . $character_id . " from timeline " . $timeline_id;
    }
}
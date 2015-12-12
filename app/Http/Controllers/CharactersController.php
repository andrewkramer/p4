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
		$created_by = \App\User::where('id', '=', $character->created_by)
			->first();
		$last_modified_by = \App\User::where('id', '=', $character->last_modified_by)
			->first();
			
		$timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();

        return view('characters.showCharacter')
			->with('character', $character)
			->with('created_by', $created_by)
			->with('last_modified_by', $last_modified_by)
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
			if ( \Auth::check() ) {
				// Validate the request data
				$this->validate($request, [
					'name' => 'required',
				]);
				
				$character = new \App\Character();
				$user = \Auth::user();

				$character->name = $request -> input('name');
				$character->race = $request -> input('race');
				$character->biography = $request -> input('biography');
				$character->timeline_id = $timeline_id;
				$character->created_by = $user->id;
				$character->last_modified_by = $user->id;

				$character->save();

				return view('characters.newCharacter')
					->with('showForm', 'false')
					->with('character', $character)
					->with('timeline', $timeline);
			} else {
					return 'Access Denied';
			}
		}
    }

    /**
    * Edit character /
    */
    public function editCharacter($timeline_id, $character_id, Request $request) {
        $timeline = \App\Timeline::where('id', '=', $timeline_id)
			->first();
			
		$character = \App\Character::where('id', '=', $character_id)
			->first();
		
		if ($character) {
			
			if ($request -> input('showForm') == 'true') {
				return view('characters.editCharacter')
					->with('showForm', 'true')
					->with('character', $character)
					->with('timeline', $timeline);
			} else {
				// Validate the request data
				$this->validate($request, [
					'name' => 'required',
				]);
			
				$user = \Auth::user();
				
				$character->name = $request -> input('name');
				$character->race = $request -> input('race');
				$character->biography = $request -> input('biography');
				$character->last_modified_by = $user->id;

				$character->save();

				return view('characters.editCharacter')
					->with('showForm', 'false')
					->with('character', $character)
					->with('timeline', $timeline);
				
			}
		} else {
			return "Update failed. Character does not exist.";
		}
    }
}
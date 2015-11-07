<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class CharactersController extends Controller {

    /**
    * List all characters /
    */
    public function listCharacters() {
        return "List Characters";
    }
	
	/**
    * Show character /
    */
    public function showCharacter($timeline_id, $character_id) {
        return "Character " . $character_id . " from timeline " . $timeline_id;
    }
	
	/**
    * Create a new character /
    */
    public function newCharacter() {
        return "New Character";
    }

    /**
    * Edit character /
    */
    public function editCharacter($timeline_id, $character_id) {
        return "Edit Character " . $character_id . " from timeline " . $timeline_id;
    }
}
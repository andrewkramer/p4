<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class UsersController extends Controller {

    /**
    * List all users /
    */
    public function listUsers() {
        return "List Users";
    }
	
	/**
    * Show user's profile /
    */
    public function showUser($user_id) {
        return "User " . $user_id;
    }
	
	/**
    * Create a new user /
    */
    public function newUser() {
        return "New User";
    }

    /**
    * Edit user's profile /
    */
    public function editUser($user_id) {
        return "Edit User " . $user_id;
    }
}
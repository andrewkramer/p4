<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    public function character() {
        # Timeline has many Characters
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Character');
    }
	
	public function location() {
        # Timeline has many Locations
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Location');
    }
	
	public function event() {
        # Timeline has many Events
        # Define a one-to-many relationship.
        return $this->hasMany('\App\Event');
    }
}

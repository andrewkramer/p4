<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function timeline() {
        # Character belongs to Timeline
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Timeline');
    }
	
	public function characters() {
		return $this->belongsToMany('\App\Character')->withTimestamps();
	}
	
	public function locations() {
		return $this->belongsToMany('\App\Location')->withTimestamps();
	}
}

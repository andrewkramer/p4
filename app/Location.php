<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function timeline() {
        # Location belongs to Timeline
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Timeline');
    }
	
	public function events() {
		return $this->belongsToMany('\App\Event')->withTimestamps();
	}
}

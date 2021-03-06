<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function timeline() {
        # Character belongs to Timeline
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Timeline');
    }
	
	public function events()
	{
		# With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
		return $this->belongsToMany('\App\Event')->withTimestamps();
	}
}

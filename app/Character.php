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
}

<?php

namespace App\Models;
use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    use UsesUUID;
	
	public function organisation()
    {
        return $this->belongsTo('App\Organisation')->withDefault();
    }
}

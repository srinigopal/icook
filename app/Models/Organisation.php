<?php

namespace App\Models;

use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use UsesUUID;
	
	 public function users()
    {
        return $this->belongsToMany(User::class, 'pivot_organisation_users');
    }
}

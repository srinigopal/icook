<?php

namespace App\Models;
use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
        use UsesUUID;
		
		
	public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model {

	protected $table = 'settings_user';

	public function user() {
		return $this->belongsTo(User::class);
	}

}
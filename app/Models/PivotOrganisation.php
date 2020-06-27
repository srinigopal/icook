<?php

namespace App\Models;

use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class PivotOrganisation extends Model
{
      protected $table = 'pivot_organisation_users';
	  public $timestamps = false;


}

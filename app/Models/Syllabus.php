<?php

namespace App\Models;
use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Syllabus extends Model implements HasMedia
{
	
          use UsesUUID,InteractsWithMedia;
		
		    protected $table = 'syllabus';


}

<?php

namespace App\Models;
use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Food extends Model implements HasMedia
{
	use InteractsWithMedia;	
    use UsesUUID;
   protected  $table='foods';
   
   public function organisation()
    {
        return $this->belongsTo('App\Organisation')->withDefault();
    }
	
	 public function attribute()
    {
        return $this->hasMany(Attribute::class, 'food_id');
    }
}

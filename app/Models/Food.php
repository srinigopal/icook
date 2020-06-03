<?php

namespace App\Models;
use App\Traits\System\UsesUUID;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
   use UsesUUID;
   protected  $table='foods';
   
   public function organisation()
    {
        return $this->belongsTo('App\Organisation')->withDefault();
    }
}

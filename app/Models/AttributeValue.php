<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\System\UsesUUID;
class AttributeValue extends Model
{
	  use UsesUUID;
    /**
     * @var string
     */
    protected $table = 'attribute_values';

    /**
     * @var array
     */
    protected $fillable = [
        'attribute_id', 'value', 'price','organisation_id'
    ];

   

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
   
}

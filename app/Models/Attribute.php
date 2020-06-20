<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\System\UsesUUID;
/**
 * Class Attribute
 * @package App\Models
 */
class Attribute extends Model
{
	  use UsesUUID;
    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @var array
     */
    protected $fillable = [
        'code', 'name','organisation_id ','food_id', 'frontend_type', 'is_filterable', 'is_required'
    ];

    /**
     * @var array
     */
    protected $casts  = [
        'is_filterable' =>  'boolean',
        'is_required'   =>  'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class);
    }
}

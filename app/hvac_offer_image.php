<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hvac_offer_image extends Model
{
    protected $table ="hvac_offer_image";

    protected $fillable = ['id','comment_id','created_at','updated_at','name','extension','path'];
}

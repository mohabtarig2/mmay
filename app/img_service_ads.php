<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class img_service_ads extends Model
{
    protected $table = "image_service_ads";
    protected $fillable = ['id','ads_id','name','path','created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stone_offer_image extends Model
{
    protected $table ="stone_offer_image";

    protected $fillable = ['id','comment_id','created_at','updated_at','name','extension','path'];
}

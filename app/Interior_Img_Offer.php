<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interior_Img_Offer extends Model
{
    protected $table ="Interior_Img_Offer";

    protected $fillable = ['id','comment_id','created_at','updated_at','name','extension','path'];
}

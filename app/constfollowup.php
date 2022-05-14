<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class constfollowup extends Model
{
    protected $table ="constfollowup";
    protected $fillable = ['id','name','path','date','offer_id','created_at','updated_at'];
}

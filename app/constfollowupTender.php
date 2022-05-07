<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class constfollowupTender extends Model
{
    protected $table ="constfollowuptender";
    protected $fillable = ['id','name','path','date','offer_id','created_at','updated_at'];
}

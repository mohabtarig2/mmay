<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stoneimg extends Model
{
    protected $table ='stoneimg';
    protected $fillable =['id','tender_id','extension','path','name','created_at','updated_at'];
}

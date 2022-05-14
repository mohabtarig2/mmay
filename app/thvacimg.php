<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thvacimg extends Model
{
    protected $table ='thvacimg';
    protected $fillable =['id','tender_id','extension','path','name','created_at','updated_at'];
}

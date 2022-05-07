<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tconsl_img extends Model
{

    protected $table = 'tconsl_img';
    protected $fillable = ['id','tender_id','name','path','created_at','updated_at'];

}

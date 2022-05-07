<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderFrom extends Model
{
    protected $table = 'tenderfrom';
    protected $fillable = ['id','tender_id','request_id','type','converterType','created_at','updated_at'];
}

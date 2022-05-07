<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reason_rejected_tender extends Model
{
    protected $table = "reason_rejected_tender";
    protected $fillable = ['id','reason','type','tender_id','created_at','updated_at'];
}

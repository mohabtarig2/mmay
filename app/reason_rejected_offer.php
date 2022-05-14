<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reason_rejected_offer extends Model
{
    protected $table = "reason_rejected_offer";
    protected $fillable = ['id','reason','offer_id','created_at','updated_at'];
}

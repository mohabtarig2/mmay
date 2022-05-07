<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class constructionadditionalfiles extends Model
{
    protected $table='constructionadditionalfiles';
    protected $fillable=['id','AdditionalPath','AdditionalName','tender_id','created_at','updated_at'];
}



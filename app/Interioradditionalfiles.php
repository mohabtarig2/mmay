<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interioradditionalfiles extends Model
{
    protected $table='Interioradditionalfiles';
    protected $fillable=['id','AdditionalPath','AdditionalName','tender_id','created_at','updated_at'];
}

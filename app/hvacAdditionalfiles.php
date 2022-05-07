<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hvacAdditionalfiles extends Model
{

        protected $table='hvacAdditionalfiles';
        protected $fillable=['id','AdditionalPath','AdditionalName','tender_id','created_at','updated_at'];

}

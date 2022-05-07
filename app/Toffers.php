<?php

namespace App;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Model;

class Toffers extends Model
{
    protected $table = "toffers";

    protected $fillble = ['id','com_id','tender_id','comment','Supervisor','design','created_at','updated_at','name','path',
    'Consultant_fee','conditioning','gypsum','electric_pendants','Bedroom_wardrobes',
    'Kitchen_Cabinets','the_elevator','pelvis','interior_decoration','garden_design','the_fence'
    ,'budget','TotalAreaBuild',
    'faced_name','faced_path',
    'dis_name','dis_path',
];


public function constfollowup(){
  return   $this->hasMany('App\constfollowupTender','offer_id');
}
    public function user(){
        return $this->belongsTo('App\user','com_id');
    }
    public function images(){
        return $this->hasMany('App\tclfile','consl_id');
    }

    public function request_tender(){
        return $this->hasOne('App\request_tender','consl_id');
    }


    public function tender(){
        return $this->belongsTo('App\Tconsulte','tender_id');
    }

    public function contractsConsrcution(){
        return   $this->hasOne('App\contractsConsrcutiontender','offer_id');
      }
      public function contractsStone(){
        return   $this->hasOne('App\contractsstonetender','offer_id');
      }
      public function contractsHvac(){
        return   $this->hasOne('App\contractshvactender','offer_id');
      }
      public function contractsInterior(){
        return   $this->hasOne('App\contractsinteriortender','offer_id');
      }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer_villa extends Model
{
    protected $table='offer_villa';
    protected $fillable=[
        'id','design','supervison','sqft',
        'budget','request_id','eng_id',
    'created_at','updated_at','agree'
    
];

public function contract(){
    return   $this->hasOne('App\contract','offer_id');
  }


  
  public function constfollowup(){
    return   $this->hasMany('App\constfollowup','offer_id');
  }
  public function contractsConsrcution(){
    return   $this->hasOne('App\contractsConsrcution','offer_id');
  }
  public function contractsStone(){
    return   $this->hasOne('App\contractsStone','offer_id');
  }
  public function contractsHvac(){
    return   $this->hasOne('App\contractsHvac','offer_id');
  }
  public function contractsInterior(){
    return   $this->hasOne('App\contractsInterior','offer_id');
  }
  public function offersfiles(){
    return   $this->hasOne('App\offersvillafiles','offer_id');
  }



  
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offerconsr extends Model
{
    protected $table='offerconsr';
    protected $fillable=['id','textOffer','items','Approval',
    'created_at','updated_at',
    'com_id','construction_id','Consultant_fee',
    'conditioning','Bedroom_wardrobes','Kitchen_Cabinets',
    'the_elevator','pelvis','interior_decoration',
    'garden_design','the_fence','vat'
];


    public function tender(){
      return   $this->belongsTo('App\Tconstr','construction_id');
    }

    public function user(){
        return   $this->belongsTo('App\User','com_id');
      }

      public function request_tender(){
        return   $this->hasOne('App\request_tender','offer_id');
      }
      public function image(){
        return   $this->hasMany('App\cons_offer_image','comment_id');
      }
}







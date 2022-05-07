<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offerInterior extends Model
{
    protected $table='offerinterior';
    protected $fillable=['id','textOffer','items',
    'Approval','created_at','updated_at','com_id','tender_id'];


    public function tender(){
      return   $this->belongsTo('App\Tinterior','tender_id');
    }

    public function user(){
        return   $this->belongsTo('App\User','com_id');
      }

      public function request_tender(){
        return   $this->hasOne('App\request_tender','offer_id');
      }
      public function image(){
        return   $this->hasMany('App\Interior_Img_Offer','comment_id');
      }
}

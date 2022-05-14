<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hvac extends Model
{
    protected $table = 'hvac';
    protected $fillable = ['id','created_at','updated_at','title','notes','emirates','user_id','stage','status','company_name','reaject_reason'];


    public function tcimg(){

        return $this->hasMany('App\thvacimg','tender_id','id');
    }

    public function user(){
        return   $this->belongsTo('App\User','user_id');
      }



    // public function offerConsr(){

    //     return $this->hasMany('App\offerConsr','construction_id');
    // }


    public function HvacFiles(){

        return $this->hasOne('App\HvacFiles','tender_id');
    }

}

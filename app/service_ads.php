<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service_ads extends Model
{
    protected $table='service_ads';
    protected $fillable =['id','title','description','emirates','user_id','status','type','TypeServices','created_at','updated_at'];



    public function company(){

        return $this->belongsTo('App\user','user_id');

    }
    public function image(){

        return $this->hasMany('App\img_service_ads','ads_id');

    }
    public function review(){

        return $this->hasMany('App\review_ads','ads_id');
    }
}

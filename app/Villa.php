<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
 use App\offer_villa_img;

class Villa extends Model
{
    protected $fillable = [
        'id','Description', 'Emirates', 'Date','title','type_villa','confirmed','c_id','time','price','rooms','floors',
        'Service_room_placement','Consultant_fee','conditioning','gypsum','electric_pendants','Bedroom_wardrobes','Kitchen_Cabinets'
        ,'the_elevator','pelvis','interior_decoration','garden_design','the_fence','room_master'
        ,'majlis','bathroom','dining','kitchen','Service_room_placement','ads','sqft','living_room',
        'Phone','Name_eng','supervision','design','tab','CostGov','tabCost'
    ];



    public function villaImage(){

        return $this->hasMany('App\offer_villa_img','img_villa_id');

    }
    public function Company(){

        return $this->hasMany('App\User','id','c_id');

    }

    public function reason(){

        return $this->hasMany('App\reason_rejected_offer','offer_id');

    }
    public function savedVilla(){

        return $this->hasOne('App\saved','villa_id');
    }

    public function review(){

        return $this->hasmany('App\VillaReview','villa_id');
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stone extends Model
{
    protected $table = 'stone';
    protected $fillable = ['id','created_at','updated_at','title','notes','emirates','user_id','stage','status','company_name'];


    public function tcimg(){

        return $this->hasMany('App\stoneimg','tender_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    // public function offerConsr(){

    //     return $this->hasMany('App\offerConsr','construction_id');
    // }


    public function StoneFiles(){

        return $this->hasOne('App\StoneFiles','tender_id');
    }

}

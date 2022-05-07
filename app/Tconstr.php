<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tconstr extends Model
{
    protected $table = 'tconstr';
    protected $fillable = ['id','created_at','updated_at','title','notes','emirates','user_id','stage','status','company_name','reason_reject'];




    public function Tcimg(){

        return $this->hasMany('App\tcimg','construction_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function offerConsr(){

        return $this->hasMany('App\offerconsr','construction_id');
    }

    public function posterTender(){

        return $this->hasMany('App\tenderfromtender','construction_id');
    }
    public function AdditionalFile(){

        return $this->hasMany('App\constructionadditionalfiles','tender_id');
    }
    public function ConstructionFiles(){

        return $this->hasOne('App\ConstructionFiles','tender_id');
    }
    
    

}


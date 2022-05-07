<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinterior extends Model
{
    
    protected $table = 'tinterior';
    protected $fillable = ['id','created_at','updated_at','title','notes','emirates',
    'user_id','stage','status','company_name','reason_reject'];




    // public function Tcimg(){

    //     return $this->hasMany('App\tcimg','construction_id');
    // }

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function offerInterior(){

        return $this->hasMany('App\offerConsr','construction_id');
    }

    public function AdditionalFile(){

        return $this->hasMany('App\Interioradditionalfiles','tender_id');
    }
    public function InteriorFiles(){

        return $this->hasOne('App\InteriorFiles','tender_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saved extends Model
{
    protected $table ="saved";

    protected $fillable = ['id','user_id','villa_id','created_at','updated_at'];



    public function savedVilla(){

        return $this->hasMany('App\Villa','id','villa_id');
    }
}

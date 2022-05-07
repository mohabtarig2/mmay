<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tenderfromtender extends Model
{
    protected $table = 'tenderfromtender';
    protected $fillable = ['id','tender_id','request_id','type','converterType','created_at','updated_at'];



    public function review(){

        return $this->hasOne('App\ReviewTypes','request_id');
        }

        public function ReviewTender(){

            return $this->hasOne('App\ReviewTender','request_id');
            }
        public function HasContsr(){

            return $this->hasOne('App\Tconstr','id','tender_id');
        }
}

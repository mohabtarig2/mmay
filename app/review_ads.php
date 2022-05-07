<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review_ads extends Model
{
    protected $table ="review_ads";
    protected $fillable = [
        'id', 'rating','content','ads_id','user_id','type','created_at','updated_at'
    ];

  function user(){
        return   $this->belongsTo('App\User','user_id');
      }

}

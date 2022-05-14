<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewTender extends Model
{
    protected $table ="reviewtender";
    protected $fillable = [
        'id', 'rating','content','type','request_id','user_id','com_id','created_at','updated_at','from'
    ];

    public function company(){
        return   $this->belongsTo('App\User','com_id');
      }
      public function user(){
        return   $this->belongsTo('App\User','user_id');
      }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VillaReview extends Model
{
    protected $table ="villareview";
    protected $fillable = [
        'id', 'rating','content','request_id','villa_id','user_id','created_at','updated_at'
    ];

    public function company(){
        return   $this->belongsTo('App\User','com_id');
      }
      public function user(){
        return   $this->belongsTo('App\User','user_id');
      }
}

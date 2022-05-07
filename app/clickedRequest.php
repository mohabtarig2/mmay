<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clickedRequest extends Model
{
    protected $table='clickedRequest';
    protected $fillable=['id','buyer_id','phone','request_id','seller_id','created_at','updated_at'];

}

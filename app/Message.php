<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // use HasFactory;
    protected $fillable = ['message','offer_id','type'];
    

    //Add the below function
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

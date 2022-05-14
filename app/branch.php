<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class branch extends Model
{

    protected $fillable = ['id','company_id','emirates','path','status'];



    public function company()
    {
        return $this->belongsTo('App\companies','company_id');
    }


}

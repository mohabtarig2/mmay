<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contract extends Model
{
    protected $table ="contracts";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','type','created_at','updated_at'];
}

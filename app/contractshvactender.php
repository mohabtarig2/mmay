<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractshvactender extends Model
{
    protected $table ="contractshvactender";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

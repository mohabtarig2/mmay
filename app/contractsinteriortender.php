<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsinteriortender extends Model
{
    protected $table ="contractsinteriortender";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

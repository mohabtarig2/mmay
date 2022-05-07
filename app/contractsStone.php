<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsStone extends Model
{
    protected $table ="contractsstone";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

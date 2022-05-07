<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsInterior extends Model
{
    protected $table ="contractsinterior";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

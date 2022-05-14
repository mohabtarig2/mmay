<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsHvac extends Model
{
    protected $table ="contractshvac";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsstonetender extends Model
{
    protected $table ="contractsstonetender";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

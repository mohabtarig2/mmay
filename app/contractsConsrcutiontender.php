<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsConsrcutiontender extends Model
{
    protected $table ="contractsconsrcutiontender";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

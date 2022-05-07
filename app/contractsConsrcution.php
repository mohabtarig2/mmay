<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contractsConsrcution extends Model
{
    protected $table ="contractsconsrcution";

    protected $fillable = ['id','ContractName','ContractPath','offer_id','created_at','updated_at'];
}

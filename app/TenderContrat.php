<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderContrat extends Model
{
    protected $table = 'tendercontrat';
    protected $fillable = ['id','ContractName','ContractPath','request_id','created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posted_project_tender extends Model
{
    protected $table = "posted_project_tender";
    protected $fillable = ['id','request_id','tender_id','type','created_at','updated_at'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offersvillafiles extends Model
{

    protected $table='offersvillafiles';
    protected $fillable=['
    id','ArchitectPath','ArchitectName',
    'StructurePath','StructureName',
    'threeDName','threeDPath',
     "servicesName","servicesPath",
     "ThreeDDWG", "ArchitectDWG",
     "StructureDWG", "SpecificationsEXCEL",
     "servicesDWG", 
    'SpecificationsPath','SpecificationsName','soil',
    'created_at','updated_at','offer_id'];






}

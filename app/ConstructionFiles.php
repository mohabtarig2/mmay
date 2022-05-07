<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConstructionFiles extends Model
{
    protected $table='constructionfiles';
    protected $fillable=['
    id','ArchitectPath','ArchitectName',
    'StructurePath','StructureName',
    'threeDName','threeDPath',
     "servicesName","servicesPath",
    'SpecificationsPath','SpecificationsName',
    'mapPath','mapName',
    'identityPath','identityName','ThreeDDWG','ArchitectDWG','StructureDWG','SpecificationsEXCEL','servicesDWG','soil',
    'created_at','updated_at','tender_id'];




}

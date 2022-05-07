<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InteriorFiles extends Model
{
    protected $table='interiorfiles';
    protected $fillable=['
    id','ArchitectPath','ArchitectName',
    'StructurePath','StructureName','threeDName','threeDPath','SpecificationsPath',
    'SpecificationsName','mapPath','mapName','identityPath',
    'ThreeDDWG','ArchitectDWG','StructureDWG','SpecificationsEXCEL','servicesDWG',
    'identityName','created_at','updated_at','tender_id'];
}

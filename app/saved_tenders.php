<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class saved_tenders extends Model
{
    protected $table ="saved_tenders";

    protected $fillable = ['id','com_id','title','notes','request_id','created_at','updated_at','submitted' ,'SumbittedID','Type'
    ,'threeDPath','threeDName'
    ,'ArchitectPath','ArchitectName'
    ,'StructurePath','StructureName'
    ,"servicesName","servicesPath"
    ,'SpecificationsPath','SpecificationsName'
    ,'mapPath','mapName'
    ,'identityPath','identityName',
    "ThreeDDWG", "ArchitectDWG",
     "StructureDWG", "SpecificationsEXCEL",
     "servicesDWG", 
];

public function company(){
    return   $this->belongsTo('App\User','com_id');
  }
}

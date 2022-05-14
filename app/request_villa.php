<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_villa extends Model
{
    protected $table='request_villa';
    protected $fillable=['id','user_id','ads_id','notes','status_project','notesstatus',
    'c_id','bank','shiekh','Program','other',
    'spicel_agent','created_at','updated_at',
    'passport_path','map_path',
    'phone','whatsapp',
    'Description','type_villa',
    'Emirates','price','room_mastar',
    'rooms','floors','majlis',
    'Consultant_fee','conditioning',
    'gypsum','electric_pendants',
    'Bedroom_wardrobes','Kitchen_Cabinets',
    'the_elevator','pelvis',
    'interior_decoration','garden_design',
    'bathroom','living_room',
    'dining','room_master',
    'kitchen','Service_room_placement',
    'sqft','stage','title',
    "finance",
    'Phone_eng','Name_eng','supervision','design','Isupdated','typeBuild','Provider','BankProvider','priceGrant'
  ];

 


    public function user(){
        return   $this->belongsTo('App\User','user_id');
      }
      public function Villa(){
        return   $this->belongsTo('App\Villa','ads_id');
      }
      public function company(){
        return   $this->belongsTo('App\User','c_id');
      }
      public function offer(){
        return   $this->hasOne('App\offer_villa','request_id');
      }
      public function converted(){
        return   $this->hasMany('App\TenderFrom','request_id');
      }
      public function review(){
        return   $this->hasOne('App\VillaReview','request_id');
      }

      public function ConstructionReview(){

        return $this->hasOne('App\ReviewTender','request_id');
        }
    public function HvacReview(){

            return $this->hasOne('App\ReviewTender','request_id');
     }

     public function StoneReview(){

        return $this->hasOne('App\ReviewTender','request_id');
 }
 public function InteriorReview(){

    return $this->hasOne('App\ReviewTender','request_id');
}
   

      

      
  
      

}

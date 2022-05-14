<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tconsulte extends Model
{
    protected $table = 'tconsult';

    protected $fillable = [
        'id', 'villa_type','floors','title','bedroom',
        'room_mastar','living_room',
        'majlis','kitchens','dining_room',
        'bathroom','position','min','max',
        'emirats','note','status','stage','user_id',
        'created_at','reason_reject','offer_id'
        ,'Consultant_fee','conditioning','gypsum','electric_pendants'
        ,'Bedroom_wardrobes','Kitchen_Cabinets','the_elevator','pelvis'
        ,'garden_design','the_fence','interior_decoration','price','finishing','crypt','villaShape','soil',
        'phone','whatsapp','priceGrant','Provider','BankProvider','finance','typeBuild','mapPath'
    ];
   



    public function AllOffers(){

        return $this->hasMany('App\Toffers','tender_id');
    }
    public function Toffer(){
        return $this->hasMany(Toffers::class);
    }
    public function image(){

        return $this->hasMany('App\tconsl_img','tender_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getDateEndAttribute($value){

          $end = new Carbon($value);
            return $end->diffForHumans();
        }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class request_tender extends Model
{

    protected $table='request_tender';
    protected $fillable=['id','tender_id','offer_id', 'type','created_at','updated_at',
    'reason_com','reason_user','status_project','notes',
                        'user_id','user_confirm','com_confirm','com_id'];


public function review(){

 return $this->hasOne('App\Review','request_id');
 }
    public function offerConsr(){

        return $this->belongsTo('App\offerconsr','offer_id');
    }


    public function offerHvac(){

        return $this->belongsTo('App\OfferHvac','offer_id');
    }
    public function offerStone(){

        return $this->belongsTo('App\OfferStone','offer_id');
    }
    public function toffers(){

        return $this->belongsTo('App\Toffers','offer_id');
    }
    public function tconsr(){

        return $this->belongsTo('App\Tconstr','tender_id');
    }
  
    public function hvac(){

        return $this->belongsTo('App\hvac','tender_id');
    }
    public function stone(){

        return $this->belongsTo('App\stone','tender_id');
    }
    public function Tconsulte(){

        return $this->belongsTo('App\Tconsulte','tender_id');
    }

    public function user(){

        return $this->belongsTo('App\User','user_id');
    }

    public function company(){

        return $this->belongsTo('App\User','com_id');
    }

    public function contract(){

        return $this->hasOne('App\TenderContrat','request_id');
    }


    public function saved_tenders(){

        return $this->hasMany('App\saved_tenders','request_id');
    }

    public function converted(){
        return   $this->hasMany('App\tenderfromtender','request_id');
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

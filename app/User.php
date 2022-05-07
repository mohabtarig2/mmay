<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mobile','expire','age','role_id','email_verified_at','avatar','country_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     *
            */


           // protected  $guard  ="admin";



           ############################  start relations ############################

           public function phone(){
               return $this->hasOne('App\Models\Phone','user_id');
           }

           public function company(){
            return $this->hasOne('App\Models\companies','user_id');
        }

        public function roles(){

            return $this->hasOne('App\role','id','role_id');
        }
        public function service_ads(){

            return $this->hasMany('App\service_ads','user_id');
        }

        public function Works(){

            return $this->hasMany('App\service_ads','user_id');
        }



        public function companyfile(){

            return $this->hasOne('App\CompanyFile','user_id');
        }

        public function achivementFile(){

            return $this->hasOne('App\achivement','user_id');
        }

        public function tenders(){

            return $this->hasMany('App\tconsulte','user_id');
        }

        public function OfferConsr(){

            return $this->hasMany('App\tconsulte','user_id');
        }

        public function Review(){

            return $this->hasMany('App\Review','com_id');
        }

        public function Villa(){

            return $this->hasMany('App\Villa','c_id');
        }

        public function branch(){

            return $this->hasMany('App\branch','company_id');
        }

        


        public function messages()
        {
            return $this->hasMany(Message::class);
        }    
           ############################  end relations ############################


       }

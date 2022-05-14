<?php

namespace App\Http\Controllers;

use App\review_ads;
use App\service_ads;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function company(Request $request){
        if($request->type=="consulting"){

            $user = User::where('role_id',1)->with('company')->limit($request->more)->get();
            $count = User::where('role_id',1)->count();

            return  response()->json([
                'count'=>$count,
                'user'=>$user,
                
                ]) ;

        }
        if($request->type=="construction"){

            $user = User::where('role_id',6)->with('company')->limit($request->more)->get();
            $count = User::where('role_id',6)->count();

            return  response()->json([
                'count'=>$count,
                'user'=>$user,
                
                ]) ;

        

            // $user = User::where('role_id',6)->with('company','service_ads')->inRandomOrder()->limit(8)->get();
            // return $user;

        }
        if($request->type=="hvac"){
            // return 'hi';

            $user = User::where('role_id',4)->with('company')->limit($request->more)->get();
            $count = User::where('role_id',4)->count();

            return  response()->json([
                'count'=>$count,
                'user'=>$user,
                
                ]) ;

        }
        if($request->type=="stone"){
            $user = User::where('role_id',3)->with('company')->limit($request->more)->get();
            $count = User::where('role_id',3)->count();

            return  response()->json([
                'count'=>$count,
                'user'=>$user,
                
                ]) ;


        }

        if($request->type=="interior"){

            $user = User::where('role_id',5)->with('company')->limit($request->more)->get();
            $count = User::where('role_id',5)->count();

            return  response()->json([
                'count'=>$count,
                'user'=>$user,
                
                ]) ;
            }

    }
    public function getTypeService(Request $request){

        if($request->type=="consulting"){

            $user = User::where('role_id',1)->with('company')->limit($request->more)->get();
            return $user;

        }
        if($request->type=="construction"){

           
            $ads = service_ads::where('type','construction')->with('company','image')->latest()->limit($request->more)->get();
            $count = service_ads::where('type','construction')->count();

             $user = User::where('role_id',6)->with('company','service_ads')->inRandomOrder()->limit(8)->get();
            // return $user;

            

            return  response()->json([
                'ads'=>$ads,
                'count'=>$count,
                'user'=>$user,
                
                ]) ;

            // $user = User::where('role_id',6)->with('company','service_ads')->inRandomOrder()->limit(8)->get();
            // return $user;

        }
        if($request->type=="hvac"){

            $user = User::where('role_id',4)->with('company','service_ads')->inRandomOrder()->limit(8)->get();
            // return $user;
            $count = service_ads::where('type','hvac')->count();
            $ads = service_ads::where('type','hvac')->with('company','image')->latest()->limit($request->more)->get();
            return  response()->json([
                'ads'=>$ads,
                'count'=>$count,
                'user'=>$user,
                
                ]) ;

        }
        if($request->type=="stone"){
            $ads = service_ads::where('type','stone')->with('company','image')->latest()->limit($request->more)->get();
            // return $ads;
            $count = service_ads::where('type','stone')->count();
            // return $count;

            $user = User::where('role_id',3)->with('company')->inRandomOrder()->limit(8)->get();
            // return $user;
            return  response()->json([
                'ads'=>$ads,
                'count'=>$count,
                'user'=>$user,
                
                ]) ;


        }

        if($request->type=="interior"){

            $ads = service_ads::where('type','interior')->with('company','image')->latest()->limit($request->more)->get();
            // return $ads;

            $count = service_ads::where('type','interior')->count();

            $user = User::where('role_id',5)->with('company')->inRandomOrder()->limit(8)->get();
            // return $user;
            return  response()->json([
                'ads'=>$ads,
                'count'=>$count,
                'user'=>$user,
                
                ]) ;
        }


    }
    public function AdsOfferCompany(Request $request){
        $type =  $request->type;
        $id =  $request->id;

        $review_ads = review_ads::where('ads_id',$id)->sum('rating');
        $reviewCalc = review_ads::where('ads_id',$id)->get();
        $Myview = review_ads::where('ads_id',$id)->where('user_id',Auth::id())->count();
        if($review_ads==0){
            $rating=0;
        }else{
            $rating =  $review_ads / count($reviewCalc) ;
        }
        
      
           
      

        $service_ads  =  service_ads::with('company.company','image','review.user')->where('id',$id)->where('type',$type)->get();   
        
        foreach($service_ads as $ads){
            $ads->setAttribute('rating',$rating);
            $ads->setAttribute('Myview',$Myview);
            $ads->setAttribute('CountReview',count($reviewCalc));

        }

        return $service_ads;
    }

    public function ProfileCompany(Request $request){

        if($request->type=="consulting"){

            $user = User::where('role_id',1)->with('company','companyfile','villa.villaImage','achivementFile','Review.user')-> 
             with(['branch'=>function($query){
                $query->where('status','1');
            }])
            ->where('id',$request->id)->get();
            return $user;

        }
        if($request->type=="construction"){

            $user = User::where('role_id',6)->with('company','companyfile','achivementFile','Review.user')-> 
            with(['branch'=>function($query){
                $query->where('status','1');
            }])->
             with(['service_ads'=>function($query){
                $query->where('TypeServices','1')->where('status',1)->with('image');
            }])->with(['Works'=>function($query){
                $query->where('TypeServices','2')->where('status',1)->with('image');
            }])->where('id',$request->id)->get();
            return $user;

        }
        if($request->type=="hvac"){
           
            $user = User::where('role_id',4)->with('company','companyfile','achivementFile','Review.user')-> 
            with(['branch'=>function($query){
                $query->where('status','1');
            }])->
             with(['service_ads'=>function($query){
                $query->where('TypeServices','1')->where('status',1)->with('image');
            }])->with(['Works'=>function($query){
                $query->where('TypeServices','2')->where('status',1)->with('image');
            }])->where('id',$request->id)->get();
            return $user;

        }
        if($request->type=="stone"){

            $user = User::where('role_id',3)->with('company','companyfile','achivementFile','Review.user')->
            with(['branch'=>function($query){
                $query->where('status','1');
            }])->
            with(['service_ads'=>function($query){
                $query->where('TypeServices','1')->where('status',1)->with('image');
            }])->with(['Works'=>function($query){
                $query->where('TypeServices','2')->where('status',1)->with('image');
            }])->where('id',$request->id)->get();
            return $user;

        }

        if($request->type=="interior"){

            $user = User::where('role_id',5)->with('company','companyfile','achivementFile','Review.user')->
            with(['branch'=>function($query){
                $query->where('status','1');
            }])->
            with(['service_ads'=>function($query){
                $query->where('TypeServices','1')->where('status',1)->with('image');
            }])->with(['Works'=>function($query){
                $query->where('TypeServices','2')->where('status',1)->with('image');
            }])->where('id',$request->id)->get();
           
            return $user;

        }
    }
}

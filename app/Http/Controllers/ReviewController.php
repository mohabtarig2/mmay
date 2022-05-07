<?php

namespace App\Http\Controllers;

use App\Events\reveiws;
use App\Models\admin;
use App\Notifications\NotifyReviews;
use App\request_tender;
use App\Review;
use App\review_ads;
use App\ReviewTender;
use App\User;
use App\VillaReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function reviewVilla(Request $request){



// return $request;
$id = Auth::id();
// return $request;
if($request->TypeRequest==1){
        $Review =  VillaReview::create([
             'content' => $request->content,
             'rating' => $request->rating,
             'request_id' => $request->request_id,
             'villa_id' => $request->villa_id,
             'user_id' => Auth::id(),
           
         ]);
 
         
        //  $user =  User::where('id',$Review->com_id)->get();
     
 
        //  broadcast(new reveiws($Review,$Review->user));
 
        //  $admins=admin::where('role_id',1)->get();
 
        //  $user =  User::where('id',$Review->com_id)->get();
        //  Notification::send($user, new NotifyReviews($Review,$Review->user));
        //  Notification::send($admins, new NotifyReviews($Review,$Review->user));
}

        if($request->TypeRequest==6){

            $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
            ('user_id',$id)->where('type','construction')->first();
            // return $request_tenders->com_id;
            $Review =  ReviewTender::create([
                'content' => $request->content,
                'rating' => $request->rating,
                'type'=>'construction',
                'request_id' => $request->request_id,
                'from'=>2,

                'user_id' => Auth::id(),
                'com_id' => $request_tenders->com_id,
            ]);

            return $Review;
        }

        
        if($request->TypeRequest==4){
                $type ='hvac';
            $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
            ('user_id',$id)->where('type',$type)->first();
            // return $request_tenders->com_id;
            $Review =  ReviewTender::create([
                'content' => $request->content,
                'rating' => $request->rating,
                'type'=>$type,
                'request_id' => $request->request_id,
                'user_id' => Auth::id(),
                'from'=>2,

                'com_id' => $request_tenders->com_id,
            ]);

            return $Review;
        }

        if($request->TypeRequest==3){
            $type ='stone';
            // return $request;
        $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
        ('user_id',$id)->where('type',$type)->first();
        // return $request_tenders;
        $Review =  ReviewTender::create([
            'content' => $request->content,
            'rating' => $request->rating,
            'type'=>$type,
            'request_id' => $request->request_id,
            'from'=>2,

            'user_id' => Auth::id(),
            'com_id' => $request_tenders->com_id,
        ]);

        return $Review;
    }

    if($request->TypeRequest==5){
        $type ='interior';
    $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
    ('user_id',$id)->where('type',$type)->first();
    // return $request_tenders->com_id;
    $Review =  ReviewTender::create([
        'content' => $request->content,
        'rating' => $request->rating,
        'type'=>$type,
        'from'=>2,
        'request_id' => $request->request_id,
        'user_id' => Auth::id(),
        'com_id' => $request_tenders->com_id,
    ]);

    return $Review;
 
         }
             }
    
    public function insertReviewAds(Request $request){




        $Review =  review_ads::create([
             'content' => $request->content,
             'rating' => $request->rating,
             'ads_id' => $request->ads_id,
             'user_id' => Auth::id(),
             'type' => $request->type,
         ]);
 
         
        //  $user =  User::where('id',$Review->com_id)->get();
     
 
        //  broadcast(new reveiws($Review,$Review->user));
 
        //  $admins=admin::where('role_id',1)->get();
 
        //  $user =  User::where('id',$Review->com_id)->get();
        //  Notification::send($user, new NotifyReviews($Review,$Review->user));
        //  Notification::send($admins, new NotifyReviews($Review,$Review->user));
 
         return $Review;
     }
    public function insert(Request $request){

        $id = Auth::id();
            // return $request;
            if($request->TypeRequest==1){
                $Review =  Review::create([
                    'content' => $request->content,
                    'rating' => $request->rating,
                    'request_id' => $request->request_id,
                    'user_id' => Auth::id(),
                    'from'=>1,
                    'com_id' => $request->com_id,
                ]);
                 
        $user =  User::where('id',$Review->com_id)->get();
    

        broadcast(new reveiws($Review,$Review->user));

        $admins=admin::where('role_id',1)->get();

        $user =  User::where('id',$Review->com_id)->get();
        Notification::send($user, new NotifyReviews($Review,$Review->user));
        Notification::send($admins, new NotifyReviews($Review,$Review->user));

        return $Review;
            }

            if($request->TypeRequest==6){

                $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
                ('user_id',$id)->where('type','construction')->first();
                // return $request_tenders->com_id;
                $Review =  ReviewTender::create([
                    'content' => $request->content,
                    'rating' => $request->rating,
                    'type'=>'construction',
                    'request_id' => $request->request_id,
                    'from'=>1,

                    'user_id' => Auth::id(),
                    'com_id' => $request_tenders->com_id,
                ]);

                return $Review;
            }

            
            if($request->TypeRequest==4){
                    $type ='hvac';
                $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
                ('user_id',$id)->where('type',$type)->first();
                // return $request_tenders->com_id;
                $Review =  ReviewTender::create([
                    'content' => $request->content,
                    'rating' => $request->rating,
                    'type'=>$type,
                    'request_id' => $request->request_id,
                    'user_id' => Auth::id(),
                    'from'=>1,

                    'com_id' => $request_tenders->com_id,
                ]);

                return $Review;
            }

            if($request->TypeRequest==3){
                $type ='stone';
                // return $request;
            $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
            ('user_id',$id)->where('type',$type)->first();
            // return $request_tenders;
            $Review =  ReviewTender::create([
                'content' => $request->content,
                'rating' => $request->rating,
                'type'=>$type,
                'request_id' => $request->request_id,
                'from'=>1,

                'user_id' => Auth::id(),
                'com_id' => $request_tenders->com_id,
            ]);

            return $Review;
        }

        if($request->TypeRequest==5){
            $type ='interior';
        $request_tenders = request_tender::where('tender_id',$request->tender_id)->where
        ('user_id',$id)->where('type',$type)->first();
        // return $request_tenders->com_id;
        $Review =  ReviewTender::create([
            'content' => $request->content,
            'rating' => $request->rating,
            'type'=>$type,
            'from'=>1,
            'request_id' => $request->request_id,
            'user_id' => Auth::id(),
            'com_id' => $request_tenders->com_id,
        ]);

        return $Review;
    }



            
     

       
    }
}

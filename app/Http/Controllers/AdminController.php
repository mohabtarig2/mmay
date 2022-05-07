<?php

namespace App\Http\Controllers;

use App\Events\acceptHvacTender;
use App\Events\acceptStoneTender;
use App\Events\AcceptTender;
use App\Events\NotifyRejectConstructionTender;
use App\Events\RejectConstructionTender;
use App\Events\rejectConsulteTender;
use App\Events\rejectHvactTender;
use App\Http\Middleware\admins;
use App\hvac;
use App\Models\admin;
use App\Models\Offer;
use App\Notifications\notifyAcceptConstructionTenders;
use App\Notifications\NotifyacceptHvacTender;
use App\Notifications\notifyAcceptStoneTender;
use App\Notifications\notifyAcceptTenders;
use App\Notifications\NotifyRejectConstructionTender as NotificationsNotifyRejectConstructionTender;
use App\Notifications\NotifyRejectConsulte;
use App\Notifications\NotifyrejectHvactTender;
use App\offerconsr;
use App\OfferHvac;
use App\OfferStone;
use App\reason_rejected_offer;
use App\reason_rejected_tender;
use App\request_tender;
use App\service_ads;
use App\stone;
use App\Tconstr;
use App\Tconsulte;
use App\Toffers;
use App\User;
use App\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
    {
public function countAll(){

$countUsers = User::where('role_id',10)->count();
$countConsulte = User::where('role_id',1)->count();
$countStone = User::where('role_id',3)->count();
$countHvac = User::where('role_id',4)->count();
$countInterior = User::where('role_id',5)->count();
$countAdmin = admin::count();
$countConstruction = User::where('role_id',6)->count();



$StatusTenderConslute = Tconsulte::where('status',0)->count();
$AllTenderConslute = Tconsulte::count();
$AllTenderConsr  = Tconstr::count();
$AllTenderhvac  = hvac::count();
$AllTenderStone  = stone::count();

$ConsrReview  = Tconstr::where('status','0')->count(); //under review
$ConsrOpen = Tconstr::where('status','1')->count(); //under review
$ConsrExcuted  = Tconstr::where('status','2')->count(); //under review
$ConsrComplete  = Tconstr::where('status','3')->count(); //under review
$ConsrDraft  = Tconstr::where('status','4')->count(); //under review
$ConsrClosed  = Tconstr::where('status','5')->count(); //under review



$ConsluteReview  = Tconsulte::where('status','0')->count(); //under review
$ConsluteOpen = Tconsulte::where('status','1')->count(); //under review
$ConsluteExcuted  = Tconsulte::where('status','2')->count(); //under review
$ConsluteComplete  = Tconsulte::where('status','3')->count(); //under review
$ConsluteDraft  = Tconsulte::where('status','4')->count(); //under review
$ConsluteClosed  = Tconsulte::where('status','5')->count(); //under review



$hvacReview  = hvac::where('status','0')->count(); //under review
$hvacOpen = hvac::where('status','1')->count(); //under review
$hvacExcuted  = hvac::where('status','2')->count(); //under review
$hvacComplete  = hvac::where('status','3')->count(); //under review
$hvacDraft  = hvac::where('status','4')->count(); //under review
$hvacClosed  = hvac::where('status','5')->count(); //under review



$stoneReview  = stone::where('status','0')->count(); //under review
$stoneOpen = stone::where('status','1')->count(); //under review
$stoneExcuted  = stone::where('status','2')->count(); //under review
$stoneComplete  = stone::where('status','3')->count(); //under review
$stoneDraft  = stone::where('status','4')->count(); //under review
$stoneClosed  = stone::where('status','5')->count(); //under review


return response()->json([
    'user'=>$countUsers,
    'Consulte'=>$countConsulte,
    "countAdmin"=>$countAdmin,
    "countInterior"=>$countInterior,
    "countHvac"=>$countHvac,
    "countStone"=>$countStone,

    'Construction'=>$countConstruction,
    'statusTender'=>$StatusTenderConslute,
    'AllTendersConsulate'=>$AllTenderConslute,
    'AllTenderConsr' => $AllTenderConsr,
    'AllTenderhvac' => $AllTenderhvac,
    'AllTenderstone' => $AllTenderStone,

    'ConsluteReview'=>$ConsluteReview,
    'ConsluteOpen'=>$ConsluteOpen,
    'ConsluteExcuted'=>$ConsluteExcuted,
    'ConsluteComplete'=>$ConsluteComplete,
    'ConsluteDraft'=>$ConsluteDraft,
    'ConsluteClosed'=>$ConsluteClosed,

    'ConsrReview'=>$ConsrReview,
    'ConsrOpen'=>$ConsrOpen,
    'ConsrExcuted'=>$ConsrExcuted,
    'ConsrComplete'=>$ConsrComplete,
    'ConsrDraft'=>$ConsrDraft,
    'ConsrClosed'=>$ConsrClosed,

    'hvacReview'=>$hvacReview,
    'hvacOpen'=>$hvacOpen,
    'hvacExcuted'=>$hvacExcuted,
    'hvacComplete'=>$hvacComplete,
    'hvacDraft'=>$hvacDraft,
    'hvacClosed'=>$hvacClosed,


    'stoneReview'=>$stoneReview,
    'stoneOpen'=>$stoneOpen,
    'stoneExcuted'=>$stoneExcuted,
    'stoneComplete'=>$stoneComplete,
    'stoneDraft'=>$stoneDraft,
    'stoneClosed'=>$stoneClosed,

    ]);

    }
    public function CounterOfTenders(){
        $countUsers = User::where('role_id',10)->count();
        $countConsulte = User::where('role_id',1)->count();
        $countStone = User::where('role_id',3)->count();
        $countHvac = User::where('role_id',4)->count();
        $countInterior = User::where('role_id',5)->count();
        $countAdmin = admin::count();
        $countConstruction = User::where('role_id',6)->count();
        $StatusTenderConslute = Tconsulte::where('status',0)->count();
        $AllTenderConslute = Tconsulte::count();
        $AllTenderConsr  = Tconstr::count();
        $AllTenderhvac  = hvac::count();
        $AllTenderStone  = stone::count();

        $ConsrReview  = Tconstr::where('status','0')->count(); //under review
        $ConsrOpen = Tconstr::where('status','1')->count(); //under review
        $ConsrExcuted  = Tconstr::where('status','2')->count(); //under review
        $ConsrComplete  = Tconstr::where('status','3')->count(); //under review
        $ConsrDraft  = Tconstr::where('status','4')->count(); //under review
        $ConsrClosed  = Tconstr::where('status','5')->count(); //under review



        $ConsluteReview  = Tconsulte::where('status','0')->count(); //under review
        $ConsluteOpen = Tconsulte::where('status','1')->count(); //under review
        $ConsluteExcuted  = Tconsulte::where('status','2')->count(); //under review
        $ConsluteComplete  = Tconsulte::where('status','3')->count(); //under review
        $ConsluteDraft  = Tconsulte::where('status','4')->count(); //under review
        $ConsluteClosed  = Tconsulte::where('status','5')->count(); //under review



        $hvacReview  = hvac::where('status','0')->count(); //under review
        $hvacOpen = hvac::where('status','1')->count(); //under review
        $hvacExcuted  = hvac::where('status','2')->count(); //under review
        $hvacComplete  = hvac::where('status','3')->count(); //under review
        $hvacDraft  = hvac::where('status','4')->count(); //under review
        $hvacClosed  = hvac::where('status','5')->count(); //under review



        $stoneReview  = stone::where('status','0')->count(); //under review
        $stoneOpen = stone::where('status','1')->count(); //under review
        $stoneExcuted  = stone::where('status','2')->count(); //under review
        $stoneComplete  = stone::where('status','3')->count(); //under review
        $stoneDraft  = stone::where('status','4')->count(); //under review
        $stoneClosed  = stone::where('status','5')->count(); //under review

        return response()->json([
            'user'=>$countUsers,
            'Consulte'=>$countConsulte,
            'Construction'=>$countConstruction,
            'Consulte'=>$countConsulte,
            "countAdmin"=>$countAdmin,
            "countInterior"=>$countInterior,
            "countHvac"=>$countHvac,
            "countStone"=>$countStone,
            'statusTender'=>$StatusTenderConslute,
            'AllTendersConsulate'=>$AllTenderConslute,
            'AllTenderConsr' => $AllTenderConsr,
            'AllTenderhvac' => $AllTenderhvac,
            'AllTenderstone' => $AllTenderStone,

            'ConsluteReview'=>$ConsluteReview,
            'ConsluteOpen'=>$ConsluteOpen,
            'ConsluteExcuted'=>$ConsluteExcuted,
            'ConsluteComplete'=>$ConsluteComplete,
            'ConsluteDraft'=>$ConsluteDraft,
            'ConsluteClosed'=>$ConsluteClosed,

            'ConsrReview'=>$ConsrReview,
            'ConsrOpen'=>$ConsrOpen,
            'ConsrExcuted'=>$ConsrExcuted,
            'ConsrComplete'=>$ConsrComplete,
            'ConsrDraft'=>$ConsrDraft,
            'ConsrClosed'=>$ConsrClosed,

            'hvacReview'=>$hvacReview,
            'hvacOpen'=>$hvacOpen,
            'hvacExcuted'=>$hvacExcuted,
            'hvacComplete'=>$hvacComplete,
            'hvacDraft'=>$hvacDraft,
            'hvacClosed'=>$hvacClosed,


            'stoneReview'=>$stoneReview,
            'stoneOpen'=>$stoneOpen,
            'stoneExcuted'=>$stoneExcuted,
            'stoneComplete'=>$stoneComplete,
            'stoneDraft'=>$stoneDraft,
            'stoneClosed'=>$stoneClosed,

        ]);
        }

    public function loginAdmin(Request $request){


            $credentaials = [
                'email'=>$request->email,
                'password'=>$request->password,
                'role_id'=>1,
            ];


        if(Auth::attempt( $credentaials)){
            $token = auth::user()->createToken('my-app-token')->accessToken;

            return response()->json(['token'=>$token],200);
        }else{
            return response()->json(['erorr'=>'Not Allowd'],401);
        }
    }
    public function acceptTender(Request $request){


      $tender_id = $request->id;


        Tconsulte::where('id',$tender_id)->update(['status'=>1]);
        $tenderAccepted = Tconsulte::with('user')->find($tender_id);

        $user = $tenderAccepted->user;





        Broadcast(new acceptTender($user ,$tenderAccepted,$tender_id));

        $user->notify(new notifyAcceptTenders($tenderAccepted));



        return response()->json('You Accept The Tender');
    }



    public function rejectHvactTender(Request $request){

        $tender_id = $request->id;

        $tenders = hvac::find($tender_id);
        $tenders->status = 6;
        $tenders->reaject_reason = $request->reason;
        $tenders->save();

        broadcast(new rejectHvactTender($tenders->user,$tenders));

        $user = $tenders->user;

        $user->notify(new  NotifyrejectHvactTender($tenders->user,$tenders));




        //   hvac::where('id',$tender_id)->update(['status'=>6]);

        //  $reasone_rejected =  reason_rejected_tender::create([
        //     'tender_id' => $request->id,
        //     'reason' => $request->reason,
        //     'type' => 'hvac',


        // ]);












          return response()->json('You Rejected This Tender Succesfuly');
      }

      public function accepstonetTender(Request $request){


        
        $tender_id = $request->id;




          $tenders = stone::find($tender_id);
          $tenders->status = 1;
          $tenders->save();



            $tenders->setAttribute('added_at',$tenders->created_at->diffForHumans());




            $user = $tenders->user;

          Broadcast(new acceptStoneTender($tenders->user , $tenders));

          $user->notify(new notifyAcceptStoneTender($tenders->user , $tenders));


        

        







          return response()->json('You Accept This Tender Succesfuly');
      }

      
      public function villOffer(Request $request){
        $tenders = Villa::latest()->with('company')->paginate(5);

        foreach($tenders as $tender){
            $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
           // $tender->setAttribute('comment_count',$tender->Toffer->count());
        }

        return response()->json($tenders);

      }
      public function ConstructionOffer(Request $request){
        $tenders = service_ads::latest()->with('company')->paginate(5);

        foreach($tenders as $tender){
            $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
           // $tender->setAttribute('comment_count',$tender->Toffer->count());
        }

        return response()->json($tenders);

      }
    public function accepHvactTender(Request $request){


        $tender_id = $request->id;




          $tenders = hvac::find($tender_id);
          $tenders->status = 1;
          $tenders->save();



            $tenders->setAttribute('added_at',$tenders->created_at->diffForHumans());




            $user = $tenders->user;

          Broadcast(new acceptHvacTender($tenders->user , $tenders));

          $user->notify(new NotifyacceptHvacTender($tenders->user , $tenders));



          return response()->json('You Accept This Tender Succesfuly');
      }
    public function accepConsrtTender(Request $request){


        $tender_id = $request->id;
          Tconstr::where('id',$tender_id)->update(['status'=>1]);
          $tenderAccepted = Tconstr::with('user')->with('tcimg')->find($tender_id);

          $user = $tenderAccepted->user;











          Broadcast(new acceptTender($user ,$tenderAccepted,$tender_id));

          $user->notify(new notifyAcceptConstructionTenders($tenderAccepted));



          return response()->json($tenderAccepted);
      }


    public function detailsTenderConsulte(){
        $tenders = Tconsulte::latest()->with('user')->paginate(10);

        foreach($tenders as $tender){
            $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
           // $tender->setAttribute('comment_count',$tender->Toffer->count());
        }

        return response()->json($tenders);
    }

    public function detailsTenderStone(){


        $tenders = stone::latest()->with('user')->paginate(5);

        foreach($tenders as $tender){
            $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
           // $tender->setAttribute('comment_count',$tender->Toffer->count());
        }

        return response()->json($tenders);
    }


    public function detailsTenderConsr(){
        $tenders = Tconstr::latest()->with('user')->paginate(5);

        foreach($tenders as $tender){
            $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
           // $tender->setAttribute('comment_count',$tender->Toffer->count());
        }

        return response()->json($tenders);
    }

    public function detailsTenderHvac(){
        $tenders = hvac::latest()->with('user')->paginate(5);

        foreach($tenders as $tender){
            $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
           // $tender->setAttribute('comment_count',$tender->Toffer->count());
        }

        return response()->json($tenders);
    }




    public function ConslTender(Request $request){
        $id = $request->id;
        $tenders = Tconsulte::where('id',$id)->with('user','image')->get();


        $comments= Toffers::where('tender_id',$id)->with('user','images')->get();



        foreach($tenders as $tender){


                foreach($comments as $comment){
                    $requests= request_tender::where('tender_id',$tender->id)->where('type','consulting')->get();
                   // $tender->setAttribute('Commenter',Toffers::where('tender_id',$id)->with('user')->get());
                    $comment->setAttribute('Commented_at',$comment->created_at->diffForHumans());


                    foreach($requests as $request){
                        $request->setAttribute('request_at',$request->created_at->diffForHumans());
                    }

                    $comment->setAttribute('requests',$requests);

                }




                $tender->setAttribute('comments',$comments);

                 $tender->setAttribute('added_at',$tender->created_at->diffForHumans());

        }

        return response()->json($tenders);
    }

    public function RejectConsulte(Request $request){
        $id = $request->id;
        $reason = $request->reason;

        $update = Tconsulte::find($id);
        $update->status = 6;
        $update->reason_reject =$reason;
        $update->save();




        event(new rejectConsulteTender($update->user,$update));

        $user = $update->user;

        $user->notify(new NotifyRejectConsulte($user , $update));


        return 'success';



    }


    public function HvacTender(Request $request){

        $id = $request->id;

        $tenders = hvac::where('id',$id)->with('tcimg', 'user','HvacFiles')->get();


        foreach ($tenders as $tender) {

            $commnets = OfferHvac::where('tender_id', $tender->id)->with('user', 'image')->get();


            $request_tender = request_tender::where('tender_id', $tender->id)->where('type','hvac')->get();
            foreach ($commnets as $commnet) {
                $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
                $commnet->setAttribute('confirmd', $request_tender);
            }

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('comments', $commnets);
        }




        return response()->json($tenders);
    }
    public function StoneTender(Request $request){

        $id = $request->id;

        $tenders = Stone::where('id',$id)->with('tcimg', 'user','StoneFiles')->get();


        foreach ($tenders as $tender) {

            $commnets = OfferStone::where('tender_id', $tender->id)->with('user', 'image')->get();


            // $request_tender = request_tender::where('tender_id', $tender->id)->where('type','stone')->get();
            foreach ($commnets as $commnet) {
                $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
                // $commnet->setAttribute('confirmd', $request_tender);
            }

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('comments', $commnets);
        }




        return response()->json($tenders);
    }
    public function ConsrTender(Request $request){

        $id = $request->id;

        $tenders = Tconstr::where('id',$id)->with('tcimg', 'user','ConstructionFiles','AdditionalFile')->get();


        foreach ($tenders as $tender) {

            $commnets = offerconsr::where('construction_id', $tender->id)->with('user', 'image')->get();


            $request_tender = request_tender::where('tender_id', $tender->id)->where('type','construction')->get();
            foreach ($commnets as $commnet) {
                $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
                $commnet->setAttribute('confirmd', $request_tender);
                $commnet->setAttribute('request_tender', $request_tender);
            }

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('comments', $commnets);
        }




        return response()->json($tenders);
    }
    public function Offerdetails(Request $request){


        $id =   $request->id;
        $villas =  Villa::with('villaImage','reason')->where('id',$id)->get();
        foreach($villas as $villa){
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
        }


        return response()->json($villas);
    }

    public function AcceptAds(Request $request){

        $id = $request->id;
        $update = Villa::where('id',$id)->update(['status'=>1]);
        $tenderAccepted = Villa::with('Company')->find($id);





        return response()->json($tenderAccepted);
    }
    public function RejecttAds(Request $request){

        $id = $request->id;

        $update = Villa::where('id',$id)->update(['status'=>6]);
        $tenderAccepted = Villa::with('Company')->find($id);

         $reasone_rejected =  reason_rejected_offer::create([
            'offer_id' => $request->id,
            'reason' => $request->reason,



        ]);



        return response()->json($tenderAccepted);
    }

        public function getAdmins(){

            $admins = admin::get();
            return $admins;

        }
        public function getUsers(Request $request){
            $id = $request->id;
            $users = User::where('role_id',$id)->paginate(6);
            foreach($users as $user){
                $user->setAttribute('added_at',$user->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            return $users;

        }

        public function profileData(Request $request){
            $id =$request->id;

            $users =  User::where('role_id',10)->where('id',$id)->get();
            $Hvacs=  hvac::where('user_id',$id)->get();
            $consrs=  Tconstr::where('user_id',$id)->get();
            $consultes=  Tconsulte::where('user_id',$id)->get();
            $stones=stone::where('user_id',$id)->get();



            foreach($consrs as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($Hvacs as $Hvac){
                $Hvac->setAttribute('added_at',$Hvac->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($consultes as $consulte){
                $consulte->setAttribute('added_at',$consulte->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($stones as $stone){
                $stone->setAttribute('added_at',$stone->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }

            foreach($users as $user){
                $user->setAttribute('added_at',$user->created_at->diffForHumans());
                $user->setAttribute('Hvacs',$Hvacs);
                $user->setAttribute('consultes',$consultes);
                $user->setAttribute('stones',$stones);
                $user->setAttribute('consrs',$consrs);
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            return $users;
        }


        public function ConstructionprofileData(Request $request){
            $id =$request->id;

            $users =  User::where('role_id',6)->with('company','companyfile','achivementFile')->where('id',$id)->get();

            $offerconsrs = offerconsr::where('com_id',$id)->with('image')->with('tender')->get();
            $offerRequests = request_tender::where('com_id',$id)->where('type','construction')->get();
            $offerRequestsComplete = request_tender::where('com_id',$id)->where('type','construction')->where('result','done')->get();
            $offerRequestsCancel = request_tender::where('com_id',$id)->where('type','construction')->where('result','cancel')->get();
            $offerRequestsReview = request_tender::where('com_id',$id)->where('type','construction')->where('result',null)->get();


            foreach($offerRequests as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }



            foreach($offerconsrs as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($users as $user){
            $user->setAttribute('Requests',$offerRequests);
            $user->setAttribute('CountRequests',$offerRequests->count());
            $user->setAttribute('Tender',$offerconsrs);
            $user->setAttribute('offerRequestsComplete',$offerRequestsComplete->count());
            $user->setAttribute('offerRequestsCancel',$offerRequestsCancel->count());
            $user->setAttribute('offerRequestsReview',$offerRequestsReview->count());
            $user->setAttribute('CountOffer',$offerconsrs->count());
            }

            return $users;
        }

        public function consulteprofileData(Request $request){
            $id =$request->id;

            $users =  User::where('role_id',1)->with('company','companyfile','achivementFile')->where('id',$id)->get();

            $offerconsrs = Toffers::where('com_id',$id)->with('images')->with('tender')->get();
            $offerRequests = request_tender::where('com_id',$id)->where('type','consulting')->get();
            $offerRequestsComplete = request_tender::where('com_id',$id)->where('type','consulting')->where('result','done')->get();
            $offerRequestsCancel = request_tender::where('com_id',$id)->where('type','consulting')->where('result','cancel')->get();
            $offerRequestsReview = request_tender::where('com_id',$id)->where('type','consulting')->where('result',null)->get();


            foreach($offerRequests as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }



            foreach($offerconsrs as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($users as $user){
            $user->setAttribute('Requests',$offerRequests);
            $user->setAttribute('CountRequests',$offerRequests->count());
            $user->setAttribute('Tender',$offerconsrs);
            $user->setAttribute('offerRequestsComplete',$offerRequestsComplete->count());
            $user->setAttribute('offerRequestsCancel',$offerRequestsCancel->count());
            $user->setAttribute('offerRequestsReview',$offerRequestsReview->count());
            $user->setAttribute('CountOffer',$offerconsrs->count());
            }

            return $users;
        }

        public function HvacprofileData(Request $request){
            $id =$request->id;

            $users =  User::where('role_id',4)->with('company','companyfile','achivementFile')->where('id',$id)->get();

            $offerconsrs = OfferHvac::where('com_id',$id)->with('image')->with('tender')->get();
            $offerRequests = request_tender::where('com_id',$id)->where('type','hvac')->get();
            $offerRequestsComplete = request_tender::where('com_id',$id)->where('type','hvac')->where('result','done')->get();
            $offerRequestsCancel = request_tender::where('com_id',$id)->where('type','hvac')->where('result','cancel')->get();
            $offerRequestsReview = request_tender::where('com_id',$id)->where('type','hvac')->where('result',null)->get();


            foreach($offerRequests as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }



            foreach($offerconsrs as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($users as $user){
            $user->setAttribute('Requests',$offerRequests);
            $user->setAttribute('CountRequests',$offerRequests->count());
            $user->setAttribute('Tender',$offerconsrs);
            $user->setAttribute('offerRequestsComplete',$offerRequestsComplete->count());
            $user->setAttribute('offerRequestsCancel',$offerRequestsCancel->count());
            $user->setAttribute('offerRequestsReview',$offerRequestsReview->count());
            $user->setAttribute('CountOffer',$offerconsrs->count());
            }

            return $users;
        }

        public function stoneprofileData(Request $request){
            $id =$request->id;

            $users =  User::where('role_id',3)->with('company','companyfile','achivementFile')->where('id',$id)->get();

            $offerconsrs = OfferStone::where('com_id',$id)->with('image')->with('tender')->get();
            $offerRequests = request_tender::where('com_id',$id)->where('type','stone')->get();
            $offerRequestsComplete = request_tender::where('com_id',$id)->where('type','stone')->where('result','done')->get();
            $offerRequestsCancel = request_tender::where('com_id',$id)->where('type','stone')->where('result','cancel')->get();
            $offerRequestsReview = request_tender::where('com_id',$id)->where('type','stone')->where('result',null)->get();


            foreach($offerRequests as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }



            foreach($offerconsrs as $consr){
                $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
               // $tender->setAttribute('comment_count',$tender->Toffer->count());
            }
            foreach($users as $user){
            $user->setAttribute('Requests',$offerRequests);
            $user->setAttribute('CountRequests',$offerRequests->count());
            $user->setAttribute('Tender',$offerconsrs);
            $user->setAttribute('offerRequestsComplete',$offerRequestsComplete->count());
            $user->setAttribute('offerRequestsCancel',$offerRequestsCancel->count());
            $user->setAttribute('offerRequestsReview',$offerRequestsReview->count());
            $user->setAttribute('CountOffer',$offerconsrs->count());
            }

            return $users;
        }
        public function getUnreadNotificatons(){

            $notification = Auth::guard('admin')->user()->unreadNotifications ;
            return response()->json($notification);
         }


         public function getLastTenNotifications(){


             $notifications =Auth::guard('admin')->user()->notifications;
             foreach($notifications as $notification){
             
             $notification->setAttribute('added_at',$notification->created_at->diffForHumans());
            }

             return response()->json($notifications);
             
         }

         public function getAllNotificatons(){
             $notifications = Auth::guard('admin')->user()->notifications;
             foreach($notifications as $notification){
             
                $notification->setAttribute('added_at',$notification->created_at->diffForHumans());
               }
             return response()->json($notifications);
         }
         public function NotificatonsMarkAsRead(Request $request){
             $notification =Auth::guard('admin')->user()->notifications->where('id',$request->id)->first();
             $notification->markAsRead();
             return response()->json(['msg'=>"ok"]);


         }


         public function RejectConstructionTender(Request $request){

            $id = $request->id;


            $Tconstr = Tconstr::find($id);
            $Tconstr->status = 6;
            $Tconstr->reason_reject =$request->reasone;
            $Tconstr->save();

            broadcast(new RejectConstructionTender($Tconstr));

            $user =  $Tconstr->user;

            $user->notify(new NotificationsNotifyRejectConstructionTender ($Tconstr));



        }







}

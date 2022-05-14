<?php
namespace App\Http\Controllers;

use App\branch;
use App\CompanyFile;
use App\hvac;
use App\stone;
use App\Tconstr;
use App\Tconsulte;
use App\Tinterior;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    public function logoutUser(Request $request) {
        if(auth()){
            Auth::logout();
        }


    }

    public function avatar(Request $request){


        if($request->hasFile('avatar')  ){


            $avatar= $request->file('avatar');


                $file_name_pass = 'amb_avatar'.time().'_'.$avatar->getClientOriginalName();
                // $file_extension_pass = $imagePassport= $request->file('avatar');
                $namePass = $file_name_pass;






                $file_path_avatar = $avatar->storeAs('assets/userAvatar', $namePass, 'public');

                $avatar->move(public_path('assets/userAvatar'), $namePass);

                $userid = auth::id();
                $user = User::find($userid);


                $user->avatar =$file_path_avatar;

                $user->save();




                return response()->json($user->avatar);

            }

    }
    public function SetBranch(Request $request){
        $id = Auth::id();
       
        // return $request;

        if($request->dubai==true){
            $tenders =  branch::create([
                'emirates' => 1,
                'company_id' => $id,
                'path'=>$request->DubaiFile
                
                
        ]);
        }

        if($request->Abudabhi==true){
            $tenders =  branch::create([
                'emirates' => 7,
                'company_id' => $id,
                'path'=>$request->ADFile

                
        ]);
    }

        if($request->sharjah==true){
            $tenders =  branch::create([
                'emirates' => 5,
                'company_id' => $id,
                'path'=>$request->SHFile

                
        ]);
        }

        if($request->ajman==true){
            $tenders =  branch::create([
                'emirates' => 6,
                'company_id' => $id,
                'path'=>$request->AJFile

                
        ]);
        }

        
   

        if($request->um_alqwin==true){
            $tenders =  branch::create([
                'emirates' => 4,
                'company_id' => $id,
                'path'=>$request->UMFile

                
        ]);
        }

        if($request->ras_alkhima==true){
            $tenders =  branch::create([
                'emirates' => 3,
                'company_id' => $id,
                'path'=>$request->RASFile

                
        ]);
        }

        if($request->fujairah==true){
            $tenders =  branch::create([
                'emirates' => 2,
                'company_id' => $id,
                'path'=>$request->FUJFile

                
        ]);
        }
    
    
        
        
        $user = CompanyFile::where('user_id',$id)->first();
        $user->branchstatus = 1;
        $user ->save();
        // data.append('dubai',dubai)
        // data.append('Abudabhi',Abudabhi)
        // data.append('sharjah',sharjah)
        // data.append('ajman',ajman)
        // data.append('um_alqwin',um_alqwin)
        // data.append('ras_alkhima',ras_alkhima)
        // data.append('fujairah',fujairah)
  
        
    

    }
    public function skip(){
       

        $user = CompanyFile::where('user_id',Auth::id())->first();



        $user->branchstatus = 1;
       
          $user ->save();
  
    }

    public function getUnreadNotificatons(){

       $notification = Auth::user()->unreadNotifications ;
       return response()->json($notification);
    }


    public function getLastTenNotifications(){

        if(Auth::user()){
        $notifications = Auth::user()->notifications;
        foreach ($notifications as $notification) {
            $notification->setAttribute('added_at', $notification->created_at->diffForHumans());
        }
        return response()->json($notifications);
        }


    }

    public function getAllNotificatons(){
        $notifications = Auth::user()->notifications;
        foreach ($notifications as $notification) {
            $notification->setAttribute('added_at', $notification->created_at->diffForHumans());
        }
        return response()->json($notifications);
    }
    public function NotificatonsMarkAsRead(Request $request){
        $notification = Auth::user()->notifications->where('id',$request->id)->first();
        $notification->markAsRead();
        return response()->json(['msg'=>"ok"]);


    }

    public function index(Request $request)
    {

        $credentaials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];


    if(Auth::attempt( $credentaials)){
        $token = auth::user()->createToken('my-app-token')->accessToken;

        return response()->json(['token'=>$token],200);
    }else{
        return response()->json(['erorr'=>'Not Allowd'],401);
    }
    }

    public function savedatauser(Request $request){


        $ruels = $this->getRules( $request);
        $messages = $this->getMessage($request);



        $valditor = Validator::make( $request->all(),$ruels,$messages);


        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }else{
        $user = User::find(Auth::id());



      $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;


       // $companies->status = 0;
        $user ->save();


        return response()->json(['data'=>$user,'success'=>'have been successful']);


        }

    }
    public function counterConsulteTenders(){
        $userid = Auth::id();
        $ConsrReview  = Tconstr::where('status','0')->where('user_id',$userid)->get(); //under review
$ConsrOpen = Tconstr::where('status','1')->where('user_id',$userid)->get(); //under review
$ConsrExcuted  = Tconstr::where('status','2')->where('user_id',$userid)->get(); //under review
$ConsrComplete  = Tconstr::where('status','3')->where('user_id',$userid)->get(); //under review
$ConsrDraft  = Tconstr::where('status','4')->where('user_id',$userid)->get(); //under review
$ConsrClosed  = Tconstr::where('status','5')->where('user_id',$userid)->get(); //under review
$AllTenderConsr  = Tconstr::where('user_id',$userid)->get();




return response()->json([
    'ConsrReview'=>$ConsrReview->count(),
    'ConsrOpen'=>$ConsrOpen->count(),
    'ConsrExcuted'=>$ConsrExcuted->count(),
    'ConsrComplete'=>$ConsrComplete->count(),
    'ConsrDraft'=>$ConsrDraft->count(),
    'ConsrClosed'=>$ConsrClosed->count(),
    'AllTenderConsr' => $AllTenderConsr->count(),
]);
}
    public function countUserTenders(){

$userid = Auth::id();

$StatusTenderConslute = Tconsulte::where('status',0)->where('user_id',$userid)->get();
$AllTenderConslute = Tconsulte::where('user_id',$userid)->get();
$AllTenderConsr  = Tconstr::where('user_id',$userid)->get();
$AllTenderhvac  = hvac::where('user_id',$userid)->get();
$AllTenderStone  = stone::where('user_id',$userid)->get();
$AllTenderInterior  = Tinterior::where('user_id',$userid)->get();

$ConsrReview  = Tconstr::where('status','0')->where('user_id',$userid)->get(); //under review
$ConsrOpen = Tconstr::where('status','1')->where('user_id',$userid)->get(); //under review
$ConsrExcuted  = Tconstr::where('status','2')->where('user_id',$userid)->get(); //under review
$ConsrComplete  = Tconstr::where('status','3')->where('user_id',$userid)->get(); //under review
$ConsrDraft  = Tconstr::where('status','4')->where('user_id',$userid)->get(); //under review
$ConsrClosed  = Tconstr::where('status','5')->where('user_id',$userid)->get(); //under review



$ConsluteReview  = Tconsulte::where('status','0')->where('user_id',$userid)->get(); //under review
$ConsluteOpen = Tconsulte::where('status','1')->where('user_id',$userid)->get(); //under review
$ConsluteExcuted  = Tconsulte::where('status','2')->where('user_id',$userid)->get(); //under review
$ConsluteComplete  = Tconsulte::where('status','3')->where('user_id',$userid)->get(); //under review
$ConsluteDraft  = Tconsulte::where('status','4')->where('user_id',$userid)->get(); //under review
$ConsluteClosed  = Tconsulte::where('status','5')->where('user_id',$userid)->get(); //under review



$hvacReview  = hvac::where('status','0')->where('user_id',$userid)->get();//under review
$hvacOpen = hvac::where('status','1')->where('user_id',$userid)->get(); //under review
$hvacExcuted  = hvac::where('status','2')->where('user_id',$userid)->get(); //under review
$hvacComplete  = hvac::where('status','3')->where('user_id',$userid)->get(); //under review
$hvacDraft  = hvac::where('status','4')->where('user_id',$userid)->get(); //under review
$hvacClosed  = hvac::where('status','5')->where('user_id',$userid)->get(); //under review



$stoneReview  = stone::where('status','0')->where('user_id',$userid); //under review
$stoneOpen = stone::where('status','1')->where('user_id',$userid); //under review
$stoneExcuted  = stone::where('status','2')->where('user_id',$userid); //under review
$stoneComplete  = stone::where('status','3')->where('user_id',$userid); //under review
$stoneDraft  = stone::where('status','4')->where('user_id',$userid); //under review
$stoneClosed  = stone::where('status','5')->where('user_id',$userid); //under review


$interiorReview  = Tinterior::where('status','0')->where('user_id',$userid); //under review
$interiorOpen = Tinterior::where('status','1')->where('user_id',$userid); //under review
$interiorExcuted  = Tinterior::where('status','2')->where('user_id',$userid); //under review
$interiorComplete  = Tinterior::where('status','3')->where('user_id',$userid); //under review
$interiorDraft  = Tinterior::where('status','4')->where('user_id',$userid); //under review
$interiorClosed  = Tinterior::where('status','5')->where('user_id',$userid); //under review

return response()->json([

    'statusTender'=>$StatusTenderConslute->count(),
    'AllTendersConsulate'=>$AllTenderConslute->count(),
    'AllTenderConsr' => $AllTenderConsr->count(),
    'AllTenderhvac' => $AllTenderhvac->count(),
    'AllTenderstone' => $AllTenderStone->count(),
    'AllTenderInterior'=> $AllTenderInterior->count(),

    

    'ConsluteReview'=>$ConsluteReview->count(),
    'ConsluteOpen'=>$ConsluteOpen->count(),
    'ConsluteExcuted'=>$ConsluteExcuted->count(),
    'ConsluteComplete'=>$ConsluteComplete->count(),
    'ConsluteDraft'=>$ConsluteDraft->count(),
    'ConsluteClosed'=>$ConsluteClosed->count(),

    'ConsrReview'=>$ConsrReview->count(),
    'ConsrOpen'=>$ConsrOpen->count(),
    'ConsrExcuted'=>$ConsrExcuted->count(),
    'ConsrComplete'=>$ConsrComplete->count(),
    'ConsrDraft'=>$ConsrDraft->count(),
    'ConsrClosed'=>$ConsrClosed->count(),

    'hvacReview'=>$hvacReview->count(),
    'hvacOpen'=>$hvacOpen->count(),
    'hvacExcuted'=>$hvacExcuted->count(),
    'hvacComplete'=>$hvacComplete->count(),
    'hvacDraft'=>$hvacDraft->count(),
    'hvacClosed'=>$hvacClosed->count(),


    'stoneReview'=>$stoneReview->count(),
    'stoneOpen'=>$stoneOpen->count(),
    'stoneExcuted'=>$stoneExcuted->count(),
    'stoneComplete'=>$stoneComplete->count(),
    'stoneDraft'=>$stoneDraft->count(),
    'stoneClosed'=>$stoneClosed->count(),


    'interiorReview'=>$interiorReview->count(),
    'interiorOpen'=>$interiorOpen->count(),
    'interiorExcuted'=>$interiorExcuted->count(),
    'interiorComplete'=>$interiorComplete->count(),
    'interiorDraft'=>$interiorDraft->count(),
    'interiorClosed'=>$interiorClosed->count(),

    ]);

    }
    protected function getRules(){


        return $ruels = [



        'name' => 'required|min:4',
        'email' => 'required|email|min:4',
        'mobile' => 'required|numeric|min:8',


        ];




    }

    protected function getMessage(){

        return  $messages =[
            'mobile.required'=> __('mobile Is Required'),
            'name.min'=> __(' name  must be great than 4'),
            'email.required'=> __('email  Is Required'),




        ];


    }
}

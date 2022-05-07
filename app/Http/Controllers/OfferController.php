<?php

namespace App\Http\Controllers;

use App\Console\Commands\notify;
use App\Events\ConfirmConsulteOffer;
use App\Events\ConsluteAdminOffer;
use App\Events\NewComment;
use App\Http\Requests\OfferRequest;
use App\Models\admin;
use App\Models\Offer;
use App\Notifications\NotifyAdminConfirmConsulteOffer;
use App\Notifications\NotifyAdminOfferConsulte;
use App\Notifications\NotifyConfirmConsulteOffer;
use App\Notifications\Notyifyowner;
use App\request_tender;
use App\tclfile;
use App\Tconstr;
use App\Tconsulte;
use App\Toffers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;

class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirmTender(Request $request)
    {
        // return $request->all();
        request_tender::create([
            'tender_id' => $request->tender_id,
            'offer_id' => $request->offer_id,
            'user_id' => Auth::id(),
            'com_id' => $request->com_id,
            'type' => 'consulting',
        ]);

        $posts = Tconsulte::find($request->tender_id);
        $posts->stage = 1;
        $posts->save();
        broadcast(new ConfirmConsulteOffer($posts->user,$posts));

        $user = user::find($request->com_id);

        $user->notify(new NotifyConfirmConsulteOffer($posts->user , $posts));

        $admins = admin::where('role_id',1)->get();

        $user->notify(new NotifyConfirmConsulteOffer($posts->user , $posts));
        Notification::send($admins, new NotifyAdminConfirmConsulteOffer($posts->user,$posts));

    }
    public function cons_offer(Request $request)
    {
      
        $id = Auth::id();
        $tender_id =  $request->tender_id;
     

        
        $count =  Toffers::where('tender_id', $tender_id)->where('com_id', $id)->count();

        
         
        
   

        if ($count > 0 ) {
            return response()->json(["already" => 'Alreay have Offer You Dont have to put again'],422);
        }else{
          
      

            

                 $ruels = $this->getRules();
            $messages = $this->getMessage();


            $validator = Validator::make($request->all(), $ruels, $messages);


            if ($validator->fails()) {

                return response()->json(['errors' => $validator->errors()], 422);
            }


        
            $Toffers = new Toffers();
      
            $Toffers->Consultant_fee = $request->Consultant_fee;  
            $Toffers->conditioning = $request->conditioning;  
            $Toffers->electric_pendants = $request->electric_pendants;  
            $Toffers->Bedroom_wardrobes = $request->Bedroom_wardrobes;  
            $Toffers->Kitchen_Cabinets = $request->Kitchen_Cabinets;  
            $Toffers->the_elevator = $request->the_elevator;  
            $Toffers->pelvis = $request->pelvis;  
            $Toffers->interior_decoration = $request->interior_decoration;  
            $Toffers->garden_design = $request->garden_design;  
            $Toffers->the_fence = $request->the_fence;  
            $Toffers->budget = $request->budget;  


            $Toffers->budget = $request->budget;  
            $Toffers->tender_id = $request->tender_id;  
            $Toffers->comment = $request->notes;
            $Toffers->design = $request->design;
            $Toffers->Supervisor = $request->Supervisor;
            $Toffers->com_id = Auth::id();
     
            $Toffers->TotalAreaBuild = $request->tab;

            $file = $request->file('Structure');
            $file2 = $request->file('Architect');
            if($request->hasFile('Structure') &&  $request->hasFile('Architect')){

                $file_faced = 'amb_threeD_faced' . time() . '_' . $file->getClientOriginalName();
                $file_path_faced= $file->storeAs('consulting/faced', $file_faced, 'public');
                $file->move(public_path('consulting/faced'), $file_faced);

                $file_dis= 'amb_threeD_dis' . time() . '_' . $file2->getClientOriginalName();
                $file_path_dis= $file2->storeAs('consulting/dis', $file_dis, 'public');
                $file2->move(public_path('consulting/dis'), $file_dis);

                // dis = internal distrubtin
        
        

                $Toffers->faced_path = $file_path_faced;
                $Toffers->faced_name = $file_faced ;

                $Toffers->dis_path = $file_path_dis;
                $Toffers->dis_name = $file_dis ;

                
              
                }
            $Toffers->save();
            

            
            $user = User::find(Auth::id());
            $tender_id = $request->tender_id;
            $admins = admin::where('role_id',1)->get();

            broadcast(new NewComment($user, $tender_id))->toOthers();

            $tender = Tconsulte::with('user')->find($Toffers->tender_id);

            broadcast(new ConsluteAdminOffer($tender->user, $tender, $Toffers->user))->toOthers();
            $tender_owner = $tender->user;


            if ($tender_owner->id != $Toffers->com_id) {
                $tender_owner->notify(new Notyifyowner($Toffers, $tender));

            }

            Notification::send($admins, new NotifyAdminOfferConsulte($tender->user,$tender,$Toffers->user));

            

        }
            
        
    }
    public function Myoffer(Request $request)
    {


        $id = $request->id;
        $tenders = Tconsulte::where('id',$id)->with('user')->get();


        $commnets= Toffers::where('tender_id',$id)->with('user')->get();

        $count =  $commnets->count();

        $uid = Auth::id();
        $tender_id = $request->id;

        $CommentTender = Toffers::where('tender_id',$tender_id)->where('com_id',$uid);
        $count = $CommentTender->count();


        $AllOffers = Toffers::all()->where('tender_id',$id);
        $countOffers = $AllOffers->count();

        foreach($tenders as $tender){


                foreach($commnets as $comment){


                    $tcfiles= tclfile::where('consl_id',$comment->id)->get();



                   // $tender->setAttribute('Commenter',Toffers::where('tender_id',$id)->with('user')->get());
                    $comment->setAttribute('Commented_at',$comment->created_at->diffForHumans());
                    $comment->setAttribute('ImageComments',$tcfiles);
                }

                $tender->setAttribute('comments',$commnets);
                $tender->setAttribute('UserisOffer',$count);
                $tender->setAttribute('AllOffers',$countOffers);
                 $tender->setAttribute('added_at',$tender->created_at->diffForHumans());

        }

        return response()->json($tenders);
    }
    protected function getRules()
    {


        return $ruels = [
            'notes' => 'required|min:100',
            'tab' => 'required',
            'budget' => 'required',
            'design' => 'required',
            'Supervisor' => 'required',



        ];
    }

    protected function getMessage()
    {

        return  $messages = [
            'notes.required' => 'Your Offer Is required',
            'notes.min' => __('notes Not less Than 100 Charcter'),
            'budget.min' => __('minimum  5 numbers'),

            'design.min' => __('minimum  5 numbers'),
            'Supervisor.min' => __('minimum  5 numbers'),

            'budget.required' => __('budget is required'),
            'design.required' => __('design is required'),
            'Supervisor.required' => __('Supervisor is required'),
            'tab.required' => __('total area build is required'),


        ];
    }
}

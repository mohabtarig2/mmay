<?php

namespace App\Http\Controllers;

use App\Console\Commands\notify;
use App\constfollowupTender;
use App\ConstructionFiles;
use App\contract;
use App\contractsConsrcutiontender;
use App\contractshvactender;
use App\contractsinteriortender;
use App\contractsstonetender;
use App\Events\companyAdminConsulteConfirmTender;
use App\Events\companyCancelConstruct;
use App\Events\companyCancelConstruction;
use App\Events\companyCancelConsulte;
use App\Events\companyCancelHvac;
use App\Events\companyDoneConstruction;
use App\Events\companyDoneConsulte;
use App\Events\CompleteConstructionTender;
use App\Events\CompleteHvacTender;
use App\Events\NewTenderHvac;
use App\Events\UserCancelConstruction;
use App\Events\UserCancelHvac;
use App\hvac;
use App\HvacFiles;
use App\InteriorFiles;
use App\Models\admin;
use App\Notifications\NotifyAdminCompanyDoneConsulte;
use App\Notifications\NotifyCompanyCancelConstruction;
use App\Notifications\NotifyCompanyCancelConsulte;
use App\Notifications\NotifycompanyCancelHvac;
use App\Notifications\NotifyCompanyConulteConfirmTender;
use App\Notifications\NotifycompanyDoneConstruction;
use App\Notifications\NotifycompanyDoneHvac;
use App\Notifications\NotifyCompleteConstructionTender;
use App\Notifications\NotifyCompleteHvacTender;
use App\Notifications\NotifyNewTenderHvac;
use App\Notifications\NotifyUserCancelConstruction;
use App\Notifications\NotifyUserCancelConsulte;
use App\Notifications\NotifyUserCancelHvac;
use App\offerconsr;
use App\OfferHvac;
use App\offerInterior;
use App\OfferStone;
use App\request_tender;
use App\saved_tenders;
use App\stone;
use App\StoneFiles;
use App\Tconstr;
use App\Tconsulte;
use App\TenderContrat;
use App\TenderFrom;
use App\tenderfromtender;
use App\Tinterior;
use App\Toffers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Notification;

class RequestTenderController extends Controller
{

            public function doneorno(Request $request){
                // return $request;
                
                $user_id = Auth::id();

                $request_id = $request->request_id;

                $request_tender = request_tender::find($request_id);
                $done='';

                if($request->status_project=='yes'){
                    $done=1;
                }else{
                    $done=0;

                }

                $request_tender->status_project = $done;
                $request_tender->notes = $request->notes;


                $request_tender->save();
                
            }
        public function SaveFilesTender(Request $request){

            $file = $request->file('threeD');
            $FilesID = $request->FilesID;

            if($request->hasFile('contract')  ){


                $contracts= $request->file('contract');
    
    
                 $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                    $file_extension_pass = $imagePassport= $request->file('contract');
    
    
                    $ContractPath = $contracts->storeAs('consulting/Tendercontract', $ContractName, 'public');
    
                    $imagePassport->move(public_path('consulting/Tendercontract'), $ContractName);
    
    
    
                
            $contract =  TenderContrat::create([
               
                'ContractName'=>$ContractName,
                'ContractPath'=>$ContractPath,
                'request_id'=>$request->request_id,
                
            ]);
    
         
    
            return 'true';
        }
        
            if($request->hasFile('threeD')){
            $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
            $file_path_threeD= $file->storeAs('Construction/threeD', $file_threeD, 'public');
            $file->move(public_path('Construction/threeD'), $file_threeD);


            $saved_tenders = saved_tenders::find($FilesID);
            $saved_tenders->threeDPath = $file_path_threeD;
            $saved_tenders->threeDName = $file_threeD ;
            $saved_tenders->save();

            }

            if($request->hasFile('ThreeDDWG')){
                $file = $request->file('ThreeDDWG');
                $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
                $file_path_threeD= $file->storeAs('Construction/threeD', $file_threeD, 'public');
                $file->move(public_path('Construction/threeD'), $file_threeD);
    
    
                $saved_tenders = saved_tenders::find($FilesID);
                $saved_tenders->ThreeDDWG = $file_path_threeD;
                $saved_tenders->save();
    
                }

                if($request->hasFile('servicesDWG')){
                    $file = $request->file('servicesDWG');
                    $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_threeD= $file->storeAs('Construction/services', $file_threeD, 'public');
                    $file->move(public_path('Construction/services'), $file_threeD);
        
        
                    $saved_tenders = saved_tenders::find($FilesID);
                    $saved_tenders->servicesDWG = $file_path_threeD;
                    $saved_tenders->save();
        
                    }

                    if($request->hasFile('SpecificationsDWG')){
                        $file = $request->file('SpecificationsDWG');
                        $file_threeD = 'Amb_SpecificationsDWG' . time() . '_' . $file->getClientOriginalName();
                        $file_path_threeD= $file->storeAs('Construction/Specification', $file_threeD, 'public');
                        $file->move(public_path('Construction/Specifications'), $file_threeD);
            
            
                        $saved_tenders = saved_tenders::find($FilesID);
                        $saved_tenders->SpecificationsEXCEL = $file_path_threeD;
                        $saved_tenders->save();
            
                        }

                        if($request->hasFile('structureDWG')){
                            $file = $request->file('structureDWG');
                            $file_threeD = 'Amb_StructureDWG' . time() . '_' . $file->getClientOriginalName();
                            $file_path_threeD= $file->storeAs('Construction/StructureDWG', $file_threeD, 'public');
                            $file->move(public_path('Construction/StructureDWG'), $file_threeD);
                
                
                            $saved_tenders = saved_tenders::find($FilesID);
                            $saved_tenders->StructureDWG = $file_path_threeD;
                            $saved_tenders->save();
                
                            }

                            if($request->hasFile('archDWG')){
                                $file = $request->file('archDWG');
                                $file_threeD = 'Amb_archDWG' . time() . '_' . $file->getClientOriginalName();
                                $file_path_threeD= $file->storeAs('Construction/arch', $file_threeD, 'public');
                                $file->move(public_path('Construction/arch'), $file_threeD);
                    
                    
                                $saved_tenders = saved_tenders::find($FilesID);
                                $saved_tenders->ArchitectDWG = $file_path_threeD;
                                $saved_tenders->save();
                    
                                }
                            

            
        
        
    

                
            

          
           

            if($request->hasFile('Architect')){
                $file = $request->file('Architect');
                $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Architect= $file->storeAs('Stone/Architect', $file_Architect, 'public');
                $file->move(public_path('Stone/Architect'), $file_Architect);

                $saved_tenders = saved_tenders::find($FilesID);
                $saved_tenders->ArchitectPath = $file_path_Architect;
                $saved_tenders->ArchitectName = $file_Architect ;
                $saved_tenders->save();

                }

                if($request->hasFile('services')){
                    $file = $request->file('services');
                    $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_services = $file->storeAs('Construction/services', $file_services, 'public');
                    $file->move(public_path('Construction/services'), $file_services);


                    $saved_tenders = saved_tenders::find($FilesID);
                    $saved_tenders->servicesPath = $file_path_services;
                    $saved_tenders->servicesName = $file_services ;
                    $saved_tenders->save();

                }

                if($request->hasFile('Structure')){


                    $file = $request->file('Structure');
                    $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_Structure = $file->storeAs('Stone/Structure', $file_Structure, 'public');
                    $file->move(public_path('Stone/Structure'), $file_Structure);

                    $saved_tenders = saved_tenders::find($FilesID);
                    $saved_tenders->StructurePath = $file_path_Structure;
                    $saved_tenders->StructureName = $file_Structure ;
                    $saved_tenders->save();

                }

                if($request->hasFile('Specifications')){


                    $file = $request->file('Specifications');
                    $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_Specifications = $file->storeAs('Stone/Specifications', $file_name_Specifications, 'public');
                    $file->move(public_path('Stone/Specifications'), $file_name_Specifications);

                    $saved_tenders = saved_tenders::find($FilesID);
                    $saved_tenders->SpecificationsPath = $file_path_Specifications;
                    $saved_tenders->SpecificationsName = $file_name_Specifications ;
                    $saved_tenders->save();


                }
                if($request->hasFile('identity')){


                    $file = $request->file('identity');
                    $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_identity = $file->storeAs('Stone/identity', $file_name_identity, 'public');
                    $file->move(public_path('Stone/identity'), $file_name_identity);


                $saved_tenders = saved_tenders::find($FilesID);
                $saved_tenders->identityPath = $file_path_identity;
                $saved_tenders->identityName = $file_name_identity ;
                $saved_tenders->save();

            }
            if($request->hasFile('map')){


                $file = $request->file('map');
                $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
                $file_path_map = $file->storeAs('Stone/map', $file_name_map, 'public');
                $file->move(public_path('Stone/map'), $file_name_map);

            $saved_tenders = saved_tenders::find($FilesID);
            $saved_tenders->mapPath = $file_path_map;
            $saved_tenders->mapName = $file_name_map ;
            $saved_tenders->save();

        }
    }
    public function SavedNotesTender(Request $request){
        $id = $request->id;

        $request_tender = saved_tenders::find($id);
        $request_tender->notes = $request->notes;

        $request_tender->save();
    }
    public function SavedTitleTender(Request $request){

            $id = $request->id;

            $request_tender = saved_tenders::find($id);
            $request_tender->title = $request->title;

            $request_tender->save();
    }
    public function SavedTender(Request $request){
       $id =  $request->id ;

       $saved = saved_tenders::where('request_id',$id)->get();

       return $saved;
    }
    public function consulting(){

           $request_tenders = request_tender::where('type','consulting')->with('user','company','toffers','Tconsulte','contract')->where('user_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;

    }
    public function stone(){
        // $tconsr = Tconstr::where('user_id',Auth::id())->with('user')->get();
        $request_tenders = request_tender::where('type','stone')->with('user','company','offerStone','stone')->where('user_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;




    }
    public function hvac(){
        // $tconsr = Tconstr::where('user_id',Auth::id())->with('user')->get();
        $request_tenders = request_tender::where('type','hvac')->with('user','company','offerHvac','hvac')->where('user_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;




    }
    public function constructions(){
        // $tconsr = Tconstr::where('user_id',Auth::id())->with('user')->get();
        $request_tenders = request_tender::where('type','construction')->with('user','company','offerConsr','tconsr')->where('user_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;




    }
    public function consultingCompany(){

        $request_tenders = request_tender::where('type','consulting')->with('user','company','toffers','Tconsulte')->where('com_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;
    }

    public function constructionsCompany(){

        $request_tenders = request_tender::where('type','construction')->with('user','company','offerConsr','tconsr')->where('com_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;
    }
    public function StoneCompany(){

        $request_tenders = request_tender::where('type','stone')->with('user','company','offerStone','stone')->where('com_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;
    }
    public function hvacCompany(){

        $request_tenders = request_tender::where('type','hvac')->with('user','company','offerHvac','hvac')->where('com_id',Auth::id())->latest()->get();
        foreach($request_tenders as $tender){


        $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    }

        return response()->json($request_tenders) ;
    }

    public function requestConstructionsDetails(Request $request){

        if($request->type=="interior"){

            $user_id = Auth::id();

                $user =User::find($user_id);

                $type =  $request->type;
                $id =  $request->id;


        if($user->role_id==10){


            // $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())->where('type',$type)->get();
            $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())
            ->where('type',$type)->with('review.user')->get();

            foreach ($request_tenders as $request_tender){


                $tconsr = Tinterior::where('id',$request_tender->tender_id)->with('user')->get();



                $offerConsr = offerInterior::where('id',$request_tender->offer_id)
                ->with('user','tender','image')->get();

                foreach($offerConsr as $offer){
                    $offer->setAttribute('buyer',$tconsr);
                }




                $request_tender->setAttribute('confirm',$offerConsr);



                 $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



            }
            return $request_tenders;

     }
     elseif($user->role_id==5){


        $request_tenders = request_tender::where('id',$id)->where('com_id',Auth::id())->where('type',$type)->with('review.user')->get();
        foreach ($request_tenders as $request_tender){


            $tconsr = Tinterior::where('id',$request_tender->tender_id)->with('user')->get();



            $offerConsr = offerInterior::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

            foreach($offerConsr as $offer){
                $offer->setAttribute('buyer',$tconsr);
            }




            $request_tender->setAttribute('confirm',$offerConsr);



             $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



        }
        return $request_tenders;
  }
     

    }
        if($request->type=="stone"){



            $user_id = Auth::id();

                $user =User::find($user_id);

                $type =  $request->type;
                $id =  $request->id;


        if($user->role_id==10){


            // $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())->where('type',$type)->get();
            $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())->where('type',$type)->with('review.user')->get();

            foreach ($request_tenders as $request_tender){


                $tconsr = stone::where('id',$request_tender->tender_id)->with('user')->get();



                $offerConsr = OfferStone::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

                foreach($offerConsr as $offer){
                    $offer->setAttribute('buyer',$tconsr);
                }




                $request_tender->setAttribute('confirm',$offerConsr);



                 $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



            }
            return $request_tenders;

     }
        elseif($user->role_id==3){


                    $request_tenders = request_tender::where('id',$id)->where('com_id',Auth::id())->where('type',$type)->with('review.user')->get();
                    foreach ($request_tenders as $request_tender){


                        $tconsr = stone::where('id',$request_tender->tender_id)->with('user')->get();



                        $offerConsr = OfferStone::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

                        foreach($offerConsr as $offer){
                            $offer->setAttribute('buyer',$tconsr);
                        }




                        $request_tender->setAttribute('confirm',$offerConsr);



                         $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



                    }
                    return $request_tenders;
              }

            }
        if($request->type=="hvac"){


            $user_id = Auth::id();

                $user =User::find($user_id);

                $type =  $request->type;
                $id =  $request->id;


        if($user->role_id==10){


            $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())->where('type',$type)->with('review.user')->get();
            foreach ($request_tenders as $request_tender){


                $tconsr = hvac::where('id',$request_tender->tender_id)->with('user')->get();



                $offerConsr = OfferHvac::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

                foreach($offerConsr as $offer){
                    $offer->setAttribute('buyer',$tconsr);
                }




                $request_tender->setAttribute('confirm',$offerConsr);



                 $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



            }
            return $request_tenders;

     }

                elseif($user->role_id==4){


                    $request_tenders = request_tender::where('id',$id)->where('com_id',Auth::id())->where('type',$type)->with('review.user')->get();

                    foreach ($request_tenders as $request_tender){


                        $tconsr = hvac::where('id',$request_tender->tender_id)->with('user')->get();



                        $offerConsr = OfferHvac::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

                        foreach($offerConsr as $offer){
                            $offer->setAttribute('buyer',$tconsr);
                        }




                        $request_tender->setAttribute('confirm',$offerConsr);



                         $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



                    }
                    return $request_tenders;
              }

            }

      if($request->type=="construction"){


        $user_id = Auth::id();

            $user =User::find($user_id);

            $type =  $request->type;
            $id =  $request->id;


    if($user->role_id==10 || $user->role_id==1 ){


        $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())->where('type',$type)->with('review.user')->get();
        foreach ($request_tenders as $request_tender){


            $tconsr = Tconstr::where('id',$request_tender->tender_id)->with('user')->get();



            $offerConsr = offerConsr::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

            foreach($offerConsr as $offer){
                $offer->setAttribute('buyer',$tconsr);
            }




            $request_tender->setAttribute('confirm',$offerConsr);



             $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



        }
        return $request_tenders;

 }
            elseif($user->role_id==6){



                $request_tenders = request_tender::where('id',$id)->where('com_id',Auth::id())->where('type',$type)->with('review.user')->get();
                foreach ($request_tenders as $request_tender){


                    $tconsr = Tconstr::where('id',$request_tender->tender_id)->with('user')->get();



                    $offerConsr = offerConsr::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

                    foreach($offerConsr as $offer){
                        $offer->setAttribute('buyer',$tconsr);
                    }




                    $request_tender->setAttribute('confirm',$offerConsr);



                     $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



                }
                return $request_tenders;
          }

        }

        if($request->type=="consulting"){


            $user_id = Auth::id();

                $user =User::find($user_id);

                $type =  $request->type;
                $id =  $request->id;


        if($user->role_id==10){
            
            $request_tenders = request_tender::where('id',$id)->where('user_id',Auth::id())->where('type',$type)->
            with('review.user','contract','saved_tenders',
            'toffers.contractsConsrcution','toffers.contractsStone'
            ,'toffers.contractsHvac','toffers.contractsInterior','toffers.constfollowup')->
            with('converted')->
            with(['ConstructionReview' =>function($query){
                $query->where('type','construction')->where('from',1)->with('user')->with('company');
            }])->
            with(['HvacReview'=>function($query){
                $query->where('type','hvac')->where('from',1)->with('user')->with('company');
            }])->
       with(['StoneReview'=>function($query){
            $query->where('type','stone')->where('from',1)->with('user')->with('company');
        }])->
        with(['InteriorReview'=>function($query){
            $query->where('type','interior')->where('from',1)->with('user')->with('company');
        }])->
            get();
            foreach ($request_tenders as $request_tender){


                $tconsr = Tconsulte::where('id',$request_tender->tender_id)->with('user')->get();



                $offerConsr = Toffers::where('id',$request_tender->offer_id)->with('user','tender','images')->get();

                foreach($offerConsr as $offer){
                    $offer->setAttribute('buyer',$tconsr);
                }




                $request_tender->setAttribute('confirm',$offerConsr);
                if($request_tender->review){
                $request_tender->setAttribute('review_added_at',$request_tender->review->created_at->diffForHumans());
                }




                 $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



            }
            return $request_tenders;

     }
                elseif($user->role_id==1){


                    $request_tenders = request_tender::where('id',$id)->with('contract','saved_tenders','toffers.contractsConsrcution','toffers.contractsStone'
                    ,'toffers.contractsHvac','toffers.contractsInterior','toffers.constfollowup')->where('com_id',Auth::id())->where('type',$type)->get();
                    foreach ($request_tenders as $request_tender){


                        $tconsr = Tconsulte::where('id',$request_tender->tender_id)->with('user')->get();



                        $offerConsr = Toffers::where('id',$request_tender->offer_id)->with('user','tender','images')->get();

                        foreach($offerConsr as $offer){
                            $offer->setAttribute('buyer',$tconsr);
                        }




                        $request_tender->setAttribute('confirm',$offerConsr);



                         $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



                    }
                    return $request_tenders;
              }

            }


    }
    public function ConvertToTender(Request $request){
        
// return $request;
        if($request->tenderNumber==1){

        $Constr =    Tconstr::create([
            'title'=>$request->title,
            'notes'=>$request->Description,
            'emirates'=>$request->Emirates,
            'company_name'=>$request->name_age,
            'user_id'=>Auth::id(),
            'status'=>0,

        ]);

        $tender_id =   $Constr->id;
       


        $TenderFrom =    tenderfromtender::create([
            'type'=>'construction',
            'converterType'=>'tender',
            'tender_id'=>$tender_id,
            'request_id'=>$request->request_id,


        ]);
 
        ConstructionFiles::create([
            "ArchitectPath" => $request->ArchitectPath,
            "ArchitectName" =>'ArchitectFile',
            "StructurePath" =>$request->StructurePath,
            "StructureName" => 'StructureFile',
            "threeDName" =>'threeDFile',
            "threeDPath" =>$request->threeDPath,
            'soil'=>$request->soil,
            "SpecificationsPath" => $request->SpecificationsPath,
            "SpecificationsName" =>'SpecificationsFile',
            "mapPath" => $request->mapPath,
            "mapName" =>'MapFile',
            "identityPath" => $request->identityPath,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,

            "ThreeDDWG" =>$request->ThreeDDWG,
            "ArchitectDWG" =>$request->ArchitectDWG,
            "StructureDWG" =>$request->StructureDWG,
            "SpecificationsEXCEL" =>$request->SpecificationsEXCEL,
            "servicesDWG" =>$request->servicesDWG,

            "tender_id" =>$tender_id,
        ]);

        return 'Success Tender ';
    }
    if($request->tenderNumber==2){

        $Constr =    hvac::create([
            'title'=>$request->title,
            'notes'=>$request->Description,
            'emirates'=>$request->Emirates,
            'company_name'=>$request->name_age,
            'user_id'=>Auth::id(),
            'status'=>0,

        ]);

       $tender_id =   $Constr->id;
       
       $TenderFrom =    tenderfromtender::create([
        'type'=>'hvac',
        'converterType'=>'tender',
        'tender_id'=>$tender_id,
        'request_id'=>$request->request_id,
       ]);

       HvacFiles::create([
        "ArchitectPath" => $request->ArchitectPath,
            "ArchitectName" =>'ArchitectFile',
            "StructurePath" =>$request->StructurePath,
            "StructureName" => 'StructureFile',
            "threeDName" =>'threeDFile',
            "threeDPath" =>$request->threeDPath,
            "SpecificationsPath" => $request->SpecificationsPath,
            "SpecificationsName" =>'SpecificationsFile',
            "mapPath" => $request->mapPath,
            "mapName" =>'MapFile',
            "identityPath" => $request->identityPath,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
            "ThreeDDWG" =>$request->ThreeDDWG,
            "ArchitectDWG" =>$request->ArchitectDWG,
            "StructureDWG" =>$request->StructureDWG,
            "SpecificationsEXCEL" =>$request->SpecificationsEXCEL,
            "servicesDWG" =>$request->servicesDWG,
       ]);
            
            // return $tender_id;
            broadcast(new NewTenderHvac($Constr->user , $Constr));
            $admins = admin::where('role_id',1)->get();
            Notification::send($admins, new NotifyNewTenderHvac($Constr->user,$Constr));
            return 'success';
    }

    if($request->tenderNumber==3){

        $Constr =    stone::create([
            'title'=>$request->title,
            'notes'=>$request->Description,
            'emirates'=>$request->Emirates,
            'company_name'=>$request->name_age,
            'user_id'=>Auth::id(),
            'status'=>0,

        ]);

       $tender_id =   $Constr->id;
       
       $TenderFrom =    tenderfromtender::create([
        'type'=>'stone',
        'converterType'=>'tender',
        'tender_id'=>$tender_id,
        'request_id'=>$request->request_id,
       ]);

       StoneFiles::create([
        "ArchitectPath" => $request->ArchitectPath,
            "ArchitectName" =>'ArchitectFile',
            "StructurePath" =>$request->StructurePath,
            "StructureName" => 'StructureFile',
            "threeDName" =>'threeDFile',
            "threeDPath" =>$request->threeDPath,
            "SpecificationsPath" => $request->SpecificationsPath,
            "SpecificationsName" =>'SpecificationsFile',
            "mapPath" => $request->mapPath,
            "mapName" =>'MapFile',
            "identityPath" => $request->identityPath,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
            "ThreeDDWG" =>$request->ThreeDDWG,
            "ArchitectDWG" =>$request->ArchitectDWG,
            "StructureDWG" =>$request->StructureDWG,
            "SpecificationsEXCEL" =>$request->SpecificationsEXCEL,
            "servicesDWG" =>$request->servicesDWG,

       ]);
            
            // return $tender_id;
      

    }
    if($request->tenderNumber==4){
        

        $Tinterior =    Tinterior::create([
            'title'=>$request->title,
            'notes'=>$request->Description,
            'emirates'=>$request->Emirates,
            'company_name'=>$request->name_age,
            'user_id'=>Auth::id(),
            'status'=>0,

        ]);

       $tender_id =   $Tinterior->id;
       
       $TenderFrom =    tenderfromtender::create([
        'type'=>'interior',
        'converterType'=>'tender',
        'tender_id'=>$tender_id,
        'request_id'=>$request->request_id,
       ]);

       InteriorFiles::create([
        "ArchitectPath" => $request->ArchitectPath,
            "ArchitectName" =>'ArchitectFile',
            "StructurePath" =>$request->StructurePath,
            "StructureName" => 'StructureFile',
            "threeDName" =>'threeDFile',
            "threeDPath" =>$request->threeDPath,
            "SpecificationsPath" => $request->SpecificationsPath,
            "SpecificationsName" =>'SpecificationsFile',
            "mapPath" => $request->mapPath,
            "mapName" =>'MapFile',
            "identityPath" => $request->identityPath,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
            "ThreeDDWG" =>$request->ThreeDDWG,
            "ArchitectDWG" =>$request->ArchitectDWG,
            "StructureDWG" =>$request->StructureDWG,
            "SpecificationsEXCEL" =>$request->SpecificationsEXCEL,
            "servicesDWG" =>$request->servicesDWG,
       ]);
            
            // return $tender_id;
      

    }
    }
    public function com_confirm(Request $request){


            $com_id = Auth::id();

            $request_id = $request->request_id;

            $request_tender = request_tender::find($request_id);

            $request_tender->com_confirm = 1;

            $user =  $request_tender->user;


            $request_tender->save();
            $company = $request_tender->company;
            if($request_tender->type=="consulting"){


            $user->notify(new NotifyCompanyConulteConfirmTender($company,$request_tender));

            $admin = admin::where('role_id',1)->get();

            broadcast(new companyAdminConsulteConfirmTender($company,$request_tender));
            Notification::send($admin, new NotifyCompanyConulteConfirmTender($company,$request_tender));

            }

            if($request_tender->type=="construction"){
                Broadcast(new CompleteConstructionTender($request_tender));
                 $user->notify(new NotifyCompleteConstructionTender($request_tender));
                $admin = admin::where('role_id',1)->get();
                Notification::send($admin, new NotifyCompleteConstructionTender($request_tender));
            }

            if($request_tender->type=="hvac"){
                Broadcast(new CompleteHvacTender($request_tender));
                 $user->notify(new NotifyCompleteHvacTender($request_tender));
                $admin = admin::where('role_id',1)->get();
                Notification::send($admin, new NotifyCompleteHvacTender($request_tender));
            }









    }
    public function ConractsUpdateTender(Request $request){
    
        if($request->hasFile('Flow')  ){

            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(100, 999). mt_rand(100, 999) . $characters[rand(0, strlen($characters) - 1)];
            // shuffle the result
            $string = str_shuffle($pin);


            $flow= $request->file('Flow');


             $Flowupame = 'Flow'.$string.'_'.$flow->getClientOriginalName();
           


                $FlowuptPath = $flow->storeAs('Construction/Flow', $Flowupame, 'public');

                $flow->move(public_path('Construction/Flow'), $Flowupame);



      
              $flow = new constfollowupTender();
        $flow->offer_id = $request->offer_id;
        $flow->date = $request->dateFlow;
        $flow->name = $Flowupame;
        $flow->path = $FlowuptPath;
      
        $flow->save();
 
        return 'true';
        }
        if($request->hasFile('contract')  ){
    
    
            $contracts= $request->file('contract');
    
    
             $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('contract');
    
    
                $ContractPath = $contracts->storeAs('construcion/Offercontract', $ContractName, 'public');
    
                $imagePassport->move(public_path('construcion/Offercontract'), $ContractName);
    
    
    
            
        $contract =  contractsConsrcutiontender::create([
           
            'ContractName'=>$ContractName,
            'ContractPath'=>$ContractPath,
            'offer_id'=>$request->offer_id,
           
            
        ]);
    
    
    
        return 'true';
    }

    if($request->hasFile('contractstone')  ){
    
    
        $contracts= $request->file('contractstone');


         $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
            $file_extension_pass = $imagePassport= $request->file('contractstone');


            $ContractPath = $contracts->storeAs('Stone/Offercontract', $ContractName, 'public');

            $imagePassport->move(public_path('Stone/Offercontract'), $ContractName);



        
    $contract =  contractsstonetender::create([
       
        'ContractName'=>$ContractName,
        'ContractPath'=>$ContractPath,
        'offer_id'=>$request->offer_id,
       
        
    ]);



    return 'true';
}

if($request->hasFile('contractHvac')  ){
    
    
    $contracts= $request->file('contractHvac');


     $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
        $file_extension_pass = $imagePassport= $request->file('contractHvac');


        $ContractPath = $contracts->storeAs('hvac/Offercontract', $ContractName, 'public');

        $imagePassport->move(public_path('hvac/Offercontract'), $ContractName);



    
$contract =  contractshvactender::create([
   
    'ContractName'=>$ContractName,
    'ContractPath'=>$ContractPath,
    'offer_id'=>$request->offer_id,
   
    
]);



return 'true';
}

if($request->hasFile('contractInterior')  ){
    
    
    $contracts= $request->file('contractInterior');


     $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
        $file_extension_pass = $imagePassport= $request->file('contractInterior');


        $ContractPath = $contracts->storeAs('interior/Offercontract', $ContractName, 'public');

        $imagePassport->move(public_path('interior/Offercontract'), $ContractName);



    
$contract =  contractsinteriortender::create([
   
    'ContractName'=>$ContractName,
    'ContractPath'=>$ContractPath,
    'offer_id'=>$request->offer_id,
   
    
]);



return 'true';
}

    
    }

    public function user_confirm(Request $request){




        $request_id = $request->request_id;

        $request_tender = request_tender::find($request_id);

            $request_tender->user_confirm = 1;
            $request_tender->result = 'done';

            $request_tender->save();
            $user = $request_tender->company;
            $admin = admin::where('role_id',1)->get();

    if($request_tender->count() > 0){

        if($request->request_type=="consulting"){
            $tender = Tconsulte::find($request_tender->tender_id);

            $tender->stage = 2;
            $tender->status = 3;
            $tender->save();

        

            broadcast(new companyDoneConsulte($tender->user , $request_tender));

            Notification::send($admin, new NotifyAdminCompanyDoneConsulte($tender->user,$tender));


            $user->notify(new NotifyAdminCompanyDoneConsulte($tender->user,$request_tender));
            saved_tenders::create([
                "request_id" => $request->request_id,
                "com_id" => $request_tender->com_id,
            ]);



        }

        if($request->request_type=="construction"){
            $Tconstr = Tconstr::find($request_tender->tender_id);
            $Tconstr->stage = 2;
            $Tconstr->status = 3;
            $Tconstr->save();



            broadcast(new companyDoneConstruction( $request_tender));
            Notification::send($admin, new NotifycompanyDoneConstruction($request_tender));


            $user->notify(new NotifycompanyDoneConstruction($request_tender));


            // NotifycompanyDoneConstruction




        }
        if($request->request_type=="hvac"){
            $Tconstr = hvac::find($request_tender->tender_id);
            $Tconstr->stage = 2;
            $Tconstr->status = 3;
            $Tconstr->save();

            broadcast(new companyDoneConstruction( $request_tender));
            Notification::send($admin, new NotifycompanyDoneHvac($request_tender));


            $user->notify(new NotifycompanyDoneHvac($request_tender));
        }

        if($request->request_type=="stone"){

            $Tconstr = stone::find($request_tender->tender_id);
            $Tconstr->stage = 2;
            $Tconstr->status = 3;
            $Tconstr->save();
        }

    }

    // return $this->constructionsCompany();




    }
    public function requestConstructionsDetailsCompany(Request $request){

        $type =  $request->type;
        $id =  $request->id;

        $request_tenders = request_tender::where('id',$id)->where('com_id',Auth::id())->where('type',$type)->get();



        foreach ($request_tenders as $request_tender){


            $tconsr = Tconstr::where('id',$request_tender->tender_id)->with('user')->get();



            $offerConsr = offerConsr::where('id',$request_tender->offer_id)->with('user','tender','image')->get();

            foreach($offerConsr as $offer){
                $offer->setAttribute('buyer',$tconsr);
            }




            $request_tender->setAttribute('confirm',$offerConsr);



             $request_tender->setAttribute('added_at',$request_tender->created_at->diffForHumans());



        }
        return $request_tenders;
    }
    public function user_cancel(Request $request){


        $request_id = $request->request_id;

        $request_tender = request_tender::find($request_id);


        $request_tender->reason_user = $request->reason_cancel;
        $request_tender->result = 'cancel';

    $request_tender->save();

     $user = $request_tender->user;
     $admin = admin::where('role_id',1)->get();
     $com = $request_tender->company;

     if($request->type=='consulting'){
        event(new companyCancelConsulte($user, $request_tender));


        Notification::send($admin, new NotifyCompanyCancelConsulte($user,$request_tender));

       $com->notify( new NotifyCompanyCancelConsulte($user,$request_tender));

     }

     if($request->type=='construction'){
        event(new UserCancelConstruction($user, $request_tender));
        Notification::send($admin, new NotifyUserCancelConstruction($user,$request_tender));
        $com->notify( new NotifyUserCancelConstruction($user,$request_tender));



    }

    if($request->type=='hvac'){
        event(new  UserCancelHvac($user, $request_tender));
        Notification::send($admin, new NotifyUserCancelHvac($user,$request_tender));
        $com->notify( new NotifyUserCancelHvac($user,$request_tender));



    }
    return  $request_tender->reason_user;


    }

    public function com_cancel(Request $request){

        // return $request->all();
        $request_id = $request->request_id;

        $request_tender = request_tender::find($request_id);

        $com = $request_tender->company;

        $request_tender->reason_com = $request->reason_cancel;
        $request_tender->result = 'cancel';
        $user = $request_tender->user;
        $request_tender->save();

        $admin = admin::where('role_id',1)->get();

        if($request->type=='consulting'){
            event(new companyCancelConsulte($com, $request_tender));


             Notification::send($admin, new NotifyUserCancelConsulte($com,$request_tender));

            $user->notify( new NotifyCompanyCancelConsulte($com,$request_tender));
        }


            if($request->type=='construction'){
                event(new companyCancelConstruction($com, $request_tender));
                Notification::send($admin, new NotifyCompanyCancelConstruction($com,$request_tender));
                $user->notify( new NotifyCompanyCancelConstruction($com,$request_tender));



            }

            if($request->type=='hvac'){
                event(new companyCancelHvac($com, $request_tender));


                 Notification::send($admin, new NotifycompanyCancelHvac($com,$request_tender));

                $user->notify( new NotifycompanyCancelHvac($com,$request_tender));
            }



    return  $request_tender->reason_user;


    }
}

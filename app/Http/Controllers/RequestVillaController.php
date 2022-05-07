<?php

namespace App\Http\Controllers;

use App\clickedRequest;
use App\constfollowup;
use App\ConstructionFiles;
use App\contract;
use App\contractsConsrcution;
use App\contractsHvac;
use App\contractsInterior;
use App\contractsStone;
use App\Events\NewTenderHvac;
use App\hvac;
use App\HvacFiles;
use App\InteriorFiles;
use App\Models\admin;
use App\Notifications\NotifyNewTenderHvac;
use App\offer_villa;
use App\offersvillafiles;
use App\request_tender;
use App\request_villa;
use App\stone;
use App\StoneFiles;
use App\tconsl_img;
use App\Tconstr;
use App\Tconsulte;
use App\TenderFrom;
use App\Tinterior;
use App\Toffers;
use App\User;
use App\Villa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class RequestVillaController  extends Controller
{


public function doneornoInVillaReqquester(Request $request){
       
    $user_id = Auth::id();

    $request_id = $request->request_id;

    $request_tender = request_villa::find($request_id);
    $done='';

    if($request->status_project=='yes'){
        $done=1;
    }else{
        $done=0;

    }

    $request_tender->status_project = $done;
    $request_tender->notesstatus = $request->notesstatus;


    $request_tender->save();
}

    public function ConvertToTender(Request $request){
        
        // return $request
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
       


        $TenderFrom =    TenderFrom::create([
            'type'=>'construction',
            'converterType'=>'villa',
            'tender_id'=>$tender_id,
            'request_id'=>$request->request_id,


        ]);

        ConstructionFiles::create([
            "ArchitectPath" => $request->ArchitectPath,
            "ArchitectName" =>'ArchitectFile',
            "StructurePath" =>$request->StructurePath,
            "StructureName" => 'StructureFile',
            "threeDName" =>'threeDFile',
            "soil"=>$request->soil,
            "threeDPath" =>$request->threeDPath,
            "SpecificationsPath" => $request->SpecificationsPath,
            "SpecificationsName" =>'SpecificationsFile',
            "mapPath" => $request->passport_path,
            "mapName" =>'MapFile',
            "identityPath" => $request->passport_path,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
        ]);
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
       
       $TenderFrom =    TenderFrom::create([
        'type'=>'hvac',
        'converterType'=>'villa',
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
            "mapPath" => $request->passport_path,
            "mapName" =>'MapFile',
            "identityPath" => $request->passport_path,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
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
       
       $TenderFrom =    TenderFrom::create([
        'type'=>'stone',
        'converterType'=>'villa',
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
            "mapPath" => $request->passport_path,
            "mapName" =>'MapFile',
            "identityPath" => $request->passport_path,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
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
       
       $TenderFrom =    TenderFrom::create([
        'type'=>'interior',
        'converterType'=>'villa',
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
            "mapPath" => $request->passport_path,
            "mapName" =>'MapFile',
            "identityPath" => $request->passport_path,
            "identityName" =>'identityFile',
            "servicesName" =>'servicesFile',
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
       ]);
            
            // return $tender_id;
      

    }

        //         broadcast(new NewTenderConstruction($Constr->user,$Constr));
        //         $admins = admin::where('role_id',1)->get();

        //         Notification::send($admins, new NotifyNewTenderConstruction($Constr->user,$Constr));

        //         $posts = saved_tenders::where('request_id',$requestID)->get();
        //         foreach($posts as $tender){
        //             $tender->submitted = 1;
        //             $tender->SumbittedID =$tender_id;

        //             $tender->save();
                


               
        // }
    }
    
    public function requestFlowup(Request $request){

          
 
             
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



      
              $flow = new constfollowup();
        $flow->offer_id = $request->offer_id;
        $flow->date = $request->dateFlow;
        $flow->name = $Flowupame;
        $flow->path = $FlowuptPath;
      
        $flow->save();
 
        return 'true';
        }

    }
    public function requestVilla(Request $request){

        
        // return $request;
             
        $offer_villa = offer_villa::find($request->id);
            
        $offer_villa->design = $request->design;
        $offer_villa->supervison = $request->Supervisor;
        $offer_villa->sqft = $request->tab;
        $offer_villa->budget = $request->budget;
      

        $offer_villa->save();
 
        return 'true';

    }
    public function OfferAgree(Request $request){
        $offer_villa = offer_villa::where('request_id',$request->request_id)->first();
       

        if($request->agree==0){
         $offer_villa->design = null;
        $offer_villa->supervison = null;
        $offer_villa->sqft = null;
        $offer_villa->budget = null;
        $offer_villa->agree = 0;
        $offer_villa->save();
        return 'false';
        }else{
            $offer_villa->agree = 1;
            $offer_villa->save();
            return 'true';
        }
            

      

        
 
        return 'true';
    }
    
    public function ConractsInterior(Request $request){
    

        if($request->hasFile('contract')  ){


            $contracts= $request->file('contract');


             $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('contract');


                $ContractPath = $contracts->storeAs('interior/Offercontract', $ContractName, 'public');

                $imagePassport->move(public_path('interior/Offercontract'), $ContractName);



            
        $contract =  contractsInterior::create([
           
            'ContractName'=>$ContractName,
            'ContractPath'=>$ContractPath,
            'offer_id'=>$request->offer_id,
           
            
        ]);

    

        return 'true';
    }
}

    public function ConractsHvac(Request $request){
    

        if($request->hasFile('contract')  ){


            $contracts= $request->file('contract');


             $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('contract');


                $ContractPath = $contracts->storeAs('hvac/Offercontract', $ContractName, 'public');

                $imagePassport->move(public_path('hvac/Offercontract'), $ContractName);



            
        $contract =  contractsHvac::create([
           
            'ContractName'=>$ContractName,
            'ContractPath'=>$ContractPath,
            'offer_id'=>$request->offer_id,
           
            
        ]);

    

        return 'true';
    }
}
    public function Conractsstone(Request $request){
    

        if($request->hasFile('contract')  ){


            $contracts= $request->file('contract');


             $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('contract');


                $ContractPath = $contracts->storeAs('Stone/Offercontract', $ContractName, 'public');

                $imagePassport->move(public_path('Stone/Offercontract'), $ContractName);



            
        $contract =  contractsStone::create([
           
            'ContractName'=>$ContractName,
            'ContractPath'=>$ContractPath,
            'offer_id'=>$request->offer_id,
           
            
        ]);

    

        return 'true';
    }
}
    
    public function ConractsConstruction(Request $request){
    

        if($request->hasFile('contract')  ){


            $contracts= $request->file('contract');


             $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('contract');


                $ContractPath = $contracts->storeAs('construcion/Offercontract', $ContractName, 'public');

                $imagePassport->move(public_path('construcion/Offercontract'), $ContractName);



            
        $contract =  contractsConsrcution::create([
           
            'ContractName'=>$ContractName,
            'ContractPath'=>$ContractPath,
            'offer_id'=>$request->offer_id,
           
            
        ]);

    

        return 'true';
    }
}
    
    public function ConractsConsulting(Request $request){
    

        if($request->hasFile('contract')  ){


            $contracts= $request->file('contract');
            $ContractName = 'amb_project_management'.time().'_'.$contracts->getClientOriginalName();
                
          

                $ContractPath = $contracts->storeAs('consulting/offercontract', $ContractName, 'public');
                
                $contracts->move(public_path('consulting/offercontract'), $ContractName);




         offersvillafiles::create([
                'offer_id' =>  $request->offer_id,
         
            ]);
    
            
        $contract =  contract::create([
            'ContractName'=>$ContractName,
            'ContractPath'=>$ContractPath,
            'offer_id'=>$request->offer_id,            
        ]);

           
            return 'true';
        }


     
    
    
   
    }

    public function soilFileVilla(Request $request){
        $offer_id =$request->offer_id;
        // return $request->all();
       
            
            $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
        
            $offersvillafiles->soil = $request->soil;
            
            $offersvillafiles->save();
    }

    public function FileOffersConsulting(Request $request){
        
        $offer_id =$request->offer_id;
        // return $request->all();
       
            
            $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
        
            $offersvillafiles->soil = $request->soil;
            
            $offersvillafiles->save();
     
        if($request->hasFile('archDWG')){
  

            $Architect= $request->file('archDWG');
        
            $ArchitectName = 'amb_project_management'.time().'_'.$Architect->getClientOriginalName();
        
            $ArchitectPath = $Architect->storeAs('/consulting/archofferfile', $ArchitectName, 'public');
        
            $Architect->move(public_path('/consulting/archofferfile'), $ArchitectName);
        
        
        
            $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
        
            $offersvillafiles->ArchitectDWG = $ArchitectPath;
            
            $offersvillafiles->save();
        
            return 'true';
        
        
        }

        
        if($request->hasFile('structure')  ){
    

   
            $structure= $request->file('structure');
        
        
             $structureName = 'amb_project_management'.time().'_'.$structure->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('structure');
        
        
                $structurePath = $structure->storeAs('consulting/structureOfferFile', $structureName, 'public');
        
                $imagePassport->move(public_path('consulting/structureOfferFile'), $structureName);
        
        
        
        
        
            
            $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
            
            $offersvillafiles->StructurePath = $structurePath;
            $offersvillafiles->StructureName = $structureName;

            
            $offersvillafiles->save();
        
        
        return 'true';
        }
        if($request->hasFile('structureDWG')  ){
    

   
            $structure= $request->file('structureDWG');
        
        
             $structureName = 'amb_project_management'.time().'_'.$structure->getClientOriginalName();
               
        
                $structurePath = $structure->storeAs('consulting/structureOfferFile', $structureName, 'public');
        
                $structure->move(public_path('consulting/structureOfferFile'), $structureName);
        
        
        
        
        
            
            $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
            
            $offersvillafiles->StructureDWG = $structurePath;


            
            $offersvillafiles->save();
        
        
        return 'true';
        }
        
        if($request->hasFile('threeD')  ){


            $threed= $request->file('threeD');


             $threeDName = 'amb_project_management'.time().'_'.$threed->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('threeD');


                $threeDPath = $threed->storeAs('consulting/threedofferfile', $threeDName, 'public');

                $imagePassport->move(public_path('consulting/threedofferfile'), $threeDName);





            
            $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
            
            $offersvillafiles->threeDPath = $threeDPath;
            $offersvillafiles->threeDName = $threeDName;
            
            $offersvillafiles->save();


        return 'true';
        
   
    }
    if($request->hasFile('ThreeDDWG')  ){


        $threed= $request->file('ThreeDDWG');
       

             $threeDName = 'amb_project_management'.time().'_'.$threed->getClientOriginalName();

    

             $threeDPath = $threed->storeAs('consulting/threedwg', $threeDName, 'public');
             $threed->move(public_path('consulting/threedwg'), $threeDName);

              $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
              $offersvillafiles->ThreeDDWG = $threeDPath;
              $offersvillafiles->save();


    return 'true';
    

}


    if($request->hasFile('Architect')  ){


        $Architect= $request->file('Architect');


         $ArchitectName = 'amb_project_management'.time().'_'.$Architect->getClientOriginalName();
            $file_extension_pass = $imagePassport= $request->file('Architect');


            $ArchitectPath = $Architect->storeAs('consulting/archofferfile', $ArchitectName, 'public');

            $imagePassport->move(public_path('consulting/archofferfile'), $ArchitectName);





        
        $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
        
        $offersvillafiles->ArchitectPath = $ArchitectPath;
        $offersvillafiles->ArchitectName = $ArchitectName;
        
        $offersvillafiles->save();


    return 'true';
    

}

    if($request->hasFile('services')  ){


        $services= $request->file('services');


         $servicesName = 'amb_project_management'.time().'_'.$services->getClientOriginalName();
            $file_extension_pass = $imagePassport= $request->file('services');


            $servicesPath = $services->storeAs('consulting/servicesofferfile', $servicesName, 'public');

            $imagePassport->move(public_path('consulting/servicesofferfile'), $servicesName);





        
        $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
        
        $offersvillafiles->servicesPath = $servicesPath;
        $offersvillafiles->servicesName = $servicesName;
        
        $offersvillafiles->save();


    return 'true';

}

if($request->hasFile('servicesDWG')  ){


    $services= $request->file('servicesDWG');


     $servicesName = 'amb_project_management'.time().'_'.$services->getClientOriginalName();



        $servicesPath = $services->storeAs('consulting/servicesofferfile', $servicesName, 'public');

        $services->move(public_path('consulting/servicesofferfile'), $servicesName);





    
    $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
    
    $offersvillafiles->servicesDWG = $servicesPath;
 
    
    $offersvillafiles->save();


return 'true';


}



if($request->hasFile('Specifications')  ){


    $spec= $request->file('Specifications');


     $specName = 'amb_project_management'.time().'_'.$spec->getClientOriginalName();
        $file_extension_pass = $imagePassport= $request->file('Specifications');


        $specPath = $spec->storeAs('consulting/specOfferFile', $specName, 'public');

        $imagePassport->move(public_path('consulting/specOfferFile'), $specName);





    
    $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
    
    $offersvillafiles->SpecificationsPath = $specPath;
    $offersvillafiles->SpecificationsName = $specName;
    
    $offersvillafiles->save();


return 'true';


}

if($request->hasFile('SpecificationsDWG')  ){


    $spec= $request->file('SpecificationsDWG');


     $specName = 'amb_project_management'.time().'_'.$spec->getClientOriginalName();
    


        $specPath = $spec->storeAs('consulting/specOfferFile', $specName, 'public');

        $spec->move(public_path('consulting/specOfferFile'), $specName);

    
    $offersvillafiles = offersvillafiles::where('offer_id',$offer_id)->first();
    
    $offersvillafiles->SpecificationsEXCEL = $specPath;
  
    
    $offersvillafiles->save();


return 'true';


}


}
    
    public function paymentOffer(Request $request){
        $Isupdated = "";
            
        if($request->hasFile('passport') &&  $request->hasFile('map') ){


            $imagePassport= $request->file('passport');


                $file_name_pass = 'amb_project_management'.time().'_'.$imagePassport->getClientOriginalName();
                $file_extension_pass = $imagePassport= $request->file('passport');
                $namePass = $file_name_pass;



                $imageMap= $request->file('map');


                $file_name_map = 'amb_project_management'.time().'_'.$imageMap->getClientOriginalName();
                $file_extension_map = $imageMap= $request->file('map');
                $name_map = $file_name_map;


          

            if($request->Isupdated=='yes'){
                $Isupdated = 'yes';
            }else{
                $Isupdated=null;
            }

                $file_path_passport = $imagePassport->storeAs('consulting/requestOffer', $namePass, 'public');

                $imagePassport->move(public_path('consulting/requestOffer'), $namePass);


                $file_path_map = $imageMap->storeAs('consulting/requestOffer', $name_map, 'public');

                          $imageMap->move(public_path('consulting/requestOffer'), $name_map);


           
     

           $reques_villa =  request_villa::create([
                "user_id" => Auth::id(),
                "ads_id" =>$request->ads_id,
                "c_id" =>$request->c_id,
                "map_path" => $file_path_map,
                "passport_path" => $file_name_pass,
                "typeBuild" => $request->typeBuild,
                "Provider" => $request->Provider,
                "BankProvider" => $request->BankProvider,
                "priceGrant" => $request->priceGrant,
                "notes" => $request->notes,
                "spicel_agent" => $request->spicel_agent,
                "phone" => $request->phone,

                "Phone_eng" => $request->phones,
                "Name_eng" => $request->Name_eng,
                "supervision" => $request->supervision,
                "design" => $request->design,

                "whatsapp" => $request->whatsapp,
                "Description" => $request->Description,
                'type_villa' => $request->villa_type,
                'Service_room_placement' => $request->position,
                'room_master' => $request->mastar_room,
                'rooms' => $request->rooms,
                'majlis' => $request->majlis,
                'living_room' => $request->living_room,
                'kitchen' => $request->kitchen,
                'floors' => $request->floor,
                'Emirates' => $request->emirates,
                'bathroom' => $request->bathroom,
                'dining' =>$request->dining_room,            
                'title' => $request->title,
                'bedroom' => $request->bedroom,
                'Consultant_fee'=>$request->Consultant_fee,
                'conditioning'=>$request->conditioning,
                'gypsum'=>$request->gypsum,
                'electric_pendants'=>$request->electric_pendants,
                'Bedroom_wardrobes'=>$request->Bedroom_wardrobes,
                'Kitchen_Cabinets'=>$request->Kitchen_Cabinets,
                'the_elevator'=>$request->the_elevator,
                'pelvis'=>$request->pelvis,
                'interior_decoration'=>$request->interior_decoration,
                'garden_design'=>$request->garden_design,
                'the_fence'=>$request->the_fence,
                'price'=>$request->price,
                'sqft'=>$request->sqft,
                'stage'=>1,
                'Isupdated'=>$Isupdated


        ]);


 
        
        if($Isupdated=='yes'){
            $reques_villa =  offer_villa::create([
                "eng_id" => $reques_villa->c_id,
                'request_id'=>$reques_villa->id,
                'agree'=>0,
                
            ]);
    
            return 'true';
          
        }else{
            if($reques_villa->supervision && $reques_villa->sqft && $reques_villa->design){
                $reques_villa =  offer_villa::create([
                    "eng_id" => $reques_villa->c_id,
                    'design'=>$reques_villa->design,
                    'supervison'=>$reques_villa->supervision,
                    'sqft'=>$reques_villa->sqft,
                    'request_id'=>$reques_villa->id,
                    'budget'=>$reques_villa->price,
                    'agree'=>1,
                    
                ]);
        
                return 'true';
              }
              
        }
        

            return response()->json("true");
    }
    }

    public function getoffers(){

        $userid = Auth::id();
        
       
        $villa_request = request_villa::latest()->with('company')->where('user_id',$userid)->get();
        foreach($villa_request as $villa){
            $villa->setAttribute('added',$villa->created_at->diffForHumans());
        }
        return $villa_request;
    }

    public function getCompanyoffers(){

        $userid = Auth::id();
        $villa_request = request_villa::latest()->with('user')->where('c_id',$userid)->get();
        foreach($villa_request as $villa){
            $villa->setAttribute('added',$villa->created_at->diffForHumans());
        }
        return $villa_request;
    }

    public function requester(Request $request){

        $id = $request->id;

        $requsters  = request_villa::latest()->with('company.company','offer.contract',
        'offer.contractsConsrcution', 'offer.contractsStone','offer.constfollowup','offer.contractsHvac',
        'offer.contractsInterior','offer.offersfiles', 
        'offer.constfollowup','converted','review.user')->where('id',$id)->where('user_id',Auth::id())->
        with(['ConstructionReview' =>function($query){
            $query->where('type','construction')->where('from',2)->with('user')->with('company');
        }])->
        with(['HvacReview'=>function($query){
            $query->where('type','hvac')->where('from',2)->with('user')->with('company');
        }])->
   with(['StoneReview'=>function($query){
        $query->where('type','stone')->where('from',2)->with('user')->with('company');
    }])->
    with(['InteriorReview'=>function($query){
        $query->where('type','interior')->where('from',2)->with('user')->with('company');
    }])->
        get();
        foreach($requsters as $requster){
        $requster->setattribute('added_at',$requster->created_at->diffForHumans());
        }
        return $requsters;

    }
    
    public function Companyrequester(Request $request){

        $id = $request->id;
        $requsters  = request_villa::latest()->with('user','offer.contract',
        'offer.contractsConsrcution','offer.offersfiles','offer.contractsStone','offer.constfollowup','offer.contractsHvac',
        'offer.contractsInterior','review.user')->where('id',$id)->where('c_id',Auth::id())->get();
        foreach($requsters as $requster){
        $requster->setattribute('added_at',$requster->created_at->diffForHumans());
        }
        return $requsters;

    }

    public function clicked(Request $request){


        clickedRequest::create([
            'buyer_id' => $request->user,
            'phone' => $request->number,
            'request_id' => $request->request_id,
            'seller_id' => Auth::id(),

        ]);



    }

    public function getoffersclients(){
        $userid = Auth::id();
        $villa_request = request_villa::latest()->with('company')->with('villa')->where('user_id',$userid)->get();
        foreach($villa_request as $villa){
            $clickedrequest = clickedRequest::where('buyer_id',$userid)->where('request_id',$villa->id)->get();
            $villa->setAttribute('added',$villa->created_at->diffForHumans());
            $villa->setAttribute('buyer',$clickedrequest);

        }
        return $villa_request;
    }

    public function requesterclients(Request $request){
        $id = $request->id;
        $requsters  = request_villa::latest()->with('user','villa','company')->where('id',$id)->where('user_id',Auth::id())->get();
        foreach($requsters as $requster){
        $requster->setattribute('added_at',$requster->created_at->diffForHumans());
        }

        return $requsters;
    }



}

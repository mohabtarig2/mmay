<?php

namespace App\Http\Controllers;

use App\branch;
use App\cons_offer_image;
use App\Console\Commands\notify;
use App\constructionadditionalfiles;
use App\ConstructionFiles;
use App\Events\commentConsr;
use App\Events\confirmHvacOffer;
use App\Events\ConfirmRequestofferStone;
use App\Events\ConfirRequestmOfferConsturction;
use App\Events\NewOfferHvac;
use App\Events\NewStoneOffer;
use App\Events\NewTenderConstruction;
use App\Events\NewTenderHvac;
use App\Events\NewTenderStone;
use App\Events\RetenderConstruction;
use App\Events\UpdateTenderHvacTitle;
use App\Events\UpdateTitleConstruction;
use App\hvac;
use App\hvac_offer_image;
use App\hvacAdditionalfiles;
use App\HvacFiles;
use App\Interior_Img_Offer;
use App\InteriorFiles;
use App\Models\admin;
use App\Models\companies;
use App\Notifications\notifyAddOfferConstruction;
use App\Notifications\NotifyconfirmHvacOffer;
use App\Notifications\notifyConfirmRequestofferStone;
use App\Notifications\notifyConfirRequestmOfferConsturction;
use App\Notifications\NotifyNewOfferHvac;
use App\Notifications\notifyNewStoneOffer;
use App\Notifications\NotifyNewTenderConstruction;
use App\Notifications\NotifyNewTenderHvac;
use App\Notifications\NotifyNewTenderStone;
use App\Notifications\NotifyRetenderConstruction;
use App\Notifications\NotifyUpdateTenderHvacTitle;
use App\offerconsr;
use App\OfferHvac;
use App\offerInterior;
use App\OfferStone;
use App\posted_tender;
use App\request_tender;
use App\saved_tenders;
use App\stone;
use App\stone_offer_image;
use App\StoneFiles;
use App\stoneimg;
use App\tcimg;
use App\Tconstr;
use App\TenderFrom;
use App\tenderfromtender;
use App\thvacimg;
use App\Tinterior;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PDO;
use PhpParser\Node\Stmt\Return_;

class constructionController extends Controller
{

    public function InsertConstrFile(Request $request){

        if($request->file('threeD')){
        $file = $request->file('threeD');
        $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('Construction/threeD', $file_threeD, 'public');
        $file->move(public_path('Construction/threeD'), $file_threeD);
        return $file_path_threeD;
        }

        if($request->file('Structure')){
                $file = $request->file('Structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('Construction/Structure', $file_Structure, 'public');
                $file->move(public_path('Construction/Structure'), $file_Structure);
                return $file_path_Structure;
        }
        if($request->file('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('Construction/services', $file_services, 'public');
                $file->move(public_path('Construction/services'), $file_services);
                return $file_path_services;
        }




        if($request->file('Architect')){
                $file = $request->file('Architect');
                $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Architect= $file->storeAs('Construction/Architect', $file_Architect, 'public');
                $file->move(public_path('Construction/Architect'), $file_Architect);
                return $file_path_Architect;


        }

               


        if($request->file('Specifications')){

       
                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();

                $file_path_Specifications = $file->storeAs('Construction/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('Construction/Specifications'), $file_name_Specifications);
                return $file_path_Specifications;

            }

            if($request->file('map')){
                $file = $request->file('map');
                $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();

                $file_path_map = $file->storeAs('Construction/map', $file_name_map, 'public');
                $file->move(public_path('Construction/map'), $file_name_map);
                return $file_path_map;

            }
            if($request->file('identity')){

                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();

                $file_path_identity = $file->storeAs('Construction/identity', $file_name_identity, 'public');
                $file->move(public_path('Construction/identity'), $file_name_identity);
                return $file_path_identity;


            }


    }
    public function InsertInteriorFilES(Request $request){
        if($request->file('threeD')){
            $file = $request->file('threeD');
            $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
            $file_path_threeD= $file->storeAs('interior/threeD', $file_threeD, 'public');
            $file->move(public_path('interior/threeD'), $file_threeD);
            return $file_path_threeD;
            }
    
            if($request->file('Structure')){
                    $file = $request->file('Structure');
                    $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_Structure = $file->storeAs('interior/Structure', $file_Structure, 'public');
                    $file->move(public_path('v/Structure'), $file_Structure);
                    return $file_path_Structure;
            }
            if($request->file('services')){
                    $file = $request->file('services');
                    $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_services = $file->storeAs('interior/services', $file_services, 'public');
                    $file->move(public_path('interior/services'), $file_services);
                    return $file_path_services;
            }
    
    
    
    
            if($request->file('Architect')){
                    $file = $request->file('Architect');
                    $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                    $file_path_Architect= $file->storeAs('interior/Architect', $file_Architect, 'public');
                    $file->move(public_path('interior/Architect'), $file_Architect);
                    return $file_path_Architect;
    
    
            }
    
                   
    
    
            if($request->file('Specifications')){
    
           
                    $file = $request->file('Specifications');
                    $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();
    
                    $file_path_Specifications = $file->storeAs('interior/Specifications', $file_name_Specifications, 'public');
                    $file->move(public_path('interior/Specifications'), $file_name_Specifications);
                    return $file_path_Specifications;
    
                }
    
                if($request->file('map')){
                    $file = $request->file('map');
                    $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
    
                    $file_path_map = $file->storeAs('interior/map', $file_name_map, 'public');
                    $file->move(public_path('interior/map'), $file_name_map);
                    return $file_path_map;
    
                }
                if($request->file('identity')){
    
                    $file = $request->file('identity');
                    $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
    
                    $file_path_identity = $file->storeAs('interior/identity', $file_name_identity, 'public');
                    $file->move(public_path('interior/identity'), $file_name_identity);
                    return $file_path_identity;
    
    
                }
    
    
    
    }
    public function InsertStoneFilES(Request $request){

        if($request->file('threeD')){
        $file = $request->file('threeD');
        $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('hvac/threeD', $file_threeD, 'public');
        $file->move(public_path('hvac/threeD'), $file_threeD);
        return $file_path_threeD;
        }

        if($request->file('Structure')){
                $file = $request->file('Structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('hvac/Structure', $file_Structure, 'public');
                $file->move(public_path('hvac/Structure'), $file_Structure);
                return $file_path_Structure;
        }
        if($request->file('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('hvac/services', $file_services, 'public');
                $file->move(public_path('hvac/services'), $file_services);
                return $file_path_services;
        }




        if($request->file('Architect')){
                $file = $request->file('Architect');
                $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Architect= $file->storeAs('hvac/Architect', $file_Architect, 'public');
                $file->move(public_path('hvac/Architect'), $file_Architect);
                return $file_path_Architect;


        }

               


        if($request->file('Specifications')){

       
                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();

                $file_path_Specifications = $file->storeAs('hvac/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('hvac/Specifications'), $file_name_Specifications);
                return $file_path_Specifications;

            }

            if($request->file('map')){
                $file = $request->file('map');
                $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();

                $file_path_map = $file->storeAs('hvac/map', $file_name_map, 'public');
                $file->move(public_path('hvac/map'), $file_name_map);
                return $file_path_map;

            }
            if($request->file('identity')){

                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();

                $file_path_identity = $file->storeAs('hvac/identity', $file_name_identity, 'public');
                $file->move(public_path('hvac/identity'), $file_name_identity);
                return $file_path_identity;


            }


    }

    public function InsertHvacFile(Request $request){

        if($request->file('threeD')){
        $file = $request->file('threeD');
        $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('hvac/threeD', $file_threeD, 'public');
        $file->move(public_path('hvac/threeD'), $file_threeD);
        return $file_path_threeD;
        }

        if($request->file('structure')){
                $file = $request->file('structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('hvac/Structure', $file_Structure, 'public');
                $file->move(public_path('hvac/Structure'), $file_Structure);
                return $file_path_Structure;
        }
        if($request->file('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('hvac/services', $file_services, 'public');
                $file->move(public_path('hvac/services'), $file_services);
                return $file_path_services;
        }




        if($request->file('Architect')){
                $file = $request->file('Architect');
                $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Architect= $file->storeAs('hvac/Architect', $file_Architect, 'public');
                $file->move(public_path('hvac/Architect'), $file_Architect);
                return $file_path_Architect;


        }

               


        if($request->file('Specifications')){

       
                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();

                $file_path_Specifications = $file->storeAs('hvac/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('hvac/Specifications'), $file_name_Specifications);
                return $file_path_Specifications;

            }

            if($request->file('map')){
                $file = $request->file('map');
                $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();

                $file_path_map = $file->storeAs('hvac/map', $file_name_map, 'public');
                $file->move(public_path('hvac/map'), $file_name_map);
                return $file_path_map;

            }
            if($request->file('identity')){

                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();

                $file_path_identity = $file->storeAs('hvac/identity', $file_name_identity, 'public');
                $file->move(public_path('hvac/identity'), $file_name_identity);
                return $file_path_identity;


            }


    }
    public function updateinteriorThreedFile(Request $request){

        $file = $request->file('threeD');
        $FilesID = $request->FilesID;

        if($request->hasFile('threeD')){
        $file_threeD = 'amb_threeD_interior' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('interior/threeD', $file_threeD, 'public');
        $file->move(public_path('interior/threeD'), $file_threeD);


        $ConstructionFiles = interiorFiles::find($FilesID);
        $ConstructionFiles->threeDPath = $file_path_threeD;
        $ConstructionFiles->threeDName = $file_threeD ;
        $ConstructionFiles->save();

        }

        if($request->hasFile('Architect')){
            $file = $request->file('Architect');
            $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
            $file_path_Architect= $file->storeAs('interior/Architect', $file_Architect, 'public');
            $file->move(public_path('interior/Architect'), $file_Architect);

            $ConstructionFiles = interiorFiles::find($FilesID);
            $ConstructionFiles->ArchitectPath = $file_path_Architect;
            $ConstructionFiles->ArchitectName = $file_Architect ;
            $ConstructionFiles->save();

            }

            if($request->hasFile('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('interior/services', $file_services, 'public');
                $file->move(public_path('interior/services'), $file_services);


                $ConstructionFiles = interiorFiles::find($FilesID);
                $ConstructionFiles->servicesPath = $file_path_services;
                $ConstructionFiles->servicesName = $file_services ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Structure')){


                $file = $request->file('Structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('interior/Structure', $file_Structure, 'public');
                $file->move(public_path('interior/Structure'), $file_Structure);

                $ConstructionFiles = interiorFiles::find($FilesID);
                $ConstructionFiles->StructurePath = $file_path_Structure;
                $ConstructionFiles->StructureName = $file_Structure ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Specifications')){


                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Specifications = $file->storeAs('interior/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('interior/Specifications'), $file_name_Specifications);

                $ConstructionFiles = interiorFiles::find($FilesID);
                $ConstructionFiles->SpecificationsPath = $file_path_Specifications;
                $ConstructionFiles->SpecificationsName = $file_name_Specifications ;
                $ConstructionFiles->save();


            }
            if($request->hasFile('identity')){


                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                $file_path_identity = $file->storeAs('interior/identity', $file_name_identity, 'public');
                $file->move(public_path('interior/identity'), $file_name_identity);


            $ConstructionFiles = interiorFiles::find($FilesID);
            $ConstructionFiles->identityPath = $file_path_identity;
            $ConstructionFiles->identityName = $file_name_identity ;
            $ConstructionFiles->save();

        }
        if($request->hasFile('map')){


            $file = $request->file('map');
            $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
            $file_path_map = $file->storeAs('interior/map', $file_name_map, 'public');
            $file->move(public_path('interior/map'), $file_name_map);

        $ConstructionFiles = interiorFiles::find($FilesID);
        $ConstructionFiles->mapPath = $file_path_map;
        $ConstructionFiles->mapName = $file_name_map ;
        $ConstructionFiles->save();

    }


    }
    public function updateHvacThreedFile(Request $request){

        $file = $request->file('threeD');
        $FilesID = $request->FilesID;

        if($request->hasFile('threeD')){
        $file_threeD = 'amb_threeD_Hvac' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('hvac/threeD', $file_threeD, 'public');
        $file->move(public_path('hvac/threeD'), $file_threeD);


        $ConstructionFiles = HvacFiles::find($FilesID);
        $ConstructionFiles->threeDPath = $file_path_threeD;
        $ConstructionFiles->threeDName = $file_threeD ;
        $ConstructionFiles->save();

        }

        if($request->hasFile('Architect')){
            $file = $request->file('Architect');
            $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
            $file_path_Architect= $file->storeAs('hvac/Architect', $file_Architect, 'public');
            $file->move(public_path('hvac/Architect'), $file_Architect);

            $ConstructionFiles = HvacFiles::find($FilesID);
            $ConstructionFiles->ArchitectPath = $file_path_Architect;
            $ConstructionFiles->ArchitectName = $file_Architect ;
            $ConstructionFiles->save();

            }

            if($request->hasFile('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('hvac/services', $file_services, 'public');
                $file->move(public_path('hvac/services'), $file_services);


                $ConstructionFiles = HvacFiles::find($FilesID);
                $ConstructionFiles->servicesPath = $file_path_services;
                $ConstructionFiles->servicesName = $file_services ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Structure')){


                $file = $request->file('Structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('hvac/Structure', $file_Structure, 'public');
                $file->move(public_path('hvac/Structure'), $file_Structure);

                $ConstructionFiles = HvacFiles::find($FilesID);
                $ConstructionFiles->StructurePath = $file_path_Structure;
                $ConstructionFiles->StructureName = $file_Structure ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Specifications')){


                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Specifications = $file->storeAs('hvac/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('hvac/Specifications'), $file_name_Specifications);

                $ConstructionFiles = HvacFiles::find($FilesID);
                $ConstructionFiles->SpecificationsPath = $file_path_Specifications;
                $ConstructionFiles->SpecificationsName = $file_name_Specifications ;
                $ConstructionFiles->save();


            }
            if($request->hasFile('identity')){


                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                $file_path_identity = $file->storeAs('hvac/identity', $file_name_identity, 'public');
                $file->move(public_path('hvac/identity'), $file_name_identity);


            $ConstructionFiles = HvacFiles::find($FilesID);
            $ConstructionFiles->identityPath = $file_path_identity;
            $ConstructionFiles->identityName = $file_name_identity ;
            $ConstructionFiles->save();

        }
        if($request->hasFile('map')){


            $file = $request->file('map');
            $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
            $file_path_map = $file->storeAs('hvac/map', $file_name_map, 'public');
            $file->move(public_path('hvac/map'), $file_name_map);

        $ConstructionFiles = HvacFiles::find($FilesID);
        $ConstructionFiles->mapPath = $file_path_map;
        $ConstructionFiles->mapName = $file_name_map ;
        $ConstructionFiles->save();

    }


    }

    public function updateStoneThreedFile(Request $request){

        $file = $request->file('threeD');
        $FilesID = $request->FilesID;

        if($request->hasFile('threeD')){
        $file_threeD = 'amb_threeD_stone' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('stone/threeD', $file_threeD, 'public');
        $file->move(public_path('stone/threeD'), $file_threeD);


        $ConstructionFiles = Stone::find($FilesID);
        $ConstructionFiles->threeDPath = $file_path_threeD;
        $ConstructionFiles->threeDName = $file_threeD ;
        $ConstructionFiles->save();

        }

        if($request->hasFile('Architect')){
            $file = $request->file('Architect');
            $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
            $file_path_Architect= $file->storeAs('stone/Architect', $file_Architect, 'public');
            $file->move(public_path('stone/Architect'), $file_Architect);

            $ConstructionFiles = StoneFiles::find($FilesID);
            $ConstructionFiles->ArchitectPath = $file_path_Architect;
            $ConstructionFiles->ArchitectName = $file_Architect ;
            $ConstructionFiles->save();

            }

            if($request->hasFile('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('stone/services', $file_services, 'public');
                $file->move(public_path('stone/services'), $file_services);


                $ConstructionFiles = StoneFiles::find($FilesID);
                $ConstructionFiles->servicesPath = $file_path_services;
                $ConstructionFiles->servicesName = $file_services ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Structure')){


                $file = $request->file('Structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('stone/Structure', $file_Structure, 'public');
                $file->move(public_path('stone/Structure'), $file_Structure);

                $ConstructionFiles = StoneFiles::find($FilesID);
                $ConstructionFiles->StructurePath = $file_path_Structure;
                $ConstructionFiles->StructureName = $file_Structure ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Specifications')){


                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Specifications = $file->storeAs('stone/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('stone/Specifications'), $file_name_Specifications);

                $ConstructionFiles = StoneFiles::find($FilesID);
                $ConstructionFiles->SpecificationsPath = $file_path_Specifications;
                $ConstructionFiles->SpecificationsName = $file_name_Specifications ;
                $ConstructionFiles->save();


            }
            if($request->hasFile('identity')){


                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                $file_path_identity = $file->storeAs('stone/identity', $file_name_identity, 'public');
                $file->move(public_path('stone/identity'), $file_name_identity);


            $ConstructionFiles = StoneFiles::find($FilesID);
            $ConstructionFiles->identityPath = $file_path_identity;
            $ConstructionFiles->identityName = $file_name_identity ;
            $ConstructionFiles->save();

        }
        if($request->hasFile('map')){


            $file = $request->file('map');
            $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
            $file_path_map = $file->storeAs('stone/map', $file_name_map, 'public');
            $file->move(public_path('stone/map'), $file_name_map);

        $ConstructionFiles = StoneFiles ::find($FilesID);
        $ConstructionFiles->mapPath = $file_path_map;
        $ConstructionFiles->mapName = $file_name_map ;
        $ConstructionFiles->save();

    }
}
    public function updateThreedFile(Request $request){

        $file = $request->file('threeD');
        $FilesID = $request->FilesID;

        if($request->hasFile('threeD')){
        $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
        $file_path_threeD= $file->storeAs('Construction/threeD', $file_threeD, 'public');
        $file->move(public_path('Construction/threeD'), $file_threeD);


        $ConstructionFiles = ConstructionFiles::find($FilesID);
        $ConstructionFiles->threeDPath = $file_path_threeD;
        $ConstructionFiles->threeDName = $file_threeD ;
        $ConstructionFiles->save();

        }

        if($request->hasFile('Architect')){
            $file = $request->file('Architect');
            $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
            $file_path_Architect= $file->storeAs('Stone/Architect', $file_Architect, 'public');
            $file->move(public_path('Stone/Architect'), $file_Architect);

            $ConstructionFiles = ConstructionFiles::find($FilesID);
            $ConstructionFiles->ArchitectPath = $file_path_Architect;
            $ConstructionFiles->ArchitectName = $file_Architect ;
            $ConstructionFiles->save();

            }

            if($request->hasFile('services')){
                $file = $request->file('services');
                $file_services = 'amb_services_' . time() . '_' . $file->getClientOriginalName();
                $file_path_services = $file->storeAs('Construction/services', $file_services, 'public');
                $file->move(public_path('Construction/services'), $file_services);


                $ConstructionFiles = ConstructionFiles::find($FilesID);
                $ConstructionFiles->servicesPath = $file_path_services;
                $ConstructionFiles->servicesName = $file_services ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Structure')){


                $file = $request->file('Structure');
                $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Structure = $file->storeAs('Stone/Structure', $file_Structure, 'public');
                $file->move(public_path('Stone/Structure'), $file_Structure);

                $ConstructionFiles = ConstructionFiles::find($FilesID);
                $ConstructionFiles->StructurePath = $file_path_Structure;
                $ConstructionFiles->StructureName = $file_Structure ;
                $ConstructionFiles->save();

            }

            if($request->hasFile('Specifications')){


                $file = $request->file('Specifications');
                $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();
                $file_path_Specifications = $file->storeAs('Stone/Specifications', $file_name_Specifications, 'public');
                $file->move(public_path('Stone/Specifications'), $file_name_Specifications);

                $ConstructionFiles = ConstructionFiles::find($FilesID);
                $ConstructionFiles->SpecificationsPath = $file_path_Specifications;
                $ConstructionFiles->SpecificationsName = $file_name_Specifications ;
                $ConstructionFiles->save();


            }
            if($request->hasFile('identity')){


                $file = $request->file('identity');
                $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                $file_path_identity = $file->storeAs('Stone/identity', $file_name_identity, 'public');
                $file->move(public_path('Stone/identity'), $file_name_identity);


            $ConstructionFiles = ConstructionFiles::find($FilesID);
            $ConstructionFiles->identityPath = $file_path_identity;
            $ConstructionFiles->identityName = $file_name_identity ;
            $ConstructionFiles->save();

        }
        if($request->hasFile('map')){


            $file = $request->file('map');
            $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
            $file_path_map = $file->storeAs('Stone/map', $file_name_map, 'public');
            $file->move(public_path('Stone/map'), $file_name_map);

        $ConstructionFiles = ConstructionFiles::find($FilesID);
        $ConstructionFiles->mapPath = $file_path_map;
        $ConstructionFiles->mapName = $file_name_map ;
        $ConstructionFiles->save();

    }










    }

    public function UpdateNotesConstruction(Request $request){

        $posts = Tconstr::find($request->id);
        $posts->notes = $request->notes;
        $posts->status = 0;
        $posts->save();
        broadcast(new RetenderConstruction($posts));

         $admin = admin::where('role_id',1)->get();
        Notification::send($admin, new NotifyRetenderConstruction($posts));
        return $posts->notes;


    }

    public function UpdateTitleConstruction(Request $request){

        $ruels = $this->getUpdateRules($request);
        $messages = $this->getUpdate($request);


        $valditor = Validator::make( $request->all(),$ruels,$messages);


        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }

        $posts = Tconstr::find($request->id);
        $posts->title = $request->title;
        $posts->notes = $request->notes;
        $posts->status = 0;
        $posts->save();

        broadcast(new UpdateTitleConstruction($posts));
        $admin = admin::where('role_id',1)->get();
        Notification::send($admin, new NotifyRetenderConstruction($posts));
        return $posts->title;


    }

    public function UpdateTitleHvac(Request $request){

        $ruels = $this->getUpdateRules($request);
        $messages = $this->getUpdate($request);


        $valditor = Validator::make( $request->all(),$ruels,$messages);


        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }

        $posts = hvac::find($request->id);
        $posts->title = $request->title;
        $posts->notes = $request->notes;
        $posts->status = 0;
        $posts->save();

        // broadcast(new UpdateTitleConstruction($posts));
        // $admin = admin::where('role_id',1)->get();
        // Notification::send($admin, new NotifyRetenderConstruction($posts));
        // return $posts->title;


    }

    public function UpdateTitleStone(Request $request){

        $ruels = $this->getUpdateRules($request);
        $messages = $this->getUpdate($request);


        $valditor = Validator::make( $request->all(),$ruels,$messages);


        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }

        $posts = stone::find($request->id);
        $posts->title = $request->title;
        $posts->notes = $request->notes;
        $posts->status = 0;
        $posts->save();

        // broadcast(new UpdateTitleConstruction($posts));
        // $admin = admin::where('role_id',1)->get();
        // Notification::send($admin, new NotifyRetenderConstruction($posts));
        // return $posts->title;


    }

public function InteriorTender(Request $request){
  $ruels = $this->getRules( $request);
        $messages = $this->getMessage($request);
        $valditor = Validator::make( $request->all(),$ruels,$messages);
        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }
          $Constr =    Tinterior::create([
                'title'=>$request->title,
                'notes'=>$request->notes,
                'emirates'=>$request->emirates,
                'company_name'=>$request->company_name,
                'user_id'=>Auth::id(),
                'status'=>$request->type_post,
                

            ]);
           $tender_id =   $Constr->id;
        //    NewTenderStone
        //    NotifyNewTenderStone


        // broadcast(new NewTenderStone($Constr->user , $Constr));
        // $admins = admin::where('role_id',1)->get();

        //  Notification::send($admins, new NotifyNewTenderStone($Constr->user,$Constr));

         




        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_project_management' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;



                if ($file_extension == 'jpg' || $file_extension == 'png  ') {
                    $file_path = $image->storeAs('interior/image', $file_name, 'public');

                    $image->move(public_path('interior/image'), $file_name);
                } elseif ($file_extension == 'xlsx') {
                    $file_path = $image->storeAs('interior/Excel', $file_name, 'public');

                    $image->move(public_path('interior/Excel'), $file_name);
                } elseif ($file_extension == 'dwg') {
                    $file_path = $image->storeAs('interior/autocad', $file_name, 'public');

                    $image->move(public_path('interior/autocad'), $file_name);
                } elseif ($file_extension == 'pdf') {
                    $file_path = $image->storeAs('interior/pdf', $file_name, 'public');

                    $image->move(public_path('interior/pdf'), $file_name);
                }

                stoneimg::create([
                    "name" => $file_name,
                    "path" =>  $file_path,
                    "tender_id" =>$tender_id,
                    "extension" =>$file_extension
                ]);


            }
        }




            // if (
            //     $request->hasFile('Structure') && $request->hasFile('Architect') && $request->hasFile('threeD') &&
            //     $request->hasFile('Specifications') && $request->hasFile('map') && $request->hasFile('identity')

            // ) {




                // $file = $request->file('Structure');
                // $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_Structure = $file->storeAs('interior/Structure', $file_Structure, 'public');
                // $file->move(public_path('interior/Structure'), $file_Structure);




                


                // $file = $request->file('Architect');
                // $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_Architect= $file->storeAs('interior/Architect', $file_Architect, 'public');
                // $file->move(public_path('interior/Architect'), $file_Architect);




                // $file = $request->file('threeD');
                // $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_threeD= $file->storeAs('interior/threeD', $file_threeD, 'public');
                // $file->move(public_path('interior/threeD'), $file_threeD);



                // $file = $request->file('Specifications');
                // $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();

                // $file_path_Specifications = $file->storeAs('interior/Specifications', $file_name_Specifications, 'public');
                // $file->move(public_path('interior/Specifications'), $file_name_Specifications);


                // $file = $request->file('map');
                // $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_map = $file->storeAs('interior/map', $file_name_map, 'public');
                // $file->move(public_path('interior/map'), $file_name_map);


                // $file = $request->file('identity');
                // $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_identity = $file->storeAs('interior/identity', $file_name_identity, 'public');
                // $file->move(public_path('interior/identity'), $file_name_identity);

    //             protected $table='HvacFiles';
    // protected $fillable=['id','ArchitectPath','ArchitectName',
    // 'StructurePath','StructureName','threeDName','threeDPath','SpecificationsPath',
    // 'SpecificationsName','mapPath','mapName','identityPath','identityName','created_at','updated_at','tender_id'];


    InteriorFiles::create([
        "ArchitectPath" => $request->Architect,
        // "ArchitectName" =>$file_Architect,
        "StructurePath" =>$request->Structure,
        // "StructureName" => $file_Structure,
        // "threeDName" =>$file_threeD,
        "threeDPath" =>$request->threeD,
        "SpecificationsPath" => $request->Specifications,
        // "SpecificationsName" =>$file_name_Specifications,
        "mapPath" => $request->map,
        // "mapName" =>$file_path_map,
        "identityPath" => $request->identity,
        // "identityName" =>$file_name_identity,
        "tender_id" =>$tender_id,
    ]);
            
            // return $tender_id;
            return $tender_id;


}
    public function StoneTender(Request $request)
    {
        $ruels = $this->getRules( $request);
        $messages = $this->getMessage($request);
        $valditor = Validator::make( $request->all(),$ruels,$messages);
        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }
          $Constr =    stone::create([
                'title'=>$request->title,
                'notes'=>$request->notes,
                'emirates'=>$request->emirates,
                'company_name'=>$request->company_name,
                'user_id'=>Auth::id(),
                'status'=>$request->type_post,

            ]);
           $tender_id =   $Constr->id;
        //    NewTenderStone
        //    NotifyNewTenderStone

        broadcast(new NewTenderStone($Constr->user , $Constr));
        $admins = admin::where('role_id',1)->get();

         Notification::send($admins, new NotifyNewTenderStone($Constr->user,$Constr));

         




        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_project_management' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;






                if ($file_extension == 'jpg' || $file_extension == 'png  ') {
                    $file_path = $image->storeAs('Stone/image', $file_name, 'public');

                    $image->move(public_path('Stone/image'), $file_name);
                } elseif ($file_extension == 'xlsx') {
                    $file_path = $image->storeAs('Stone/Excel', $file_name, 'public');

                    $image->move(public_path('Stone/Excel'), $file_name);
                } elseif ($file_extension == 'dwg') {
                    $file_path = $image->storeAs('Stone/autocad', $file_name, 'public');

                    $image->move(public_path('Stone/autocad'), $file_name);
                } elseif ($file_extension == 'pdf') {
                    $file_path = $image->storeAs('Stone/pdf', $file_name, 'public');

                    $image->move(public_path('Stone/pdf'), $file_name);
                }

                stoneimg::create([
                    "name" => $file_name,
                    "path" =>'/storage/' . $file_path,
                    "tender_id" =>$tender_id,
                    "extension" =>$file_extension
                ]);


            }
        }




            // if (
            //     $request->hasFile('Structure') && $request->hasFile('Architect') && $request->hasFile('threeD') &&
            //     $request->hasFile('Specifications') && $request->hasFile('map') && $request->hasFile('identity')

            // ) {




                // $file = $request->file('Structure');
                // $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_Structure = $file->storeAs('Stone/Structure', $file_Structure, 'public');
                // $file->move(public_path('Stone/Structure'), $file_Structure);







                // $file = $request->file('Architect');
                // $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_Architect= $file->storeAs('Stone/Architect', $file_Architect, 'public');
                // $file->move(public_path('Stone/Architect'), $file_Architect);




                // $file = $request->file('threeD');
                // $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_threeD= $file->storeAs('Stone/threeD', $file_threeD, 'public');
                // $file->move(public_path('Stone/threeD'), $file_threeD);



                // $file = $request->file('Specifications');
                // $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();

                // $file_path_Specifications = $file->storeAs('Stone/Specifications', $file_name_Specifications, 'public');
                // $file->move(public_path('Stone/Specifications'), $file_name_Specifications);


                // $file = $request->file('map');
                // $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_map = $file->storeAs('Stone/map', $file_name_map, 'public');
                // $file->move(public_path('Stone/map'), $file_name_map);


                // $file = $request->file('identity');
                // $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_identity = $file->storeAs('Stone/identity', $file_name_identity, 'public');
                // $file->move(public_path('Stone/identity'), $file_name_identity);

    //             protected $table='HvacFiles';
    // protected $fillable=['id','ArchitectPath','ArchitectName',
    // 'StructurePath','StructureName','threeDName','threeDPath','SpecificationsPath',
    // 'SpecificationsName','mapPath','mapName','identityPath','identityName','created_at','updated_at','tender_id'];

  
    StoneFiles::create([
        "ArchitectPath" => $request->Architect,
        // "ArchitectName" =>$request->,
        "StructurePath" =>$request->Structure,
        // "StructureName" => $request->,
        // "threeDName" =>$request->,
        "threeDPath" =>$request->threeD,
        "SpecificationsPath" => $request->Specifications,
        // "SpecificationsName" =>$request->,
        "mapPath" => $request->map,
        // "mapName" =>$request->,
        "identityPath" => $request->identity,
        // "identityName" =>$request->,
        "tender_id" =>$tender_id,
    ]);
            
            // return $tender_id;
            return $tender_id;


    }
    public function Hvactender(Request $request)
    {


// return $request;
        $ruels = $this->getRules( $request);
        $messages = $this->getMessage($request);


        $valditor = Validator::make( $request->all(),$ruels,$messages);


        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }





          $Constr =    hvac::create([
                'title'=>$request->title,
                'notes'=>$request->notes,
                'emirates'=>$request->emirates,
                'company_name'=>$request->company_name,
                'user_id'=>Auth::id(),
                'status'=>$request->type_post,

            ]);
           $tender_id =   $Constr->id;





        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_project_management' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;






                if ($file_extension == 'jpg' || $file_extension == 'png  ') {
                    $file_path = $image->storeAs('hvac/image', $file_name, 'public');

                    $image->move(public_path('hvac/image'), $file_name);
                } elseif ($file_extension == 'xlsx') {
                    $file_path = $image->storeAs('hvac/Excel', $file_name, 'public');

                    $image->move(public_path('hvac/Excel'), $file_name);
                } elseif ($file_extension == 'dwg') {
                    $file_path = $image->storeAs('hvac/autocad', $file_name, 'public');

                    $image->move(public_path('hvac/autocad'), $file_name);
                } elseif ($file_extension == 'pdf') {
                    $file_path = $image->storeAs('hvac/pdf', $file_name, 'public');

                    $image->move(public_path('hvac/pdf'), $file_name);
                }
                thvacimg::create([
                    "name" => $file_name,
                    "path" => $file_path,
                    "tender_id" =>$tender_id,
                    "extension" =>$file_extension
                ]);


            }
        }




            // if (
            //     $request->hasFile('Structure') && $request->hasFile('Architect') && $request->hasFile('threeD') &&
            //     $request->hasFile('Specifications') && $request->hasFile('map') && $request->hasFile('identity')

            // ) {




                // $file = $request->file('Structure');
                // $file_Structure = 'amb_structure_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_Structure = $file->storeAs('hvac/Structure', $file_Structure, 'public');
                // $file->move(public_path('hvac/Structure'), $file_Structure);







                // $file = $request->file('Architect');
                // $file_Architect = 'amb_Architect_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_Architect= $file->storeAs('hvac/Architect', $file_Architect, 'public');
                // $file->move(public_path('hvac/Architect'), $file_Architect);




                // $file = $request->file('threeD');
                // $file_threeD = 'amb_threeD_' . time() . '_' . $file->getClientOriginalName();
                // $file_path_threeD= $file->storeAs('hvac/threeD', $file_threeD, 'public');
                // $file->move(public_path('hvac/threeD'), $file_threeD);



                // $file = $request->file('Specifications');
                // $file_name_Specifications = 'amb_Specifications_' . time() . '_' . $file->getClientOriginalName();

                // $file_path_Specifications = $file->storeAs('hvac/Specifications', $file_name_Specifications, 'public');
                // $file->move(public_path('hvac/Specifications'), $file_name_Specifications);


                // $file = $request->file('map');
                // $file_name_map = 'amb_map_' . time() . '_' . $file->getClientOriginalName();

                // $file_path_map = $file->storeAs('hvac/map', $file_name_map, 'public');
                // $file->move(public_path('hvac/map'), $file_name_map);


                // $file = $request->file('identity');
                // $file_name_identity = 'amb_identity_' . time() . '_' . $file->getClientOriginalName();

                // $file_path_identity = $file->storeAs('hvac/identity', $file_name_identity, 'public');
                // $file->move(public_path('hvac/identity'), $file_name_identity);

    //             protected $table='HvacFiles';
    // protected $fillable=['id','ArchitectPath','ArchitectName',
    // 'StructurePath','StructureName','threeDName','threeDPath','SpecificationsPath',
    // 'SpecificationsName','mapPath','mapName','identityPath','identityName','created_at','updated_at','tender_id'];


    

    HvacFiles::create([
        "ArchitectPath" => $request->Architect,
        // "ArchitectName" =>$file_Architect,
        "StructurePath" =>$request->Structure,
        // "StructureName" => $file_Structure,
        // "threeDName" =>$file_threeD,
        "threeDPath" =>$request->threeD,
        "SpecificationsPath" => $request->Specifications,
        // "SpecificationsName" =>$file_name_Specifications,
        "mapPath" => $request->map,
        // "mapName" =>$request->map,
        "identityPath" => $request->identity,
        // "identityName" =>$file_name_identity,
        "tender_id" =>$tender_id,
    ]);
            // }
            
            broadcast(new NewTenderHvac($Constr->user , $Constr));
            $admins = admin::where('role_id',1)->get();

            Notification::send($admins, new NotifyNewTenderHvac($Constr->user,$Constr));
            // return 'success';
            return $tender_id;

    }

    public function PostTenderFromRequest(Request $request){

        $requestID = $request->request_id;
        // return $request;

        $saved_tenders =  saved_tenders::where('request_id',$requestID)->get();

        foreach($saved_tenders as $tenders){
            $companyID =  $tenders->com_id;

           $companynames =  companies::where('user_id',$companyID)->get();

           $company_name='';

           foreach($companynames as $companyname){
             $company_name = $companyname->company_en;
           }









            if($request->type==1){



                $Constr =    Tconstr::create([
                    'title'=>$tenders->title,
                    'notes'=>$tenders->Description,
                    'emirates'=>$request->Emirates,
                    'company_name'=>$company_name,
                    'user_id'=>Auth::id(),
                    'status'=>0,
        
                ]);
        
                $tender_id =   $Constr->id;
        ConstructionFiles::create([
            "ArchitectPath" => $request->ArchitectPath,
            "ArchitectName" =>$request->ArchitectName,
            "StructurePath" =>$request->StructurePath,
            "StructureName" => $request->StructureName,
            "threeDName" =>$request->threeDName,
            "threeDPath" =>$request->threeDPath,
            "SpecificationsPath" => $request->SpecificationsPath,
            "SpecificationsName" =>$request->SpecificationsName,
            "mapPath" => $request->mapPath,
            "mapName" =>$request->mapName,
            "identityPath" => $request->identityPath,
            "identityName" =>$request->identityName,
            "servicesName" =>$request->servicesName,
            "servicesPath" =>$request->servicesPath,
            "tender_id" =>$tender_id,
        ]);

                broadcast(new NewTenderConstruction($Constr->user,$Constr));
                $admins = admin::where('role_id',1)->get();

                Notification::send($admins, new NotifyNewTenderConstruction($Constr->user,$Constr));

                $posts = saved_tenders::where('request_id',$requestID)->get();
                foreach($posts as $tender){
                    $tender->submitted = 1;
                    $tender->SumbittedID =$tender_id;

                    $tender->save();
                }
            }

            if($request->type==2){

                $Constr =    hvac::create([
                    'title'=>$request->title,
                    'notes'=>$request->Description,
                    'emirates'=>$request->Emirates,
                    'company_name'=>$company_name,
                    'user_id'=>Auth::id(),
                    'status'=>0,
        
                ]);
        
               $tender_id =   $Constr->id;
        
               HvacFiles::create([
                "ArchitectPath" => $request->ArchitectPath,
                "ArchitectName" =>$request->ArchitectName,
                "StructurePath" =>$request->StructurePath,
                "StructureName" => $request->StructureName,
                "threeDName" =>$request->threeDName,
                "threeDPath" =>$request->threeDPath,
                "SpecificationsPath" => $request->SpecificationsPath,
                "SpecificationsName" =>$request->SpecificationsName,
                "mapPath" => $request->mapPath,
                "mapName" =>$request->mapName,
                "identityPath" => $request->identityPath,
                "identityName" =>$request->identityName,
                "servicesName" =>$request->servicesName,
                "servicesPath" =>$request->servicesPath,
                "tender_id" =>$tender_id,
               ]);
                    
                    // return $tender_id;
                    broadcast(new NewTenderHvac($Constr->user , $Constr));
                    $admins = admin::where('role_id',1)->get();
                    Notification::send($admins, new NotifyNewTenderHvac($Constr->user,$Constr));
               
            }
        
            if($request->type==3){
        
                $Constr =    stone::create([
                    'title'=>$request->title,
                    'notes'=>$request->Description,
                    'emirates'=>$request->Emirates,
                    'company_name'=>$company_name,
                    'user_id'=>Auth::id(),
                    'status'=>0,
        
                ]);
        
               $tender_id =   $Constr->id;
        
               StoneFiles::create([
                "ArchitectPath" => $request->ArchitectPath,
                "ArchitectName" =>$request->ArchitectName,
                "StructurePath" =>$request->StructurePath,
                "StructureName" => $request->StructureName,
                "threeDName" =>$request->threeDName,
                "threeDPath" =>$request->threeDPath,
                "SpecificationsPath" => $request->SpecificationsPath,
                "SpecificationsName" =>$request->SpecificationsName,
                "mapPath" => $request->mapPath,
                "mapName" =>$request->mapName,
                "identityPath" => $request->identityPath,
                "identityName" =>$request->identityName,
                "servicesName" =>$request->servicesName,
                "servicesPath" =>$request->servicesPath,
                "tender_id" =>$tender_id,
               ]);
                    
                    // return $tender_id;
              
        
            }

                $NewTenderPosted =    posted_tender::create([
                    'tender_id'=>$tender_id,
                    'request_id'=>$requestID,
                    'type'=>$request->type,
                ]);
            

                return $tender_id;
        }



    }
    public function tender(Request $request)
    {



        $ruels = $this->getRules( $request);
        $messages = $this->getMessage($request);


        $valditor = Validator::make( $request->all(),$ruels,$messages);


        if($valditor->fails()){
            $errors =  response()->json(['errors' => $valditor->errors()],422);
            return $errors;
        }


          $Constr =    Tconstr::create([
                'title'=>$request->title,
                'notes'=>$request->notes,
                'emirates'=>$request->emirates,
                'company_name'=>$request->company_name,
                'user_id'=>Auth::id(),
                'status'=>$request->type_post,

            ]);

           $tender_id =   $Constr->id;



        if ($request->hasFile('images2')) {
            $images = $request->file('images2');
            foreach ($images as $image) {

                $file_name = 'amb_project_management' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;


                $file_path = $image->storeAs('Construction/Additional', $file_name, 'public');

                $image->move(public_path('Construction/Additional'), $file_name);


            constructionadditionalfiles::create([
                "AdditionalName" => $file_name,
                "AdditionalPath" =>$file_path,
                "tender_id" =>$tender_id,



            ]);



        }

        }

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_project_management' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;






                if ($file_extension == 'jpg' || $file_extension == 'png  ') {
                    $file_path = $image->storeAs('Construction/image', $file_name, 'public');

                    $image->move(public_path('Construction/image'), $file_name);
                } elseif ($file_extension == 'xlsx') {
                    $file_path = $image->storeAs('Construction/Excel', $file_name, 'public');

                    $image->move(public_path('Construction/Excel'), $file_name);
                } elseif ($file_extension == 'dwg') {
                    $file_path = $image->storeAs('Construction/autocad', $file_name, 'public');

                    $image->move(public_path('Construction/autocad'), $file_name);
                } elseif ($file_extension == 'pdf') {
                    $file_path = $image->storeAs('Construction/pdf', $file_name, 'public');

                    $image->move(public_path('Construction/pdf'), $file_name);
                }
                tcimg::create([
                    "name" => $file_name,
                    "path" =>'/storage/' . $file_path,
                    "construction_id" =>$tender_id,
                    "extension" =>$file_extension
                ]);


            }
        }




            // if (
            //     $request->Structure && $request->Architect && $request->threeD &&
            //     $request->Specifications && $request->map && $request->identity
            //     && $request->services
            // ) {




   
  


    ConstructionFiles::create([
        "ArchitectPath" =>$request->Architect,
        "StructurePath" =>$request->Structure,
        
        "threeDPath" =>$request->threeD,
        "SpecificationsPath" => $request->Specifications,
      
        "mapPath" => $request->map,
       
        "identityPath" => $request->identity,
       
        
        "servicesPath" =>$request->services,
        "tender_id" =>$tender_id,
    ]);
            //  
            
            broadcast(new NewTenderConstruction($Constr->user,$Constr));
            $admins = admin::where('role_id',1)->get();

            Notification::send($admins, new NotifyNewTenderConstruction($Constr->user,$Constr));

            return $tender_id;



    }


    protected function getUpdateRules()
    {


        return $ruels = [



            // 'images' => 'require',
            'notes' => 'required|string|min:100',

            'title' => 'required|string|min:4',


        ];
    }

    protected function getUpdate()
    {

        return  $messages = [

            // 'images.required'=> __('You Have to Upload Some Files '),
            'notes.max' => __('Notes Must be 100 charcter At least '),
            'notes.required' => __('The Notes Is required '),
            'title.required' => __('Title Is Reqiured '),
            'title.min' => __('Title  Must be 4 charcter At least'),

        ];
    }
    protected function getRules()
    {


        return $ruels = [


            'emirates' => 'required|integer',
            // 'images' => 'require',
            'notes' => 'required|string|min:100',
            'company_name' => 'required|string|min:4',
            'title' => 'required|string|min:4',


        ];
    }

    protected function getMessage()
    {

        return  $messages = [
            'emirates.required' => __('The emirates is Required'),
            // 'images.required'=> __('You Have to Upload Some Files '),
            'notes.max' => __('Notes Must be 100 charcter At least '),
            'notes.required' => __('The Notes Is required '),
            'title.required' => __('Title Is Reqiured '),
            'title.min' => __('Title  Must be 4 charcter At least'),

        ];
    }

    public function showStoneTender(Request $request)
    {
        $tenderid =  $request->id;


        $tenders = Stone::where('id', $tenderid)->with('tcimg', 'user','StoneFiles')->get();
        $tenderPoster = tenderfromtender::where('tender_id',$tenderid)->where('type','stone')->first();
        $VillaPoster = TenderFrom::where('tender_id',$tenderid)->where('type','stone')->first();
        $userid = Auth::id();
        $user = User::find($userid);
        $role_id =  $user->roles->id;
        $count='';
        if($role_id==3){
            $count = OfferStone::where('com_id', $userid)->where('tender_id', $tenderid)->count();
    
        }



        foreach ($tenders as $tender) {

             $commnets = OfferStone::where('tender_id', $tender->id)->with('user','image')->get();


            $request_tender = request_tender::where('tender_id', $tender->id)->where('type','stone')->get();
            foreach ($commnets as $commnet) {
                $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
                $commnet->setAttribute('confirmd', $request_tender);
            }

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('comments', $commnets);
            $tender->setAttribute('count', $count);
            if($tenderPoster!=null){
                $tender->setAttribute('tenderPoster', $tenderPoster);
            }else{
                $tender->setAttribute('VillaPoster', $VillaPoster);

            }

        }









        return response()->json($tenders);
    }
    
    public function showInteriorTender(Request $request) {
    $tenderid =  $request->id;


    $tenders = Tinterior::where('id', $tenderid)->with( 'user','InteriorFiles')->get();
    $tenderPoster = tenderfromtender::where('tender_id',$tenderid)->where('type','interior')->first();
    $VillaPoster = TenderFrom::where('tender_id',$tenderid)->where('type','interior')->first();

    $userid = Auth::id();
    $user = User::find($userid);
    $role_id =  $user->roles->id;
    $count='';
    if($role_id==5){
        $count = offerInterior::where('com_id', $userid)->where('tender_id', $tenderid)->count();

    }



    foreach ($tenders as $tender) {

         $commnets = offerInterior::where('tender_id', $tender->id)->with('user','image')->get();


        $request_tender = request_tender::where('tender_id', $tender->id)->where('type','interior')->get();
        foreach ($commnets as $commnet) {
            $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
            $commnet->setAttribute('confirmd', $request_tender);
        }

        $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
        $tender->setAttribute('comments', $commnets);
        $tender->setAttribute('count', $count);

        if($tenderPoster!=null){
            $tender->setAttribute('tenderPoster', $tenderPoster);
        }else{
            $tender->setAttribute('VillaPoster', $VillaPoster);

        }

    }









    return response()->json($tenders);
    }
    public function showHvacTender(Request $request)
    {
        $tenderid =  $request->id;


        $tenders = hvac::where('id', $tenderid)->with('tcimg', 'user','HvacFiles')->get();
        $tenderPoster = tenderfromtender::where('tender_id',$tenderid)->where('type','hvac')->first();
        $VillaPoster = TenderFrom::where('tender_id',$tenderid)->where('type','hvac')->first();

        $userid = Auth::id();
        $user = User::find($userid);
        $role_id =  $user->roles->id;
        $count='';
        if($role_id==4){
            $count = OfferHvac::where('com_id', $userid)->where('tender_id', $tenderid)->count();

        }



        foreach ($tenders as $tender) {

             $commnets = OfferHvac::where('tender_id', $tender->id)->with('user','image')->get();


            $request_tender = request_tender::where('tender_id', $tender->id)->where('type','hvac')->get();
            foreach ($commnets as $commnet) {
                $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
                $commnet->setAttribute('confirmd', $request_tender);
            }

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('comments', $commnets);
            $tender->setAttribute('count', $count);

            if($tenderPoster!=null){
                $tender->setAttribute('tenderPoster', $tenderPoster);
            }else{
                $tender->setAttribute('VillaPoster', $VillaPoster);

            }

        }









        return response()->json($tenders);
    }
    public function ShowTenders(Request $request)
    {
        $userid = Auth::id();
        $user = User::find($userid);
        $role_id =  $user->roles->id;
        $tenderid =  $request->id;
        $count='';
        if($role_id==6){
        $count = offerconsr::where('com_id', $userid)->where('construction_id', $tenderid)->count();
    
    }

    $tenderPoster = tenderfromtender::where('tender_id',$tenderid)->where('type','construction')->first();


    $VillaPoster = TenderFrom::where('tender_id',$tenderid)->where('type','construction')->first();



       

        $tenders = Tconstr::where('id', $tenderid)->with('tcimg', 'user','ConstructionFiles','AdditionalFile')->get();
        foreach ($tenders as $tender) {

            $commnets = offerconsr::where('construction_id', $tender->id)->with('user', 'image')->get();

            $request_tender = request_tender::where('tender_id', $tender->id)->get();
            foreach ($commnets as $commnet) {
                $commnet->setAttribute('added_at', $commnet->created_at->diffForHumans());
                $commnet->setAttribute('confirmd', $request_tender);
            }

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('comments', $commnets);
            
            $tender->setAttribute('count', $count);
            if($tenderPoster!=null){
                $tender->setAttribute('tenderPoster', $tenderPoster);
            }else{
                $tender->setAttribute('VillaPoster', $VillaPoster);

            }
       
            
        }









        return response()->json($tenders);
    }
    public function UpdateTenderConstruction(Request $request)
    {

        $ruels = $this->getRules($request);
        $messages = $this->getMessage($request);


        $valditor = Validator::make($request->all(), $ruels, $messages);


        if ($valditor->fails()) {
            $errors =  response()->json(['errors' => $valditor->errors()], 422);
            return $errors;
        }


        $posts = Tconstr::find($request->id);
        $posts->title = $request->title;
        $posts->notes = $request->notes;
        $posts->emirates = $request->emirates;
        $posts->status = 0;
        $posts->save();


        $posts->setAttribute('added_at', $posts->updated_at->diffForHumans());

        return response()->json($posts);
    }


    public function UpdateTenderInteriorTitle(Request $request)
    {
        


        $posts = Tinterior::find($request->id);
        $posts->title = $request->title;
        $posts->notes = $request->notes;

        $posts->status = 0;
        $posts->save();

        // $admin = admin::where('role_id',1)->get();
        // $posts->setAttribute('added_at', $posts->updated_at->diffForHumans());
        // broadcast(new UpdateTenderHvacTitle($posts->user,$posts));


        // Notification::send($admin, new NotifyUpdateTenderHvacTitle($posts->user,$posts));





        return response()->json($posts);
    }

    public function UpdateTenderTitle(Request $request)
    {



        $posts = hvac::find($request->id);
        $posts->title = $request->title;
        $posts->notes = $request->notes;
        $posts->emirates = $request->emirates;
        $posts->status = 0;
        $posts->save();

        $admin = admin::where('role_id',1)->get();
        $posts->setAttribute('added_at', $posts->updated_at->diffForHumans());
        broadcast(new UpdateTenderHvacTitle($posts->user,$posts));


        Notification::send($admin, new NotifyUpdateTenderHvacTitle($posts->user,$posts));





        return response()->json($posts);
    }






    public function AllTenderStone()
    {


        $tenders = stone::latest()->where('status', 1)->paginate(5);;

        foreach ($tenders as $tender) {



            $offer = OfferStone::where('tender_id', $tender->id)->get();

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('count', $offer->count());

        }

        return response()->json(['data' => $tenders]);
    }
    public function AllTenderHvac()
    {


        $user_id = Auth::id();

        $emirates=companies::select('emirates')->where('user_id',$user_id)->get();

        $branchs  = branch::where('company_id',$user_id)->where('status',1)->pluck('emirates')->all();

        // return $branchs;




        

    $tenders = hvac::latest()->where('status', 1)->where('stage', 0)->paginate(5);

        // $tenders = hvac::latest()->where('status', 1)->paginate(5);;

        foreach ($tenders as $tender) {



            $offer = OfferHvac::where('tender_id', $tender->id)->get();

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('count', $offer->count());

        }

        return response()->json(['data' => $tenders]);
    }

    
    public function AllTenderInterior()
    {
            $user_id = Auth::id();

            $emirates=companies::select('emirates')->where('user_id',$user_id)->get();

        $tenders = Tinterior::latest()->where('status', 1)->paginate(5);
        // $tenders = Tconstr::latest()->where('status', 1)->where('emirates', $emirates)->paginate(5);


        foreach ($tenders as $tender) {
            $user_id = $tender->user_id;

            $id = User::select('role_id')->where('id', $user_id)->get();
            // $offer = offerconsr::where('construction_id', $tender->id)->get();

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            // $tender->setAttribute('count', $offer->count());
            $tender->setAttribute('role_id', $id);
        }

        return response()->json(['data' => $tenders]);
    }

    public function AllTenderConsr()
    {
            $user_id = Auth::id();

            $emirates=companies::select('emirates')->where('user_id',$user_id)->get();

            $branchs  = branch::where('company_id',$user_id)->where('status',1)->pluck('emirates')->all();

            // return $branchs;




            

        $tenders = Tconstr::latest()->where('status', 1)->where('stage', 0)->whereIn('emirates',$branchs)->
        Orwhere('emirates',$emirates)->paginate(5);
        // $tenders = Tconstr::latest()->where('status', 1)->where('emirates', $emirates)->paginate(5);


        foreach ($tenders as $tender) {
            $user_id = $tender->user_id;

            $id = User::select('role_id')->where('id', $user_id)->get();
            $offer = offerconsr::where('construction_id', $tender->id)->get();

            $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());
            $tender->setAttribute('count', $offer->count());
            $tender->setAttribute('role_id', $id);
        }

        return response()->json(['data' => $tenders]);
    }




public function insertStoneOffer(Request $request)
{



    $ruels = $this->getRulesOffer($request);
    $messages = $this->getMessageOffer($request);


    $valditor = Validator::make($request->all(), $ruels, $messages);


    if ($valditor->fails()) {
        $errors =  response()->json(['errors' => $valditor->errors()], 422);
        return $errors;
    }


    if ($request->hasFile('images')) {

        $offer_consr =    OfferStone::create([
            'textOffer' => $request->textOffer,
            'com_id' => Auth::id(),
            'tender_id' => $request->construction_id,
            'items'=>$request->items,

        ]);


        $offer_consr->setAttribute('added_at', $offer_consr->created_at->diffForHumans());

        $comment_id = $offer_consr->id;


        $images = $request->file('images');
        foreach ($images as $image) {

            $file_name = 'amb_' . time() . '_' . $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $names = $file_name;


            $file_path = $image->storeAs('hvac/quotion', $file_name, 'public');

            $image->move(public_path('hvac/quotion'), $file_name);


            stone_offer_image::create([
                "name" => $file_name,
                "path" => $file_path,
                "comment_id" => $comment_id,
                "extension" => $file_extension


            ]);
        }
    }
    

    $offerUSer = User::find($offer_consr->com_id);
    
    $tender = stone::find($offer_consr->tender_id);

    $user = User::find($tender->user_id);


    broadcast(new NewStoneOffer( $offerUSer,$offer_consr));

    $admin = admin::where('role_id',1)->get();

    Notification::send($admin, new notifyNewStoneOffer($offerUSer, $offer_consr));
    Notification::send($user, new notifyNewStoneOffer($offerUSer, $offer_consr));

    return response()->json('added offer successfuly');
}


public function insertInteriorOffer(Request $request)
{



    $ruels = $this->getRulesOffer($request);
    $messages = $this->getMessageOffer($request);


    $valditor = Validator::make($request->all(), $ruels, $messages);


    if ($valditor->fails()) {
        $errors =  response()->json(['errors' => $valditor->errors()], 422);
        return $errors;
    }





    if ($request->hasFile('images')) {




        $offer_consr =    offerInterior::create([
            'textOffer' => $request->textOffer,
            'com_id' => Auth::id(),
            'tender_id' => $request->construction_id,
            'items'=>$request->items,
         

        ]);


        $offer_consr->setAttribute('added_at', $offer_consr->created_at->diffForHumans());

        $comment_id = $offer_consr->id;


        $images = $request->file('images');
        foreach ($images as $image) {

            $file_name = 'amb_' . time() . '_' . $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $names = $file_name;







            $file_path = $image->storeAs('Interior/quotion', $file_name, 'public');

            $image->move(public_path('Interior/quotion'), $file_name);


            Interior_Img_Offer::create([
                "name" => $file_name,
                "path" => $file_path,
                "comment_id" => $comment_id,
                "extension" => $file_extension


            ]);
        }
    }

    // $tender = hvac::find($offer_consr->tender_id);

    // $user = User::where('id',$tender->user_id)->get();

    // $admin = admin::where('role_id',1)->get();



    // broadcast(new NewOfferHvac($offer_consr->user, $offer_consr));
    // Notification::send($admin, new NotifyNewOfferHvac($offer_consr->user, $offer_consr));
    // Notification::send($user, new NotifyNewOfferHvac($offer_consr->user, $offer_consr));

    return response()->json('added offer successfuly');
}
    public function insertHvacOffer(Request $request)
    {



        $ruels = $this->getRulesOffer($request);
        $messages = $this->getMessageOffer($request);


        $valditor = Validator::make($request->all(), $ruels, $messages);


        if ($valditor->fails()) {
            $errors =  response()->json(['errors' => $valditor->errors()], 422);
            return $errors;
        }





        if ($request->hasFile('images')) {




            $offer_consr =    OfferHvac::create([
                'textOffer' => $request->textOffer,
                'com_id' => Auth::id(),
                'tender_id' => $request->construction_id,
                'items'=>$request->items,

            ]);


            $offer_consr->setAttribute('added_at', $offer_consr->created_at->diffForHumans());

            $comment_id = $offer_consr->id;


            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;







                $file_path = $image->storeAs('hvac/quotion', $file_name, 'public');

                $image->move(public_path('hvac/quotion'), $file_name);


                hvac_offer_image::create([
                    "name" => $file_name,
                    "path" => $file_path,
                    "comment_id" => $comment_id,
                    "extension" => $file_extension


                ]);
            }
        }

        $tender = hvac::find($offer_consr->tender_id);

        $user = User::where('id',$tender->user_id)->get();

        $admin = admin::where('role_id',1)->get();



        broadcast(new NewOfferHvac($offer_consr->user, $offer_consr));
        Notification::send($admin, new NotifyNewOfferHvac($offer_consr->user, $offer_consr));
        Notification::send($user, new NotifyNewOfferHvac($offer_consr->user, $offer_consr));

        return response()->json('added offer successfuly');
    }

    public function insertOffer(Request $request)
    {



        $ruels = $this->getRulesOffer($request);
        $messages = $this->getMessageOffer($request);


        $valditor = Validator::make($request->all(), $ruels, $messages);


        if ($valditor->fails()) {
            $errors =  response()->json(['errors' => $valditor->errors()], 422);
            return $errors;
        }





        if ($request->hasFile('images')) {




            $offer_consr =    offerConsr::create([
                'textOffer' => $request->textOffer,
                'com_id' => Auth::id(),
                'construction_id' => $request->construction_id,
                'items'=>$request->items,
                'approval'=>$request->approval,

            ]);


            $offer_consr->setAttribute('added_at', $offer_consr->created_at->diffForHumans());

            $comment_id = $offer_consr->id;


            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;







                $file_path = $image->storeAs('Construction/quotion', $file_name, 'public');

                $image->move(public_path('Construction/quotion'), $file_name);


                cons_offer_image::create([
                    "name" => $file_name,
                    "path" => $file_path,
                    "comment_id" => $comment_id,
                    "extension" => $file_extension


                ]);
            }
        }

        $posterid = Tconstr::where('id', $request->construction_id)->select('user_id')->get();
        $poster = User::find($posterid);


        $admin = admin::where('role_id',1)->get();
        $user = $offer_consr->user;
        broadcast(new commentConsr($offer_consr->user, $offer_consr, $poster))->toOthers();

        Notification::send($admin , new notifyAddOfferConstruction($offer_consr->user, $offer_consr, $poster));
        Notification::send($poster , new notifyAddOfferConstruction($offer_consr->user, $offer_consr, $poster));






        return response()->json('added offer successfuly');
    }
    
    public function confirmInteriorOffer(Request $request)
    {


    $request = request_tender::create([
            'tender_id' => $request->tender_id,
            'offer_id' => $request->offer_id,
            'user_id' => Auth::id(),
            'com_id' => $request->com_id,
            'type' => 'interior',
        ]);

        $posts = Tinterior::find($request->tender_id);
        $posts->stage = 1;

        $posts->save();

        // Broadcast(new confirmHvacOffer($posts->user , $request,$posts));
        // $admin = admin::where('role_id',1)->get();

        // $user = User::find($request->com_id);
        // Notification::send($admin,new NotifyconfirmHvacOffer($posts->user , $request,$posts));
        // Notification::send($user,new NotifyconfirmHvacOffer($posts->user , $request,$posts));


    }
    public function confirmHvacOffer(Request $request)
    {


    $request = request_tender::create([
            'tender_id' => $request->tender_id,
            'offer_id' => $request->offer_id,
            'user_id' => Auth::id(),
            'com_id' => $request->com_id,
            'type' => 'hvac',
        ]);

        $posts = hvac::find($request->tender_id);
        $posts->stage = 1;

        $posts->save();

        Broadcast(new confirmHvacOffer($posts->user , $request,$posts));
        $admin = admin::where('role_id',1)->get();

        $user = User::find($request->com_id);
        Notification::send($admin,new NotifyconfirmHvacOffer($posts->user , $request,$posts));
        Notification::send($user,new NotifyconfirmHvacOffer($posts->user , $request,$posts));


    }

    public function confirmStoneOffer(Request $request)
    {


        $request_tender = request_tender::create([
            'tender_id' => $request->tender_id,
            'offer_id' => $request->offer_id,
            'user_id' => Auth::id(),
            'com_id' => $request->com_id,
            'type' => 'stone',
        ]);

        $posts = stone::find($request->tender_id);
        $posts->stage = 1;
        $posts->save();


        $user = User::find($request_tender->user_id);
        $userOwner = User::find($request_tender->com_id);

        $admin = admin::where('role_id',1)->get();


        broadcast(new ConfirmRequestofferStone($user,$posts,$request_tender));

        Notification::send($admin, new notifyConfirmRequestofferStone($user,$posts,$request_tender));
        Notification::send($userOwner, new notifyConfirmRequestofferStone($user,$posts,$request_tender));

    }

    public function confirmOffer(Request $request)
    {


      $request_tender =   request_tender::create([
            'tender_id' => $request->construction_id,
            'offer_id' => $request->offer_id,
            'user_id' => Auth::id(),
            'com_id' => $request->com_id,
            'type' => 'construction',
        ]);

        $posts = Tconstr::find($request->construction_id);
        $posts->stage = 1;
        $posts->save();

        $user = User::find($request_tender->user_id);
        $userOwner = User::find($request_tender->com_id);

        $admin = admin::where('role_id',1)->get();


        broadcast(new ConfirRequestmOfferConsturction($user,$posts,$request_tender));

        Notification::send($admin, new notifyConfirRequestmOfferConsturction($user,$posts,$request_tender));
        Notification::send($userOwner, new notifyConfirRequestmOfferConsturction($user,$posts,$request_tender));


    }


    protected function getRulesOffer()
    {


        return $ruels = [


            'textOffer' => 'required|min:100',

            //  'images' => 'required | mimes:jpeg,jpg,png | max:1000',



        ];
    }

    protected function getMessageOffer()
    {

        return  $messages = [
            'textOffer.required' => __('Your  Note  s Is Required '),
            'com_id.unique' => __('You cant put offer more than one '),
            'images.min' => __('at least 100 characters '),


        ];
    }

}

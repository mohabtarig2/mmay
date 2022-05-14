<?php

namespace App\Http\Controllers;

use App\img_service_ads;
use App\service_ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicesAdsController extends Controller
{

    
    

    public function insertInteriorAds(Request $request){

        $service_ads =  service_ads::create([
             'title' => $request->title,
             'description' => $request->description,
             'emirates'=>$request->emirates,
             'TypeServices'=>$request->TypeServices,
             'status'=> 0,
             'type' => 'interior',
             'user_id' => Auth::id(),

         ]);



         if ($request->hasFile('images')) {

             $images = $request->file('images');
             foreach ($images as $image) {

                 $file_name = 'amb_Ads_interior' . time() . '_' . $image->getClientOriginalName();
                 $file_extension = $image->getClientOriginalExtension();
                 $names = $file_name;
                 $file_path = $image->storeAs('interior/ads', $file_name, 'public');
                 $image->move(public_path('interior/ads'), $file_name);
                 img_service_ads::create([
                     "name" => $file_name,
                     "path" => $file_path,
                     'ads_id' => $service_ads->id,
                 ]);
             }
         }



         //     $admin = admin::where('role_id',1)->get();

         //     broadcast(new TenderTconulte($tenders->user,$admin,$tenders));

         // // broadcast(new NewTender($tenders->user,$tenders))->toOthers();
         // // broadcast(new NewTender($user,$tender,$admins));



         // Notification::send($admin, new NotiTenders($tenders));
         // $admins->notify(new NotiTenders($tender));

         return response()->json($service_ads->id);



     }

    public function insertStoneAds(Request $request){

        $service_ads =  service_ads::create([
             'title' => $request->title,
             'description' => $request->description,
             'TypeServices'=>$request->TypeServices,
             'emirates'=>$request->emirates,
             'status'=> 0,
             'type' => 'stone',
             'user_id' => Auth::id(),

         ]);



         if ($request->hasFile('images')) {

             $images = $request->file('images');
             foreach ($images as $image) {

                 $file_name = 'amb_Ads_stone' . time() . '_' . $image->getClientOriginalName();
                 $file_extension = $image->getClientOriginalExtension();
                 $names = $file_name;
                 $file_path = $image->storeAs('Stone/ads', $file_name, 'public');
                 $image->move(public_path('Stone/ads'), $file_name);
                 img_service_ads::create([
                     "name" => $file_name,
                     "path" => $file_path,
                     'ads_id' => $service_ads->id,
                 ]);
             }
         }



         //     $admin = admin::where('role_id',1)->get();

         //     broadcast(new TenderTconulte($tenders->user,$admin,$tenders));

         // // broadcast(new NewTender($tenders->user,$tenders))->toOthers();
         // // broadcast(new NewTender($user,$tender,$admins));



         // Notification::send($admin, new NotiTenders($tenders));
         // $admins->notify(new NotiTenders($tender));

         return response()->json($service_ads->id);



     }
    public function insertAds(Request $request){


       $service_ads =  service_ads::create([
            'title' => $request->title,
            'description' => $request->description,
            'emirates'=>$request->emirates,
            'TypeServices'=>$request->TypeServices,
            'status'=> 0,
            'type' => 'construction',
            'user_id' => Auth::id(),

        ]);



        if ($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_Ads_consulte' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;
                $file_path = $image->storeAs('Construction/ads', $file_name, 'public');
                $image->move(public_path('Construction/ads'), $file_name);
                img_service_ads::create([
                    "name" => $file_name,
                    "path" => $file_path,
                    'ads_id' => $service_ads->id,
                ]);
            }
        }



        //     $admin = admin::where('role_id',1)->get();

        //     broadcast(new TenderTconulte($tenders->user,$admin,$tenders));

        // // broadcast(new NewTender($tenders->user,$tenders))->toOthers();
        // // broadcast(new NewTender($user,$tender,$admins));



        // Notification::send($admin, new NotiTenders($tenders));
        // $admins->notify(new NotiTenders($tender));

        return response()->json($service_ads->id);



    }



    public function inserthvacAds(Request $request){


        $service_ads =  service_ads::create([
             'title' => $request->title,
             'description' => $request->description,
             'emirates'=>$request->emirates,
             'TypeServices'=>$request->TypeServices,
             'status'=> 0,
             'type' => 'hvac',
             'user_id' => Auth::id(),

         ]);



         if ($request->hasFile('images')) {

             $images = $request->file('images');
             foreach ($images as $image) {

                 $file_name = 'amb_Ads_hvac' . time() . '_' . $image->getClientOriginalName();
                 $file_extension = $image->getClientOriginalExtension();
                 $names = $file_name;
                 $file_path = $image->storeAs('hvac/ads', $file_name, 'public');
                 $image->move(public_path('hvac/ads'), $file_name);
                 img_service_ads::create([
                     "name" => $file_name,
                     "path" => $file_path,
                     'ads_id' => $service_ads->id,
                 ]);
             }
         }



         //     $admin = admin::where('role_id',1)->get();

         //     broadcast(new TenderTconulte($tenders->user,$admin,$tenders));

         // // broadcast(new NewTender($tenders->user,$tenders))->toOthers();
         // // broadcast(new NewTender($user,$tender,$admins));



         // Notification::send($admin, new NotiTenders($tenders));
         // $admins->notify(new NotiTenders($tender));

         return response()->json($service_ads->id);



     }









    

    public function MYADSSERVICES(Request $request){

        $user_id = Auth::id();

    $tenders = service_ads::latest()->with('company','image')->where('user_id',$user_id)->paginate(5);

    foreach ($tenders as $tender) {

        $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());

    }

    return response()->json(['data' => $tenders]);
    }


    
    public function MyadsHvac(Request $request){


        $user_id = Auth::id();
         $adsId = $request->id;


    $tenders = service_ads::latest()->with('company','image')->where('user_id',$user_id)->where('id',$adsId)->where('type','hvac')->get();

    foreach ($tenders as $tender) {

        $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());

    }

    return response()->json( $tenders);
    }

    public function Myadsinterior(Request $request){


        $user_id = Auth::id();
         $adsId = $request->id;


    $tenders = service_ads::latest()->with('company','image')->where('user_id',$user_id)->where('id',$adsId)->where('type','interior')->get();

    foreach ($tenders as $tender) {

        $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());

    }

    return response()->json( $tenders);
    }
    public function MyadsStone(Request $request){


        $user_id = Auth::id();
         $adsId = $request->id;


    $tenders = service_ads::latest()->with('company','image')->where('user_id',$user_id)->where('id',$adsId)->where('type','stone')->get();

    foreach ($tenders as $tender) {

        $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());

    }

    return response()->json( $tenders);
    }

    public function MyadsConsruction(Request $request){
        // $user_id = auth::id();
        // $ads = service_ads::latest()->with('company','image')->where('user_id',$user_id);

        // return $ads;

        $user_id = Auth::id();
         $adsId = $request->id;



    $tenders = service_ads::latest()->with('company','image')->where('user_id',$user_id)->
    where('id',$adsId)->where('type','construction')->get();



    foreach ($tenders as $tender) {


        $tender->setAttribute('added_at', $tender->updated_at->diffForHumans());

    }

    return response()->json( $tenders);
    }

    public function InsertConsultingImage(Request $request){

        $id =   $request->id;


    if ($request->hasFile('images')) {

            $images = $request->file('images');
            foreach ($images as $image) {

                $file_name = 'amb_ads_cons' . time() . '_' . $image->getClientOriginalName();
                $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;
                $file_path = $image->storeAs('Construction/ads', $file_name, 'public');
                $image->move(public_path('Construction/ads'), $file_name);
                img_service_ads::create([
                    "name" => $file_name,
                    "path" => $file_path,
                    'ads_id' => $id,
                ]);
            }
        }
        return " add image succssfuly";
    }
    public function DeleteConsultingImage(Request $request){


        $id = $request->id;


        $image = img_service_ads::find($id);

        $image->delete();

    }
}

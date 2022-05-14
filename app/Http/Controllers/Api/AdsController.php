<?php

namespace App\Http\Controllers\api;

use App\CoastVilla;
use App\Http\Controllers\Controller;
use App\hvac;
use App\offer_villa_img;
use App\offerConsr;
use App\OfferHvac;
use App\offerInterior;
use App\OfferStone;
use App\saved;
use App\service_ads;
use App\Toffers;
use App\Villa;
use App\VillaReview;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;




class AdsController extends Controller
{

    public function countAllConsule(){

    $userid = Auth::id();



    $pending = Villa::where('c_id', '=', $userid)->where('confirmed', '=', 2)->get();
    $pendingCount = $pending->count();


    $active = Villa::where('c_id', '=', $userid)->where('confirmed', '=', 1)->get();
    $activeCount = $active->count();



    $Drafts= Villa::where('c_id', '=', $userid)->where('confirmed', '=', 0)->get();

    $DraftCount = $Drafts->count();
    $Offers =  Toffers::latest()->with('tender')->where('com_id',$userid)->get();


                foreach($Offers as $Offer){

                    $Offer->setAttribute('added_at',$Offer->created_at->diffForHumans());

                }




        return response()->json(['active'=>$activeCount,'pending'=>$pendingCount,'draft'=>$DraftCount,"latest"=>$Offers]);

            }

            

            public function countAllInterior(){

                $userid = Auth::id();
                $pending = service_ads::where('user_id', '=', $userid)->where('status', '=', 0)->get();
                $pendingCount = $pending->count();
                $active = service_ads::where('user_id', '=', $userid)->where('status', '=', 1)->get();
                $activeCount = $active->count();
                $Drafts= service_ads::where('user_id', '=', $userid)->where('status', '=', 2)->get();

                $DraftCount = $Drafts->count();


                    return response()->json(['active'=>$activeCount,'pending'=>$pendingCount,'draft'=>$DraftCount]);

          }
            public function countAllAdsConstruction(){

                $userid = Auth::id();



                $pending = service_ads::where('user_id', '=', $userid)->where('status', '=', 0)->get();
                $pendingCount = $pending->count();


                $active = service_ads::where('user_id', '=', $userid)->where('status', '=', 1)->get();
                $activeCount = $active->count();



                $Drafts= service_ads::where('user_id', '=', $userid)->where('status', '=', 2)->get();

                $DraftCount = $Drafts->count();


                    return response()->json(['active'=>$activeCount,'pending'=>$pendingCount,'draft'=>$DraftCount]);

          }

          public function countAllAdshvac(){

            $userid = Auth::id();



            $pending = service_ads::where('user_id', '=', $userid)->where('status', '=', 0)->get();
            $pendingCount = $pending->count();


            $active = service_ads::where('user_id', '=', $userid)->where('status', '=', 1)->get();
            $activeCount = $active->count();



            $Drafts= service_ads::where('user_id', '=', $userid)->where('status', '=', 2)->get();

            $DraftCount = $Drafts->count();


                return response()->json(['active'=>$activeCount,'pending'=>$pendingCount,'draft'=>$DraftCount]);

      }

      public function countAllAdsStone(){

        $userid = Auth::id();



        $pending = service_ads::where('user_id', '=', $userid)->where('status', '=', 0)->get();
        $pendingCount = $pending->count();


        $active = service_ads::where('user_id', '=', $userid)->where('status', '=', 1)->get();
        $activeCount = $active->count();



        $Drafts= service_ads::where('user_id', '=', $userid)->where('status', '=', 2)->get();

        $DraftCount = $Drafts->count();


            return response()->json(['active'=>$activeCount,'pending'=>$pendingCount,'draft'=>$DraftCount]);

  }





            public function countAllConstruction(){

                $userid = Auth::id();







                $Offers =  offerConsr::latest()->with('tender')->where('com_id',$userid)->get();


                            foreach($Offers as $Offer){

                                $Offer->setAttribute('added_at',$Offer->created_at->diffForHumans());

                            }



                    return response()->json($Offers);

          }

          public function countAllcountAllhvac(){

            $userid = Auth::id();


           return $Offers =  OfferHvac::latest()->with('tender')->where('com_id',$userid)->get();


                        foreach($Offers as $Offer){

                            $Offer->setAttribute('added_at',$Offer->created_at->diffForHumans());

                        }



                return response()->json($Offers);

      }
      
      public function countAllcountAllstone(){

        $userid = Auth::id();


       return $Offers =  OfferStone::latest()->with('tender')->where('com_id',$userid)->get();


                    foreach($Offers as $Offer){

                        $Offer->setAttribute('added_at',$Offer->created_at->diffForHumans());

                    }



            return response()->json($Offers);

  }

  public function countAllcountAllInerior(){

    $userid = Auth::id();


   return $Offers =  offerInterior::latest()->with('tender')->where('com_id',$userid)->get();


                foreach($Offers as $Offer){

                    $Offer->setAttribute('added_at',$Offer->created_at->diffForHumans());

                }



        return response()->json($Offers);

}






    public function store(Request $request)
    {
        // return $request;
        
       $ruels = $this->getRules( $request);
       $messages = $this->getMessage($request);
       $valditor = Validator::make( $request->all(),$ruels,$messages);

       if($valditor->fails()){
           $errors =  response()->json(['errors' => $valditor->errors()],422);
           return $errors;
       }


       $offer =    Villa::create([
        "Emirates" => $request->Emirates,
        "Description" => $request->desc,
        "type_villa" => $request->villa,
        "title" => $request->title,
        "price" => $request->price,
        "floors" => $request->floors,
        "rooms" => $request->rooms,
        "Date" => now(),
        "time" => now(),
        "c_id" => Auth::id(),
        "confirmed" => 2,
        "ads" =>  $request->ads,
        "sqft" =>  $request->sqft,
        "kitchen"=> $request->kitchen,
        "majlis"=> $request->majlis,
        "dining"=> $request->dining,
        "bathroom"=> $request->bathroom,
        "room_master"=> $request->room_master,
        "living_room"=> $request->living_room,

        "Consultant_fee"=>$request->Consultant_fee ,
        "conditioning"=> $request->conditioning,
        "gypsum"=>$request->gypsum ,
        "Bedroom_wardrobes"=>$request->Bedroom_wardrobes,
        "electric_pendants"=>$request->electric_pendants ,
        "Kitchen_Cabinets"=>$request->Kitchen_Cabinets ,
        "pelvis"=> $request->pelvis,
        "interior_decoration"=>$request->interior_decoration ,
        "garden_design"=>$request->garden_design ,
        "the_fence"=> $request->the_fence,
        "the_elevator"=> $request->the_elevator,
        "Service_room_placement"=> $request->Service_room_placement,
        "Phone"=> $request->PhoneEng,
        "Name_eng"=> $request->NameEng,
        "supervision"=> $request->supervision,
        "design"=> $request->design,
        "CostGov"=> $request->CostGov,
        "tabCost"=> $request->tabCos,

        




    ]);



    if ($request->hasFile('images')) {
        $images = $request->file('images');

       foreach($images as $image){


           $file_extension = $image->getClientOriginalExtension();
       $file_name = time() . '.' . $file_extension;


       $file_name = 'amb_project_management_consulte' . time() . '_' . $image->getClientOriginalName();
       $file_extension = $image->getClientOriginalExtension();


       $file_path = $image->storeAs('consulting/offer', $file_name, 'public');

       $image->move(public_path('consulting/offer'), $file_name);





           offer_villa_img::create([
               "name" => $file_name,
               'path'=>$file_path,
               'img_villa_id'=>$offer->id,

           ]);

       }

   }

    return response()->json(['sueccess'=>'upload Successfuly','data'=>$offer],200);

    //return response()->json(['message'=>'تم رفع الصور بنجاح']);








    }

    protected function getRules(){


        return $ruels = [
            'Emirates'   => 'required',
            'desc' => 'required|min:100',
            'title'   => 'required|min:4',
            'villa' => 'required',
            'price' => 'required',
            'floors' => 'required',
            'rooms' => 'required',
            'room_master'=>'required',
            'majlis'=>'required',
            'bathroom'=>'required',
            'dining'=>'required',
            'kitchen'=>'required',
            'Service_room_placement'=>'required',
            'sqft'=>'required',
            'design'=>'required',
            'PhoneEng'=>'required',
            'supervision'=>'required',
            'NameEng'=>'required',
        


        ];




    }

    protected function getMessage(){

        return  $messages =[
            'Emirates.required'=> __('Emirates is required'),
            'desc.required'=> __('Description is required'),
            'title.required'=> __('title  type is  required'),
            'villa.required'=> __('villa  type is  required'),
            'desc.min'=> __('Must Be 100 Charcter    '),
            'title.min'=> __('The title must be at least 4 characters'),

        ];
    }


    public function ads_user_mini(Request $request)
    {

      $id =   Auth::id();
        $villas =  Villa::latest()->with('villaImage')->where('c_id',$id)->paginate(3);
            foreach($villas as $villa){
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
            }

        return response()->json($villas);

    }
    public function ads_user(Request $request)
    {

      $id =   Auth::id();
        $villas =  Villa::latest()->with('villaImage')->where('c_id',$id)->paginate(6);
            foreach($villas as $villa){
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
            }

        return response()->json($villas);

    }
    public function similir(Request $request){

        $Emiratesid =   $request->Emirates;

        $villas =  Villa::with('villaImage','company.company')->where('Emirates',$Emiratesid)->limit(5)->inRandomOrder()->where('status',1)->get();
        foreach($villas as $villa){
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
        }


        return response()->json($villas);
    }
    public function adsdetails(Request $request){


      

        
        $id =  $request->id;

        $VillaReview = VillaReview::where('villa_id',$id)->sum('rating');
        $reviewCalc = VillaReview::where('villa_id',$id)->get();
        $Myview = VillaReview::where('villa_id',$id)->where('user_id',Auth::id())->count();
        if($VillaReview==0){
            $rating=0;
        }else{
            $rating =  $VillaReview / count($reviewCalc) ;
        }
        // $offers =  Villa::with('villaImage','company.company','savedVilla')->where('status',1)->where( 'ads','=',1)->latest()->get();
        $villas =  Villa::with('villaImage','company.company','savedVilla','review.user')->where('id',$id)->where('status',1)->get();
        
        foreach($villas as $villa){
            $villa->setAttribute('rating',$rating);
            $villa->setAttribute('Myview',$Myview);
            $villa->setAttribute('CountReview',count($reviewCalc));
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
        }


        return response()->json($villas);
    }
    public function uniquedetails(Request $request){


        $id =   $request->id;
        $villas =  Villa::with('villaImage')->where('ads',1)->where('status',1)->limit(3)->inRandomOrder()->get();
        foreach($villas as $villa){
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
        }


        return response()->json($villas);
    }
    public function randomOffers(Request $request){



        $villas =  Villa::with('villaImage')->where('ads',1)->where('status',1)->limit(3)->inRandomOrder()->get();
        foreach($villas as $villa){
        $villa->setAttribute('added_at',$villa->created_at->diffForHumans());
        }


        return response()->json($villas);
    }



    public function showOffer(Request $request){



        $offers =  Villa::with('villaImage','company.company','savedVilla')->where('status',1)->where( 'ads','=',1)->
        inRandomOrder()->latest()->get();
        $classicVilla = Villa::with('villaImage','company.company','savedVilla')->where('status',1)->where( 'type_villa','=',1)->where( 'ads','=',0)->latest()->limit(4)->get();
        $modernVilla = Villa::with('villaImage','company.company','savedVilla')->where('status',1)->where( 'type_villa','=',2)->where( 'ads','=',0)->latest()->latest()->limit(4)->get();


        // return response()->json($offers);
        return response()->json(['offers'=>$offers,'classic'=>$classicVilla,'modern'=>$modernVilla]);
    }
    public function showOffeUnique(Request $request){
        $offers =  Villa::with('villaImage','company.company','savedVilla')->
        where('status',1)->inRandomOrder()->where( 'ads','=',1)->latest()->limit(2)->get();
        return $offers;

    }
    public function justshowOffer(Request $request){



        $offers =  Villa::latest()->with('villaImage')->where('confirmed',1)->paginate(6);



        return response()->json($offers);
    }



    public function searchoffer($query){


            $posts = Villa::where('Emirates','like','%'.$query.'%')->with('villaImage');

            $nbposts =count($posts->get());

            foreach($posts->get() as $post){
                $post->setAttribute('added_at',$post->created_at->diffForHumans());

            }
            $posts = $posts->paginate(intval($nbposts));

            return response()->json($posts);




    }



    public function filterOffers(Request $request){

        $Emirates =  $request->loaction;
        $type =  $request->type;
        $bed =  $request->bed;
        $bath =  $request->bath;
        $user_id =Auth::id();

        $posts="";

        if( $type=='all' && $Emirates=='all' && $bed=='all' ){
        $posts = Villa:: with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }

        if($Emirates!='all' && $type!='all' && $bed!='all' ){
            $posts = Villa::where('Emirates',$Emirates  )->
            where('type_villa','like','%'.$type.'%')->
            where('rooms',$bed)->
            where('bathroom','like','%'.$bath.'%')->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }
        if($Emirates!='all' && $type!='all' && $bed!='all' ){
            $posts = Villa::where('Emirates',$Emirates  )->
            where('type_villa','like','%'.$type.'%')->
            where('rooms',$bed)->
            where('status',1)->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ]);
        }
        if($Emirates!='all' && $type!='all' && $bed=="all" ){
            
            $posts = Villa::where('Emirates',$Emirates  )->
            where('type_villa','like','%'.$type.'%')->
            where('status',1)->
            with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ]);
        }

        if($Emirates!='all' && $type=="all" && $bed=="all" ){
            $posts = Villa::where('Emirates',$Emirates  )->
            where('status',1)->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ]);
        }


        if( $type!='all' && $Emirates=="all" && $bed=="all" ){
            $posts = Villa::where('type_villa',$type)-> with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }
        if( $type!='all' && $Emirates=="all" && $bed!='all'){
            $posts = Villa::
            where('type_villa','like','%'.$type.'%')->
            where('rooms',$bed)->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }
        if( $type!='all' && $Emirates=="all" && $bed!='all'){
            $posts = Villa::
            where('type_villa',$type)->
            where('rooms',$bed)->
            where('bathroom','like','%'.$bath.'%')->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }




        if( $type=="all" && $Emirates!='all' && $bed=="all" ){
            $posts = Villa::where('Emirates',$Emirates  )->
            where('bathroom','like','%'.$bath.'%')->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }

        if( $type=='all' && $Emirates!='all' && $bed!='all' ){
            $posts = Villa::where('Emirates',$Emirates  )->
            where('rooms',$bed)->
            where('bathroom','like','%'.$bath.'%')->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }
        if( $type=='all' && $Emirates=='all' && $bed!='all' ){
            $posts = Villa::
            where('rooms',$bed)->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }

        if( $type=='all' && $Emirates=='all' && $bed=='all' ){
            $posts = Villa::
            where('bathroom','like','%'.$bath.'%')->
             with(['villaImage','Company.company','savedVilla'=> function($query) { 
                $user_id =Auth::id();
                $query->where('user_id',$user_id); // without `order_id`
            }
            ])->where('status',1)->latest();
        }










        $nbposts =count($posts->get());



        foreach($posts->get() as $post){
            $post->setAttribute('added_at',$post->created_at->diffForHumans());

        }
        $posts = $posts->paginate(intval($nbposts));

        return response()->json($posts);


}
    public function ChoosEmirates($query){

        if($query=="all"){


            $offers = Villa::whereBetween('Emirates',[0 , 9])->with('villaImage')->where('confirmed',1)->where('ads',1)->latest()->get();
            $classicVilla =Villa::whereBetween('Emirates',[0 , 9])->with('villaImage')->where('confirmed',1)->where('ads',0)->latest()->where( 'type_villa','=',1)->limit(4)->get();
            $modernVilla = Villa::whereBetween('Emirates',[0 , 9])->with('villaImage')->where('confirmed',1)->where( 'ads','=',0)->where( 'type_villa','=',2)->limit(4)->latest()->get();
        }else{




        $offers = Villa::where('emirates','=',$query)->with('villaImage')->where('confirmed',1)->where('ads',1)->latest()->get();
        $classicVilla =Villa::where('emirates','=',$query)->with('villaImage')->where('confirmed',1)->where('ads',0)->latest()->where( 'type_villa','=',1)->limit(4)->get();
        $modernVilla = Villa::where('emirates','=',$query)->with('villaImage')->where('confirmed',1)->where( 'ads','=',0)->where( 'type_villa','=',2)->limit(4)->latest()->get();
        }




        foreach($offers as $offer){
           $offer->setAttribute('added_at',$offer->created_at->diffForHumans());


         }

         foreach($classicVilla as $cvilla){
           $cvilla->setAttribute('added_at',$cvilla->created_at->diffForHumans());


          }
          foreach($modernVilla as $mvilla){
             $mvilla->setAttribute('added_at',$mvilla->created_at->diffForHumans());
          }





        return response()->json(['offers'=>$offers,'classic'=>$classicVilla,'modern'=>$modernVilla]);






}
    public function saved(Request $request){

        $villa_id = $request->villa_id;

      $saved =   saved::create([
            'villa_id' => $request->villa_id,
            'user_id' => auth::id()


        ]);

        return $saved->villa_id;

    }

    public function saveddelete(Request $request){

        $villa_id = $request->villa_id;
        $userid  = auth::id();
        // return $villa_id;

        $saved = saved::where('villa_id',$villa_id)->where('user_id',$userid)->delete();





        return 'succes Undo Saved';

    }

    public function getSavedVilla(Request $request){


        $userid  = auth::id();
        // return $villa_id;

        $saved = saved::with('savedVilla.villaImage')->where('user_id',$userid)->paginate(5);





        return $saved;

    }


}

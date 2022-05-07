<?php

namespace App\Http\Controllers;

use App\branch;
use App\Events\NewTender;
use App\Events\retenderConsulte;
use App\Events\TenderTconulte;
use App\hvac;
use App\HvacFiles;
use App\Models\admin;
use App\Models\companies;
use App\Notifications\NotifyRetenderConsulte;
use App\Notifications\NotiTenders;
use App\OfferHvac;
use App\offerInterior;
use App\OfferStone;
use App\request_tender;
use App\stone;
use App\tclfile;
use App\tconsl_img;
use App\Tconstr;
use App\Tconsulte;
use App\Tinterior;
use App\Toffers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Aws\S3\S3Client;
use Illuminate\Contracts\Filesystem\Filesystem;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class TenderController extends Controller
{



    public function insert_consl_from_offer(Request $request){

        // return $request;
        
      
            if($request->typePost=="update"){
                $ruels = $this->getRules2( $request);
                $messages = $this->getMessage($request);
                $valditor = Validator::make( $request->all(),$ruels,$messages);
                if($valditor->fails()){
                    $errors =  response()->json(['errors' => $valditor->errors()],422);
                    return $errors;
                }
            }
  


        // return $request->all();
        $numberStage=1;

       $tenders =  Tconsulte::create([
            'villa_type' => $request->villa_type,
            'position' => $request->position,
            'room_mastar' => $request->mastar_room,
            'majlis' => $request->majlis,
            'living_room' => $request->living_room,
            'kitchens' => $request->kitchens,
            'floors' => $request->floor,
            'emirats' => $request->emirates,
            'bathroom' => $request->bathroom,
            'dining_room' =>$request->dining_room,
            'note' => $request->Notes,
            'title' => $request->title,
            'bedroom' => $request->bedroom,
            'user_id' => $request->user()->id,
             'status'=>2,
            'offer_owner_id' => $request->com_id,
            'stage'=>$numberStage,

        ]);
        




            $Toffers = new Toffers();
            $Toffers->com_id = $tenders->offer_owner_id;
    
            $Toffers->tender_id = $tenders->id;
            $Toffers->save();

            request_tender::create([
                'tender_id' =>  $tenders->id,
                'offer_id' => $Toffers->id,
                'user_id' => Auth::id(),
                'com_id' =>$tenders->offer_owner_id,
                'type' => 'consulting',
            ]);
        


      



        if ($request->images) {

            $images = $request->images;

            foreach ($images as $image) {

                $file_name =  $image ;


                $file_path ='consulting/offer/'.$file_name;
                tconsl_img::create([
                    "name" => $file_name,
                    "path" => $file_path,
                    'tender_id' => $tenders->id,
                ]);
            }
        }



            $admin = admin::where('role_id',1)->get();

            broadcast(new TenderTconulte($tenders->user,$admin,$tenders));

        // broadcast(new NewTender($tenders->user,$tenders))->toOthers();
        // broadcast(new NewTender($user,$tender,$admins));



        Notification::send($admin, new NotiTenders($tenders));
        // $admins->notify(new NotiTenders($tender));

        return response()->json($tenders->id);



    }
    
        public function soilFile(Request $request){
            if ($request->hasFile('soil')) {

                $soil = $request->file('soil');
             
               

                    $file_name = 'amb_soil' . time() . '_' . $soil->getClientOriginalName();
                    // $file_extension = $image->getClientOriginalExtension();
                    $names = $file_name;

                   

                    $file_path = $soil->storeAs('consulting/tender', $file_name, 'public');
                    $soil->move(public_path('consulting/tender'), $file_name);
                    // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                    return $file_path;
            
              
            }
        }

        public function MapFile(Request $request){
            if ($request->hasFile('map')) {

                $soil = $request->file('map');
             
               

                    $file_name = 'amb_soil' . time() . '_' . $soil->getClientOriginalName();
                    // $file_extension = $image->getClientOriginalExtension();
                    $names = $file_name;

                   

                    $file_path = $soil->storeAs('consulting/tender', $file_name, 'public');
                    $soil->move(public_path('consulting/tender'), $file_name);
                    // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                    return $file_path;
            
              
            }
        }
            public function insert_consl(Request $request){



            $ruels = $this->getRules( $request);
            $messages = $this->getMessage($request);



            $valditor = Validator::make( $request->all(),$ruels,$messages);
            if($valditor->fails()){
                $errors =  response()->json(['errors' => $valditor->errors()],422);
                return $errors;
            }


         
           $tenders =  Tconsulte::create([
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'priceGrant' => $request->priceGrant,
                'Provider' => $request->Provider,
                'BankProvider' => $request->BankProvider,
                'typeBuild' => $request->typeBuild,
                'mapPath' => $request->mapPath,
                
                'crypt' => $request->crypt,
                'villaShape' => $request->villaShape,
                'villa_type' => $request->villa_type,
                'position' => $request->position,
                'min' => $request->min,
                'max' => $request->max,
                'room_mastar' => $request->mastar_room,
                'majlis' => $request->majlis,
                'living_room' => $request->living_room,
                'kitchens' => $request->kitchens,
                'floors' => $request->floor,
                'emirats' => $request->emirates,
                'bathroom' => $request->bathroom,
                'dining_room' =>$request->dining_room,
                'note' => $request->Notes,
                'title' => $request->title,
                'bedroom' => $request->bedroom,
                'finishing' => $request->finishing,
                'soil'=>$request->soil,
                'user_id' => $request->user()->id

            ]);



            if ($request->hasFile('images')) {

                $images = $request->file('images');
                foreach ($images as $image) {

                    $file_name = 'amb_tender_consulte' . time() . '_' . $image->getClientOriginalName();
                    $file_extension = $image->getClientOriginalExtension();
                    $names = $file_name;
                    $file_path = $image->storeAs('consulting/tender', $file_name, 'public');
                    $image->move(public_path('consulting/tender'), $file_name);
                    tconsl_img::create([
                        "name" => $file_name,
                        "path" => $file_path,
                        'tender_id' => $tenders->id,
                    ]);
                }
            }



                $admin = admin::where('role_id',1)->get();

                broadcast(new TenderTconulte($tenders->user,$admin,$tenders));

            // broadcast(new NewTender($tenders->user,$tenders))->toOthers();
            // broadcast(new NewTender($user,$tender,$admins));



            Notification::send($admin, new NotiTenders($tenders));
            // $admins->notify(new NotiTenders($tender));

            return response()->json($tenders->id);



        }

        protected function getRules(){


            return $ruels = [
            'title' => 'required|min:4',
            'emirates' => 'required|integer',
            'villa_type' => 'required|string',
            'position' => 'required|string',
            'mastar_room' => 'required|integer',
            'min' => 'required',
            'max' => 'required',
            'living_room' => 'required|integer',
            'majlis' => 'required|integer',
            'kitchens' => 'required|integer',
            'dining_room' => 'required|integer',
            'floor' => 'required|integer',
            'bathroom' => 'required|integer',
            'bedroom'=>'required|integer',
            'Notes' => 'required|min:10',
            ];



        }
        protected function getRules2(){
            return $ruels2 = [
                'title' => 'required|min:4',
                'emirates' => 'required|integer',
                'villa_type' => 'required|string',
                'position' => 'required|string',
                'mastar_room' => 'required|integer',
                'living_room' => 'required|integer',
                'majlis' => 'required|integer',
                'kitchens' => 'required|integer',
                'dining_room' => 'required|integer',
                'floor' => 'required|integer',
                'bathroom' => 'required|integer',
                'bedroom'=>'required|integer',
                'Notes' => 'required|min:100',
                ];
        }

        protected function getMessage(){

            return  $messages =[
                'Notes.required'=> __('The Notes Is Required'),
                'title.required'=> __('The title Is Required'),
                'title.max'=> __('The title must Be at least 4 charcter'),
                'Notes.max'=> __('The Notes must Be at least 100 charcter'),
                'position.required'=> __('The position must Be at least 100 charcter'),
                'mastar_room.required'=> __(' The Mastar room is required'),


            ];


}
public function updatConsultedata(Request $request){


    $id = $request->id;
    // return $request;


    $tender = Tconsulte::find($id);
    $tender->title =$request->title;
    $tender->note =$request->desc;
    $tender->bathroom =$request->bathroom;
    $tender->bedroom=$request->Bedroom;
    $tender->villa_type=$request->villa_type;
    $tender-> dining_room=$request->dining_room;
    $tender->floors=$request->floors;
    $tender-> kitchens=$request->kitchen;
    $tender->  majlis=$request->majlis;
    $tender->  max=$request->max;
    $tender->  min=$request->min;
    $tender->position=$request->position;
    $tender->room_mastar=$request->master;
    $tender->emirats=$request->emirats;
    $tender->living_room=$request->living;
    $tender->typeBuild=$request->typeBuild;
    $tender->priceGrant=$request->priceGrant;
    $tender->Provider=$request->Provider;
    $tender->BankProvider=$request->BankProvider;

    $tender->status=0;

     $tender->save();
    

      $admins=admin::where('role_id',1)->get();
      event(new retenderConsulte($tender->user ,$admins, $tender));






      Notification::send($admins, new NotifyRetenderConsulte($tender->user,$tender));


      return $tender;


}
public function InsertConsultingImage(Request $request){

    $id =   $request->id;

if ($request->hasFile('images')) {

        $images = $request->file('images');
        foreach ($images as $image) {

            $file_name = 'amb_tender_consulte' . time() . '_' . $image->getClientOriginalName();
            $file_extension = $image->getClientOriginalExtension();
            $names = $file_name;
            $file_path = $image->storeAs('consulting/tender', $file_name, 'public');
            $image->move(public_path('consulting/tender'), $file_name);
            tconsl_img::create([
                "name" => $file_name,
                "path" => $file_path,
                'tender_id' => $id,
            ]);
        }
    }
    return " add image succssfuly";
}
public function DeleteConsultingImage(Request $request){


    $id = $request->id;


    $image = tconsl_img::find($id);

    $image->delete();

}
public function AllMyHvacTender(Request $request)
{
    $id = $request->user()->id;


    $tenderConstr = hvac::latest()->with('Tcimg')->where('user_id',$id)->get();
    

    foreach($tenderConstr as $consr){
        $OfferHvac =OfferHvac::latest()->where('tender_id',$consr->id)->get();
        $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
        $consr->setAttribute('count',$OfferHvac->count());
    }



    return response()->json($tenderConstr);


}
public function AllMyinteriorTender(Request $request)
{
    $id = $request->user()->id;


    $Tinteriors = Tinterior::latest()->where('user_id',$id)->get();

    foreach($Tinteriors as $Tinterior){
        $offerInterior =offerInterior::latest()->where('tender_id',$Tinterior->id)->get();
        $Tinterior->setAttribute('added_at',$Tinterior->created_at->diffForHumans());
        $Tinterior->setAttribute('count',$offerInterior->count());

    }



    return response()->json($Tinteriors);


}
public function AllMyStoneTender(Request $request)
{
    $id = $request->user()->id;


    $stones = stone::latest()->with('Tcimg')->where('user_id',$id)->get();

    foreach($stones as $Stone){
        $offerStone =OfferStone::latest()->where('tender_id',$Stone->id)->get();
        $Stone->setAttribute('added_at',$Stone->created_at->diffForHumans());
        $Stone->setAttribute('count',$offerStone->count());
    }



    return response()->json($stones);


}
public function AllMyConsrtender(Request $request)
{
    $id = $request->user()->id;


    $tenderConstr = Tconstr::latest()->with('Tcimg','offerConsr')->where('user_id',$id)->get();

    foreach($tenderConstr as $consr){
        $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
    }






    return response()->json($tenderConstr);


}


        public function AllMyconslCtenderType($query)
        {






                $offers = Tconsulte::where('status','=',$query)->latest()->get();
                foreach($offers as $offer){
                    $offer->setAttribute('added_at',$offer->created_at->diffForHumans());


                  }
                  return $offers;





        }
public function AllMyconslCtender(Request $request)
{
    $id = $request->user()->id;
    $tender = Tconsulte::latest()->with('AllOffers')->where('user_id',$id)->get();


    foreach($tender as $con){
        $con->setAttribute('added_at',$con->updated_at->diffForHumans());
    }



    return response()->json( $tender);


}
            public function AllMyCtender(Request $request)
            {
                $id = $request->user()->id;
                $tender = Tconsulte::latest()->where('user_id',$id)->get();



                $tenderConstr = Tconstr::latest()->where('user_id',$id)->get();
                $tenderHvac = hvac::latest()->where('user_id',$id)->get();
                $tenderStone = stone::latest()->where('user_id',$id)->get();
                $tenderInterior = Tinterior::latest()->where('user_id',$id)->get();

                foreach($tenderConstr as $consr){
                    $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
                }
                foreach($tender as $con){
                    $con->setAttribute('added_at',$con->created_at->diffForHumans());
                }

                

                return response()->json(['consulte'=> $tender->count(),
                'consr'=>$tenderConstr->count(),
                'hvac'=>$tenderHvac->count(),
                'stone'=>$tenderStone->count(),'Interior'=>$tenderInterior->count()]);


            }

            public function CountCtender(Request $request)
            {
                $id = $request->user()->id;
                $tender = Tconsulte::all()->where('user_id',$id);
                $count = $tender->count();

                return $count;
            }
            public function CEngtender(Request $request)
            {
    

                $user_id = auth::id();
               




                
            

               
         
    
              
                    $id = $request->id;
      
    
                    $CommentTender = Toffers::where('tender_id',$id)->where('com_id',$user_id);
                    $count = $CommentTender->count();
    
                    
    
            $tenders = Tconsulte::where('id',$id)->with('user','image')->get();
    
    
            $commnets= Toffers::where('tender_id',$id)->with('user')->get();
    
    
    
    
    
            foreach($tenders as $tender){
    
                $request_tender = request_tender::where('tender_id', $tender->id)->get();
                    foreach($commnets as $comment){
    
    
                        $tcfiles= tclfile::where('consl_id',$comment->id)->get();
    
    
    
                    $comment->setAttribute('confirmd', $request_tender);
                       // $tender->setAttribute('Commenter',Toffers::where('tender_id',$id)->with('user')->get());
                        $comment->setAttribute('Commented_at',$comment->created_at->diffForHumans());
                        $comment->setAttribute('ImageComments',$tcfiles);
                    }
    
                    $tender->setAttribute('comments',$commnets);
                    $tender->setAttribute('count',$count);
                    
                     $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
    
            }
    
            return response()->json($tenders);
         }


            public function ctender(Request $request)
            {




                $id = $request->id;
        $tenders = Tconsulte::where('id',$id)->with('user','image')->get();


        $commnets= Toffers::where('tender_id',$id)->with('user')->get();





        foreach($tenders as $tender){

            $request_tender = request_tender::where('tender_id', $tender->id)->get();
                foreach($commnets as $comment){


                    $tcfiles= tclfile::where('consl_id',$comment->id)->get();



                $comment->setAttribute('confirmd', $request_tender);
                   // $tender->setAttribute('Commenter',Toffers::where('tender_id',$id)->with('user')->get());
                    $comment->setAttribute('Commented_at',$comment->created_at->diffForHumans());
                    $comment->setAttribute('ImageComments',$tcfiles);
                }

                $tender->setAttribute('comments',$commnets);
                 $tender->setAttribute('added_at',$tender->created_at->diffForHumans());

        }

        return response()->json($tenders);
            }


            public function commentctender(Request $request)
            {

                $tender_id = $request->id;


                $CommentTender = Toffers::get()->where('tender_id',$tender_id);




                return response()->json($CommentTender);
            }



            public function CountcComment(Request $request)
            {

                $tender_id = $request->id;

                $CommentTender = Toffers::all()->where('tender_id',$tender_id);
                $count = $CommentTender->count();



                return response()->json($count);
            }
     
            public function AllTenderConsulte()
            {
                $user_id = auth::id();
                $emirats  = companies::where('user_id',$user_id)->first();

             $branchs  = branch::where('company_id',$user_id)->where('status',1)->pluck('emirates')->all();




                
                $tenders = Tconsulte::latest()->where('status',1)->where('stage',0)->

               whereIn('emirats',$branchs)->Orwhere('emirats',$emirats->emirates)->paginate(5);

                foreach($tenders as $tender){
                   $uid =  $tender->id;
                    $offer = Toffers::where('tender_id',$uid)->get();

                    $tender->setAttribute('count',$offer->count());
                    $tender->setAttribute('added_at',$tender->created_at->diffForHumans());
                
                return response()->json($tenders);
            }

            }

            public function letsttenders(){

             $id = Auth::id();
                $consulte = Tconsulte::limit(3)->where('user_id',$id)->latest()->get();
                $Tconstr = Tconstr::limit(3)->where('user_id',$id)->latest()->get();
                $hvac = hvac::limit(3)->where('user_id',$id)->latest()->get();
                $stone = stone::limit(3)->where('user_id',$id)->latest()->get();
                $interior = Tinterior::limit(3)->where('user_id',$id)->latest()->get();

                foreach($Tconstr as $consr){
                    $consr->setAttribute('added_at',$consr->created_at->diffForHumans());
                }
                foreach($consulte as $con){
                    $con->setAttribute('added_at',$con->created_at->diffForHumans());
                }

                return response()->json(['consulting'=>$consulte,'consr'=>$Tconstr,'hvac'=>$hvac,'stone'=>$stone,'interior'=>$interior]);


            }



        }


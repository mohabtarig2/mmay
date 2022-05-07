<?php

namespace App\Http\Controllers;

use App\CompanyFile;
use App\Models\companies;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompleteContoller extends Controller
{

    public function thisPhoneIsAvailble(Request $request){

      $companies =  companies::where('phone',$request->mobile)->get();
      if($companies->count() == 1){
          return $companies->count();
      }
      if($companies->count() == 0){
        return $companies->count();
    }
    }
    public function getlicence(Request $request)
    {

        $companies =  CompanyFile::where('user_id',Auth::id())->get();
        return $companies;


    }
    public function Getcomplete(Request $request)
    {

        $companies =  companies::where('user_id',Auth::id())->get();
        return $companies;


    }
    public function BranchiFile(Request $request){
        if ($request->hasFile('DubaiFile')) {

            $soil = $request->file('DubaiFile');
         
           

                $file_name = 'amb_DubaiFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }

        if ($request->hasFile('SHFile')) {

            $soil = $request->file('SHFile');
         
           

                $file_name = 'amb_SHFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }

        
        if ($request->hasFile('ADFile')) {

            $soil = $request->file('ADFile');
         
           

                $file_name = 'amb_ADFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }
        if ($request->hasFile('RASFile')) {

            $soil = $request->file('RASFile');
         
           

                $file_name = 'amb_RASFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }
        if ($request->hasFile('FUJFile')) {

            $soil = $request->file('FUJFile');
         
           

                $file_name = 'amb_FUJFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }

         
        if ($request->hasFile('UMFile')) {

            $soil = $request->file('UMFile');
         
           

                $file_name = 'amb_UMFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }
        if ($request->hasFile('AJFile')) {

            $soil = $request->file('AJFile');
         
           

                $file_name = 'amb_AJFile' . time() . '_' . $soil->getClientOriginalName();
                // $file_extension = $image->getClientOriginalExtension();
                $names = $file_name;

               

                $file_path = $soil->storeAs('branch/files', $file_name, 'public');
                $soil->move(public_path('branch/files'), $file_name);
                // $request->file('soil')->storeAs('soil-file',$file_name,'DO_SPACES');

                return $file_path;
        
          
        }
        
    }
    public function complete(Request $request)
    {




  $ruels = $this->getRules($request);
        $messages = $this->getMessage($request);


        $valditor = Validator::make($request->all(),$ruels,$messages);

        if($valditor->fails()){

            $errors =  response()->json(['error' => $valditor->errors()], 422);
            return $errors;

        }

        


        return companies::create([
            'about_us' => $request->about,
            'phone' => $request->phone,
            'emirates' => $request->emirates,
            'date_create' => $request->date_create,
            'manager_ar' => $request->manger_ar,
            'manager_en' => $request->manger_en,
            'company_ar' => $request->Company_ar,
            'company_en' => $request->Company_en,
            'user_id' => Auth::id(),

        ]);



    }

    protected function getRules(){


        return $ruels = [
            'about' => 'required|string|min:100',
        'phone' => 'required|string|max:20|unique:companies',
        'date_create' =>'required|date',
        'emirates' => 'required|integer',
        'manger_ar' => 'required|string',
        'manger_en' => 'required|string',
        'Company_ar' => 'required|string',
        'Company_en' => 'required|string',




        ];




    }

    protected function getMessage(){

        return  $messages =[
            'about.required'=> __(' About us Is Required'),
            'phone.required'=> __(' Number Is required'),
            'date_create.required'=> __(' date Is required'),
            'emirates.required'=> __(' emirates Is required'),
            'manger_ar.required'=> __(' mange name ar Is required'),
            'manger_en.required'=> __(' mange name en Is required'),
            'Company_ar.required'=> __(' Number Is required'),
            'Company_en.required'=> __(' Number Is required'),


        ];
    }

}

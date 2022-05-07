<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\achivement;
use App\CompanyFile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FUploadController extends Controller
{
    public function LicenceUpload(Request $request){




        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf',
            'avatar' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf',
            //'file' => 'required|mimes:pdf|max:2048'
         ]);
         $fileUpload = new CompanyFile;

         if($request->file() && $request->hasFile('avatar')) {
             $file_name = time().'_'.$request->file->getClientOriginalName();
             $file_path = $request->file('file')->storeAs('uploads/licence', $file_name, 'public');
             $request->file->move(public_path('uploads/licence'), $file_name);


             $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
             $fileUpload->path = '/storage/' . $file_path;
             $fileUpload->user_id = $request->user()->id;
             $fileUpload->save();





             $avatar= $request->file('avatar');

             $file_name_pass = 'amb_avatar'.time().'_'.$avatar->getClientOriginalName();
             // $file_extension_pass = $imagePassport= $request->file('avatar');
             $namePass = $file_name_pass;
             $file_path_avatar = $avatar->storeAs('assets/userAvatar', $namePass, 'public');
             $avatar->move(public_path('assets/userAvatar'), $namePass);
             $userid =  Auth::id();
             $user = User::find($userid);
             $user->avatar =$file_path_avatar;
             $user->save();
             

    }



}

public function AchivementUpload(Request $request){




    $request->validate([
        'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf'
        //'file' => 'required|mimes:pdf|max:2048'
     ]);
     $fileUpload = new achivement();


     if($request->file()) {
         $file_name = time().'_'.$request->file->getClientOriginalName();

         $file_path = $request->file('file')->storeAs('uploads/achive', $file_name, 'public');
         $request->file->move(public_path('uploads/achive'), $file_name);

         $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
         $fileUpload->path = '/storage/' . $file_path;
         $fileUpload->user_id = $request->user()->id;
         $fileUpload->AchiveThreeYears = $request->AchiveThreeYears;
         $fileUpload->AchiveSinceCreate = $request->AchiveSinceCreate;

         $fileUpload->save();

         return response()->json(['success'=>'File uploaded successfully.']);


}
}

}

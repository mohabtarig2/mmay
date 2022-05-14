<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;





class CustomController extends Controller
{


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response;
     * */


    public function __construct()
    {

    }


    protected function authenticated(Request $request , $user)
    {
       // $token = $user->createToken('my-app-token');


            if($request->isXmlHttpRequest()){
                return response(null,204);

            }
    }
    public function adminLogin()
    {
        return view('auth.adminLogin');
    }

    
    public function checkAdminLogin(Request $request){

    $credentaials = [
        'email'=>$request->email,
        'password'=>$request->password,
    ];


if(auth::guard('admin')->attempt( $credentaials)){
    // $token = auth::user()->createToken('my-app-token')->accessToken;

    $token = auth::guard('admin')->user()->createToken('my-admin-token')->accessToken;

    return response()->json([
        'token'=>$token,
        'msg'=>'You Are Logged',
    ],200);


    // return redirect('/adminUser');
}else{
    
    return response()->json([
        'erorrs'=>'errors'],401);
    
}
}

public function logout(Request $request) {
    Auth::guard('admins')->logout();

  }



}


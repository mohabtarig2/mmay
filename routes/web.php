<?php

use App\CompanyFile;
use App\CompanyFiles;
use App\Events\TenderTconulte;
use App\Models\companies;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Container\Container;
use Laravel\Ui\Presets\Vue;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::group(['middleware' => ['web']], function () {
Route::post('login', 'Auth/LoginController@login');
});

Route::middleware('auth')->post('test','OfferController@test');

Route::middleware('auth:sanctum')->get('/token', function (Request $request) {
    $id =  $request->user()->id;
    $user = User::find($id);
    $token= $user->createToken('my-app-web');
    return response()->json($token);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    $id =  $request->user()->id;

if($request->user()->roles->id!=10){



    $user = User::with('roles','company','companyfile','achivementFile','branch')->find($id);
            $user->makeVisible(['user_id']);
            $token= $user->createToken('my-app-web');
            $user->setAttribute('added_at',$user->created_at->diffForHumans());
        }else{
            $user = User::with('roles')->find($id);
            $user->makeVisible(['user_id']);
            $token= $user->createToken('my-app-web');
            $user->setAttribute('added_at',$user->created_at->diffForHumans());
        }

            return response()->json($user);

    });





    // Route::middleware(['admins'])->group(function () {
        Route::get('/getUnreadNotificatons',"UserController@getUnreadNotificatons");
        Route::get('getAllNotificatons',"UserController@getAllNotificatons");
        Route::get('getLastTenNotifications',"UserController@getLastTenNotifications");
        Route::put('NotificatonsMarkAsRead',"UserController@NotificatonsMarkAsRead");
    // });

    Route::middleware(['auth'])->group(function () {

        Route::get('/company/complete',function(Request $request){
            $userid = $request->user()->id;
            return $userid;
            $available = companies::all()->where('user_id', '=', $userid);

            return response()->json($available);
        });
        Route::get('/company/Files',function(Request $request){

            $available = CompanyFile::all();
            return response()->json($available);
        });



    });
Route::post('skip','UserController@skip');
Route::post('SetBranch','UserController@SetBranch');
Route::post('/bregister','BRegisterController@bcreate');
Route::get('/partner',function(){
    return view('partner');
})->name('partner');




Route::post('complete','CompleteContoller@complete');
Route::post('thisPhoneIsAvailble','CompleteContoller@thisPhoneIsAvailble');
Route::get('Getcomplete','CompleteContoller@Getcomplete');

Route::get('getlicence','CompleteContoller@getlicence');


Route::post('BranchiFile','CompleteContoller@BranchiFile');











Route::group(['middleware' => 'admins'], function () {

    Route::get('/consulte', function (Request $request) {
        return view('consulte');
    })->name('consulte');
 });




Route::post('checkAdminLogin','Auth\CustomController@checkAdminLogin');


Route::get('/home', function () {
    return view('home');
});

Route::get('/', function () {
    return view('index');
});





/*Route::get('home/{any?}', function () {
    return view('test');
})->where('any', '^(?!api\/)[\/\w\.-]*');
*/

//Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){

auth::routes(['verify'=>true]);
// Route::get('', 'HomeController@index')->name('/');

//Route::view('/','index');

//constructionController

Route::post('post_tender_from_request','constructionController@PostTenderFromRequest' );

Route::post('tconstr','constructionController@tender');
Route::post('Thvac','constructionController@Hvactender');
Route::post('HvacFilES','constructionController@InsertHvacFile');
Route::post('StoneFilES','constructionController@InsertStoneFilES');
Route::post('InteriorFilES','constructionController@InsertInteriorFilES');

Route::post('TStone','constructionController@StoneTender');
Route::post('TInterior','constructionController@InteriorTender');
Route::get('/AllTenderConsr' ,'constructionController@AllTenderConsr')->middleware('consr');
Route::get('/AllTenderHvac' ,'constructionController@AllTenderHvac');
Route::get('/AllTenderStone' ,'constructionController@AllTenderStone');
Route::get('/AllTenderInterior' ,'constructionController@AllTenderInterior');




Route::post('/insertOffer' ,'constructionController@insertOffer')->middleware('consr');
Route::post('/insertHvacOffer' ,'constructionController@insertHvacOffer');
Route::post('/insertInteriorOffer' ,'constructionController@insertInteriorOffer');

Route::post('/insertStoneOffer' ,'constructionController@insertStoneOffer');
Route::get('showConsrTender/{id}','constructionController@showTenders');
Route::get('showHvacTender/{id}','constructionController@showHvacTender');
Route::get('showInteriorTender/{id}','constructionController@showInteriorTender');
Route::get('showStoneTender/{id}','constructionController@showStoneTender');
Route::post('UpdateTenderConstruction','constructionController@UpdateTenderConstruction');
Route::post('UpdateTenderTitle','constructionController@UpdateTenderTitle');
Route::post('UpdateTenderInteriorTitle','constructionController@UpdateTenderInteriorTitle');

Route::post('confirm/construction/offer','constructionController@confirmOffer');
Route::post('confirm/hvac/offer','constructionController@confirmHvacOffer');
Route::post('confirm/interior/offer','constructionController@confirmInteriorOffer');
Route::post('confirm/stone/offer','constructionController@confirmStoneOffer');
Route::post('UpdateTitleConstruction','constructionController@UpdateTitleConstruction');


Route::post('ConstrFilES','constructionController@InsertConstrFile');




Route::post('UpdateTitleHvac','constructionController@UpdateTitleHvac');
Route::post('UpdateTitleStone','constructionController@UpdateTitleStone');
Route::post('UpdateNotesConstruction','constructionController@UpdateNotesConstruction');
Route::post('update/threedFile','constructionController@updateThreedFile');
Route::post('update/hvac/threedFile','constructionController@updateHvacThreedFile');
Route::post('update/interior/threedFile','constructionController@updateinteriorThreedFile');
Route::post('update/stone/threedFile','constructionController@updateStoneThreedFile');





Route::view('landing','landing');

Route::view('business-board','business-board');
Route::view('account','account');

Route::view('add-offer','add-offer');
Route::view('villa','villa');

Route::view('villas','villas');

Route::view('profile-company','profile-company');


Route::view('review','review');


Route::view('b-dashboard','b-dashboard');


/*/Route::get('/dashboard',function(){
    return 'not adult';
})->name('not.adult');*/
Route::view('password','password');

Route::post('/upload','UploadController@handle');

Route::post('/licencefile','FUploadController@LicenceUpload');
Route::post('/Achivementfile','FUploadController@AchivementUpload');





Route::post('tenders' ,'TenderController@insert_consl');
Route::post('soilFile' ,'TenderController@soilFile');
Route::post('MapFile' ,'TenderController@MapFile');



Route::post('tendersFromOffers' ,'TenderController@insert_consl_from_offer');
Route::get('AllMyHvacTender' ,'TenderController@AllMyHvacTender');
Route::get('AllMyStoneTender' ,'TenderController@AllMyStoneTender');
Route::get('AllMyinteriorTender' ,'TenderController@AllMyinteriorTender');
Route::get('AllMyconslCtender' ,'TenderController@AllMyconslCtender');
Route::get('AllMyconslCtender/type/{query}' ,'TenderController@AllMyconslCtenderType');
Route::post('edit/consulte/data' ,'TenderController@updatConsultedata');
Route::post('insert/consulting/image' ,'TenderController@InsertConsultingImage');
Route::post('delete/consulting/image' ,'TenderController@DeleteConsultingImage');
Route::post('edit/consulte/part' ,'TenderController@updatePart');




Route::get('AllMyConsrtender' ,'TenderController@AllMyConsrtender');
Route::get('/AllMyTenders' ,'TenderController@AllMyCtender');
Route::get('/letsttenders' ,'TenderController@letsttenders');

Route::get('/AllTenderConsulte' ,'TenderController@AllTenderConsulte')->middleware('consulte');
Route::get('/CountCtender' ,'TenderController@CountCtender');
Route::get('mytenders/ConslTender/{id}' ,'TenderController@ctender');
Route::get('mytenders/eng/ConslTender/{id}' ,'TenderController@CEngtender');
Route::get('mytenders/commentTender/{id}' ,'TenderController@commentctender');
Route::get('mytenders/CountcComment/{id}' ,'TenderController@CountcComment');
Route::get('mytenders/MyofferIsset/{id}' ,'TenderController@MyofferIsset');
Route::get('send' ,'TenderController@send');


Route::get('/mytenders/MyOffer/{id}' ,'OfferController@myoffer');



Route::post('/offer_consulte','OfferController@cons_offer');


Route::post('/confirmTender','OfferController@confirmTender');



Route::get("/redirect/{service}","SocialController@redirct");

Route::get("/callback/{service}","SocialController@redirct");


Route::get('fillable', 'CurdController@getOffers');

Route::get('bussines',function(){
    return view('bussines');
});


Route::post('rigesterBusiness','CurdController@rigesterBusiness')->name('rigesterBusiness');





    Route::group(['prefix' => 'offers'], function () {
    Route::get('create','CurdController@create');

    Route::post('store','CurdController@store') -> name('offers.store');


    Route::get('edit/{offer_id}','CurdController@editOffer');

    Route::post('update/{offer_id}','CurdController@UpdateOffer') -> name('offers.update');
    Route::get('delete/{offer_id}','CurdController@delete') -> name('offers.delete');

    Route::get('all','CurdController@getAllOffer')->name('offers.All');
});



    Route::get('/profile', 'HomeController@profile')->name('profile');
    //Route::resource('userprofile', 'UserprofileController');

    Route::group(['namespace' => 'Auth'], function () {
        Route::get('site','CustomController@site')->name('site');
        Route::get('admin','CustomController@admin')->name('admin')->middleware('auth:admin');
        Route::get('admin/login','CustomController@adminLogin')->name('admin.login');
        Route::post('admin/login','CustomController@checkAdminLogin')->name('save.admin.login');
        });

        Route::group(['namespace' => 'Auth'], function () {

            Route::get('bussinessLogin','CompnayController@bussinessLogin')->name('bussines.login');
            Route::post('bussinessLogin/login','CustomController@checkBussinessLogin')->name('save.bussines.login');
        });






Route::get('test1',function(){
return view('test1');
});



///admin.php


Route::get('CounterOfTenders','AdminController@CounterOfTenders');
Route::get('countAll','AdminController@countAll');
Route::get('admin/detailsTenderConsulte','AdminController@detailsTenderConsulte');
Route::get('admin/detailsTenderOfferVilla','AdminController@villOffer');
Route::get('admin/ConstructionOffer','AdminController@ConstructionOffer');


Route::get('admin/detailsTenderStone','AdminController@detailsTenderStone');
Route::get('admin/detailsTenderHvac','AdminController@detailsTenderHvac');
Route::get('admin/detailsTenderConsr','AdminController@detailsTenderConsr');
Route::get('admin/ConsrTenders/{id}','AdminController@ConsrTender');
Route::get('admin/HvacTenders/{id}','AdminController@HvacTender');
Route::get('admin/StoneTenders/{id}','AdminController@StoneTender');
Route::get('admin/ConslTender/{id}','AdminController@ConslTender');
Route::post('tender/consulte/reject','AdminController@RejectConsulte');
Route::get('admin/accept/{id}','AdminController@acceptTender');
Route::get('admin/consr/accept/{id}','AdminController@accepConsrtTender');
Route::get('admin/hvac/accept/{id}','AdminController@accepHvactTender');
Route::get('admin/stone/accept/{id}','AdminController@accepstonetTender');
Route::post('admin/hvac/reject','AdminController@rejectHvactTender');
Route::get('getAdmins','AdminController@getAdmins');
Route::get('getUsers/{id}','AdminController@getUsers');
Route::get('admin/ads/details/{id}','AdminController@Offerdetails');
Route::post('admin/accept/ads/{id}','AdminController@AcceptAds');
Route::post('admin/reject/ads/','AdminController@RejecttAds');
Route::get('admin/user/profile/{id}','AdminController@profileData');
Route::get('admin/Construction/profile/{id}','AdminController@ConstructionprofileData');
Route::get('admin/consulte/profile/{id}','AdminController@consulteprofileData');
Route::get('admin/hvac/profile/{id}','AdminController@HvacprofileData');
Route::get('admin/stone/profile/{id}','AdminController@stoneprofileData');

Route::get('/AdmingetUnreadNotificatons',"AdminController@getUnreadNotificatons");
Route::get('AdmingetAllNotificatons',"AdminController@getAllNotificatons");
Route::get('AdmingetLastTenNotifications',"AdminController@getLastTenNotifications");
Route::put('AdminNotificatonsMarkAsRead',"AdminController@NotificatonsMarkAsRead");

Route::post('admin/RejectConstructionTender','AdminController@RejectConstructionTender');





////authaccepHvactTenderadmin/accept/ads/



// company Files


Route::get('gatdatacompany','CompnayController@getData');
Route::post('savedatacompany','CompnayController@savedatacompany');
Route::post('savedatauser','userController@savedatauser');
Route::get('countUserTenders','UserController@countUserTenders');
Route::get('counterConsulteTenders','UserController@counterConsulteTenders');



//payment methods

Route::get('getoffers','RequestVillaController@getoffers');
Route::get('getCompanyoffers','RequestVillaController@getCompanyoffers');

Route::get('getoffersclients ','RequestVillaController@getoffersclients');
Route::get('requester/{id}','RequestVillaController@requester');
Route::post('doneornoInVillaReqquester','RequestVillaController@doneornoInVillaReqquester');


Route::get('Companyrequester/{id}','RequestVillaController@Companyrequester');

Route::post('request/villa','RequestVillaController@requestVilla');
Route::post('offer/agree','RequestVillaController@OfferAgree');
Route::get('offer/agree/{id}','RequestVillaController@OfferAgree');

Route::post('conracts/consulting','RequestVillaController@ConractsConsulting');
Route::post('conracts/Construction','RequestVillaController@ConractsConstruction');

Route::post('conracts/stone','RequestVillaController@Conractsstone');
Route::post('conracts/Hvac','RequestVillaController@ConractsHvac');
Route::post('conracts/Interior','RequestVillaController@ConractsInterior');



Route::post('request/flowup','RequestVillaController@requestFlowup');








Route::post('consulting/offer/files','RequestVillaController@FileOffersConsulting');
Route::post('soilFileVilla','RequestVillaController@soilFileVilla');

Route::post('ConvertToTender',"RequestVillaController@ConvertToTender");



Route::get('requesterclients/{id}','RequestVillaController@requesterclients');
Route::post('paymentOffer','RequestVillaController@paymentOffer');

Route::post('click/mobile','RequestVillaController@clicked');


route::post('/sucess',function(){
    return 'success';
});


Route::post('avatar', 'UserController@avatar');


Route::get('request/consulting','RequestTenderController@consulting');
Route::get('request/consultingCompany','RequestTenderController@consultingCompany');
Route::get('request/hvac','RequestTenderController@hvac');
Route::get('request/stone','RequestTenderController@stone');
Route::get('request/constructions','RequestTenderController@constructions');
Route::get('request/constructionsCompany','RequestTenderController@constructionsCompany');
Route::get('request/StoneCompany','RequestTenderController@StoneCompany');
Route::get('request/{type}/{id}','RequestTenderController@requestConstructionsDetails');
Route::post('doneorno','RequestTenderController@doneorno');




Route::post('conracts/tender/Update','RequestTenderController@ConractsUpdateTender');

// Route::get('create/tender/{id}','RequestTenderController@SavedTender');
Route::get('requestCompany/{type}/{id}','RequestTenderController@requestConstructionsDetailsCompany');
Route::post('com_confirm','RequestTenderController@com_confirm');
Route::post('user_confirm','RequestTenderController@user_confirm');
Route::post('user_cancel','RequestTenderController@user_cancel');
Route::post('com_cancel','RequestTenderController@com_cancel');
Route::post('save/tender/title','RequestTenderController@SavedTitleTender');
Route::post('save/tender/notes','RequestTenderController@SavedNotesTender');
Route::post('save/tender/files','RequestTenderController@SaveFilesTender');
Route::post('ConvertToTenderProject',"RequestTenderController@ConvertToTender");





// Review

Route::post('review', 'ReviewController@insert');
Route::post('review_ads', 'ReviewController@insertReviewAds');
Route::post('reviewVilla', 'ReviewController@reviewVilla');



Route::get('getTypeCompanies/{type}',"CompanyController@Company");
Route::get('getTypeCompany/{id}/{type}',"CompanyController@ProfileCompany");
Route::get('AdsOfferCompany/{type}/{id}',"CompanyController@AdsOfferCompany");




// Services Ads

Route::post('service/ads/construction', 'ServicesAdsController@insertAds');
Route::post('service/ads/hvac', 'ServicesAdsController@inserthvacAds');
Route::post('service/ads/stone', 'ServicesAdsController@insertStoneAds');
Route::post('service/ads/interior', 'ServicesAdsController@insertInteriorAds');

Route::get('/service/ads/all', 'ServicesAdsController@MYADSSERVICES');

Route::get('myads/Consruction/{id}', 'ServicesAdsController@MyadsConsruction');
Route::get('myads/Hvac/{id}', 'ServicesAdsController@MyadsHvac');
Route::get('myads/Stone/{id}', 'ServicesAdsController@MyadsStone');
Route::get('myads/interior/{id}', 'ServicesAdsController@Myadsinterior');
Route::post('insert/ads/construction/image', 'ServicesAdsController@InsertConsultingImage');
Route::post('delete/myads/Consruction', 'ServicesAdsController@DeleteConsultingImage');

//
Route::post('logout', 'UserController@logoutUser');


// start chat 

Route::get('/chat', [App\Http\Controllers\ChatsController::class, 'index']);
Route::get('/messages/{request_id}/{type}', [App\Http\Controllers\ChatsController::class, 'fetchMessages']);
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage']);
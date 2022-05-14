<?php

use App\Bookable;
use App\offer_villa_img;
use App\Toffers;
use App\Villa;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Broadcast::routes(['middleware' => ['auth:sanctum']]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});
    Route::post('login','UserController@index');



Route::apiResource('bookables','Api\BookableController')->only('index','show');
//Route::apiResource('Ads','Api\AdsController')->only('index','show');
Route::get('/Ads','Api\AdsController@ads_user');
Route::get('/Ads_mini','Api\AdsController@ads_user_mini');
Route::post('user/ChangePassword','Api\SettingsController@ChangePassword');


Route::get('company/profile','Api\SettingsController@CompanyProfile');

   /* if($request->npassword == $request->cpassword  ){
return "New Password is match With Confirm Password";
    }else{
        return "New Password is not match With Confirm Password";
    }
    */




Route::get('Ads/images/{photoid}', function($photoid)
{
    $photo = offer_villa_img::where('img_villa_id', '=', $photoid)->get()->first();
return $photo;

});


Route::get('ads/details/{id}','Api\AdsController@adsdetails');
Route::get('ads/similir/{Emirates}','Api\AdsController@similir');
Route::get('ads/unique/details','Api\AdsController@uniquedetails');
Route::get('randomOffers','Api\AdsController@randomOffers');
Route::get('ads/showOffer','Api\AdsController@showOffer');
Route::get('ads/showOffeUnique','Api\AdsController@showOffeUnique');
Route::get('ads/justshowOffer','Api\AdsController@justshowOffer');
Route::get('searchoffer/{query}','Api\AdsController@searchoffer');
Route::get('filterOffers/{loaction}/{type}/{bed}','Api\AdsController@filterOffers');
Route::get('justsearchoffer/{query}','Api\AdsController@justsearchoffer');
Route::get('ChoosEmirates/{ChoosEmirates}','Api\AdsController@ChoosEmirates');
Route::post('villa/saved','Api\AdsController@saved');
Route::post('villa/delete','Api\AdsController@saveddelete');
Route::get('saved/villa','Api\AdsController@getSavedVilla');





    Route::get('CountAll/conulte', 'Api\AdsController@countAllConsule');
    Route::get('CountAll/interior', 'Api\AdsController@countAllInterior');
    Route::get('CountAll/Construction/Ads', 'Api\AdsController@countAllAdsConstruction');
    Route::get('CountAll/hvac/Ads', 'Api\AdsController@countAllAdshvac');
    Route::get('CountAll/stone/Ads', 'Api\AdsController@countAllAdsStone');

    Route::get('CountAll/construction', 'Api\AdsController@countAllConstruction');
    Route::get('CountAll/hvac', 'Api\AdsController@countAllcountAllhvac');
    Route::get('CountAll/stone', 'Api\AdsController@countAllcountAllstone');
    Route::get('CountAll/Inerior', 'Api\AdsController@countAllcountAllInerior');




    


Route::post('Ads/new', 'Api\AdsController@store');
Route::post('Ads/NewVillaCoast', 'Api\VillaCoastContoller@store');
//Route::get('Ads/{id}', 'Api\AdsController@delete');






Route::get('bookables/{bookable}/availabilty','Api\BookableAviailabilityController')->name('bookables.availability.show');


<?php

use App\Models\Customer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FreightController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\ShippingPartnerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('herosection',HeroSectionController::class);
Route::apiResource('blog',BlogController::class);
Route::apiResource('service',ServiceController::class);
Route::apiResource('shipping-partner',ShippingPartnerController::class);
Route::apiResource('customer',CustomerController::class);
Route::apiResource('freight',FreightController::class);

Route::get('general-setting',[GeneralSettingController::class,'index']);
Route::post('general-setting',[GeneralSettingController::class,'store']);
Route::get('socialmedia', [SocialMediaController::class, 'index']);
Route::patch('socialmedia/{id}', [SocialMediaController::class, 'update']);
Route::get('about',[AboutController::class,'index']);
Route::post('about',[AboutController::class,'store']);
Route::get('contact',[ContactController::class,'index']);
Route::post('contact',[ContactController::class,'store']);
Route::get('stats',[StatController::class,'index']);
Route::post('stats',[StatController::class,'store']);


Route::post('query',[SiteController::class,'store']);
Route::get('query',[SiteController::class,'index']);

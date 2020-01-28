<?php

use Illuminate\Http\Request;
use App\MuseumPackage;
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

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/user', function (Request $request) {
        $user = $request->user();

        foreach ($user->museums as $museum) {
            $count = 0;
            $myPackage = MuseumPackage::where('museum_id', $museum->id)->orderBy('expiry_date', 'desc')->first();
            $museum->museum_package = $myPackage;
            $museum->museum_package->package;

            foreach ($museum->floors as $floor) {
                foreach ($floor->rooms as $room) {
                    $count += count($room->items);
                }
            }


            $museum->museum_package->item_count = $count;

            unset($museum->floors);
        }
        $user->museum_active = isset($user->museums[0]) ?  $user->museums[0]->id : 0;


        return  $user;
    });

    Route::patch('settings/profile', 'Settings\ProfileController@update');
    Route::patch('settings/password', 'Settings\PasswordController@update');

    Route::resource('museums', 'MuseumController');
    Route::resource('floors', 'FloorController');
    Route::resource('rooms', 'RoomController');
    Route::resource('items', 'ItemController');

    Route::resource('packages', 'PackageController');

    Route::resource('customer/museums', 'CustomerMuseumController');
});

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@register');

    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::post('email/verify/{user}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::post('email/resend', 'Auth\VerificationController@resend');

    Route::post('oauth/{driver}', 'Auth\OAuthController@redirectToProvider');
    Route::get('oauth/{driver}/callback', 'Auth\OAuthController@handleProviderCallback')->name('oauth.callback');
});

Route::post('uploadImage', 'UploadController@uploadImage');
Route::post('uploadFile', 'UploadController@uploadFile');

<?php

use Illuminate\Http\Request;

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
Route::post('register', 'UserController@register')->name('register');

Route::post('user-number', 'UserController@getUserNumberOrRegister');

Route::group(['middleware' => ['auth:api']], function()
{
    Route::get('conversations', 'UserController@getUserConversations');
    Route::post('conversations', 'ConversationController@store');
    Route::get('me', 'UserController@me');

    Route::resources(
        [
            'messages' => 'MessageController',
            'conversation' => 'ConversationController',
            'users' => 'UserController',
        ]
    );
});

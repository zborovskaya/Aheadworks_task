<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route:: get('ticket','Api\TicketController@index');
Route:: get('ticket/{id}','Api\TicketController@ticketById');
Route:: post('ticket','Api\TicketController@ticketSave');
Route:: put('ticket/{id}','Api\TicketController@ticketEdit');
Route:: delete('ticket/{id}','Api\TicketController@ticketDelete');

Route:: post('login','Api\Auth\LoginController@login');

<?php

use App\Http\Controllers\ApiController;
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

Route::post('user_login',[ApiController::class,'user_login']);
Route::get('blog',[ApiController::class,'blog']);
Route::get('video',[ApiController::class,'video']);
Route::get('notification',[ApiController::class,'notification']);
Route::get('profile',[ApiController::class,'profile']);
Route::get('blog_data',[ApiController::class,'blog_data']);


//----------------------emp section---------------------------------------//


Route::post('emp_login',[ApiController::class,'emp_login']);
Route::get('get_grade',[ApiController::class,'get_grade']);
Route::get('get_section',[ApiController::class,'get_section']);
Route::post('get_e_book',[ApiController::class,'get_e_book']);
Route::get('get_student',[ApiController::class,'get_student']);
Route::get('get_issued_prop',[ApiController::class,'get_issued_prop']);
Route::get('get_prop',[ApiController::class,'get_prop']);
Route::get('emp_notification',[ApiController::class,'emp_notification']);
Route::get('emp_profile',[ApiController::class,'emp_profile']);
Route::post('post_attendance',[ApiController::class,'post_attendance']);
Route::post('post_activity',[ApiController::class,'post_activity']);
Route::post('post_assessment',[ApiController::class,'post_assessment']);
Route::post('post_damage_prop',[ApiController::class,'post_damage_prop']);
Route::post('post_leave',[ApiController::class,'post_leave']);
Route::post('get_activity',[ApiController::class,'get_activity']);
Route::get('get_activity_master',[ApiController::class,'get_activity_master']);
Route::get('get_leave',[ApiController::class,'get_leave']);
Route::get('check_in_out',[ApiController::class,'check_in_out']);
Route::post('get_assessment',[ApiController::class,'get_assessment']);
Route::get('get_issueprop_by_emp_code',[ApiController::class,'get_issueprop_by_emp_code']);
Route::get('get_damage_prop',[ApiController::class,'get_damage_prop']);
Route::post('post_need_help',[ApiController::class,'post_need_help']);
Route::get('delete_assessment',[ApiController::class,'delete_assessment']);
Route::get('delete_prop',[ApiController::class,'delete_prop']);
Route::get('delete_damage_prop',[ApiController::class,'delete_damage_prop']);
Route::post('post_reporting',[ApiController::class,'post_reporting']);
Route::get('get_category',[ApiController::class,'get_category']);
Route::get('get_curriculum',[ApiController::class,'get_curriculum']);
Route::get('get_report',[ApiController::class,'get_report']);
Route::get('get_sports_news',[ApiController::class,'get_sports_news']);
Route::get('get_yoga_meditation',[ApiController::class,'get_yoga_meditation']);
Route::get('get_live_class',[ApiController::class,'get_live_class']);
Route::get('get_sports_shop',[ApiController::class,'get_sports_shop']);
Route::get('get_upcoming_event',[ApiController::class,'get_upcoming_event']);
Route::get('get_past_events',[ApiController::class,'get_past_events']);























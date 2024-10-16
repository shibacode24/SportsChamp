<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\masters\All_masterController;
use App\Http\Controllers\masters\SchoolController;
use App\Http\Controllers\masters\EmployeeController;
use App\Http\Controllers\masters\EbookController;
use App\Http\Controllers\masters\BlogController;
use App\Http\Controllers\masters\fitness_mantraController;
use App\Http\Controllers\masters\Grade_CardController;
use App\Http\Controllers\masters\ManagePropController;
use App\Http\Controllers\masters\ManageVideoController;
use App\Http\Controllers\masters\StudentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\masters\Sports_newsController;
use App\Http\Controllers\masters\Yoga_MeditationController;
use App\Http\Controllers\masters\LiveClassController;
use App\Http\Controllers\masters\Sports_ShopController;
use App\Http\Controllers\masters\EventsController;
use App\Http\Controllers\masters\PrincipalController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('privacy','privacy')->name('privacy');

Route::view('dashboard','dashboard')->name('dashboard');
Route::view('tracking','tracking')->name('tracking');
Route::view('user_role','user_role')->name('user_role');
Route::view('report','report')->name('report');
Route::view('time_table','time_table')->name('time_table');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login_submit',[LoginController::class,'check_login'])->name('login_submit');
Route::get('logout',[LoginController::class,'log_out'])->name('logout');
//end of login


Route::group(['middleware'=>'CheckLogin'],function(){

Route::get('all_masters',[All_masterController::class,'index'])->name('index');
Route::post('masters',[All_masterController::class,'city_store'])->name('masters');
Route::post('update_city',[All_masterController::class,'update_city'])->name('update_city');
Route::get('city_destroy/{id}',[All_masterController::class,'city_destroy'])->name('city_destroy');


Route::post('designation_store',[All_masterController::class,'designation_store'])->name('designation_store');
Route::post('update_designation',[All_masterController::class,'update_designation'])->name('update_designation');
Route::get('designation_destroy/{id}',[All_masterController::class,'designation_destroy'])->name('designation_destroy');

Route::post('grade_store',[All_masterController::class,'grade_store'])->name('grade_store');
Route::post('update_grade',[All_masterController::class,'update_grade'])->name('update_grade');
Route::get('grade_destroy/{id}',[All_masterController::class,'grade_destroy'])->name('grade_destroy');

Route::post('section_store',[All_masterController::class,'section_store'])->name('section_store');
Route::post('update_section',[All_masterController::class,'update_section'])->name('update_section');
Route::get('section_destroy/{id}',[All_masterController::class,'section_destroy'])->name('section_destroy');

Route::post('prop_store',[All_masterController::class,'prop_store'])->name('prop_store');
Route::post('update_prop',[All_masterController::class,'update_prop'])->name('update_prop');
Route::get('prop_destroy/{id}',[All_masterController::class,'prop_destroy'])->name('prop_destroy');

Route::post('category_store',[All_masterController::class,'category_store'])->name('category_store');
Route::post('update_category',[All_masterController::class,'update_category'])->name('update_category');
Route::get('category_destroy/{id}',[All_masterController::class,'category_destroy'])->name('category_destroy');

Route::post('curriculum_store',[All_masterController::class,'curriculum_store'])->name('curriculum_store');
Route::post('update_curriculum',[All_masterController::class,'update_curriculum'])->name('update_curriculum');
Route::get('curriculum_destroy/{id}',[All_masterController::class,'curriculum_destroy'])->name('curriculum_destroy');

Route::post('reason_type_store',[All_masterController::class,'reason_type_store'])->name('reason_type_store');
Route::post('update_reason_type',[All_masterController::class,'update_reason_type'])->name('update_reason_type');
Route::get('reason_type_destroy/{id}',[All_masterController::class,'reason_type_destroy'])->name('reason_type_destroy');

Route::post('vendor_store',[All_masterController::class,'vendor_store'])->name('vendor_store');
Route::post('update_vendor',[All_masterController::class,'update_vendor'])->name('update_vendor');
Route::get('vendor_destroy/{id}',[All_masterController::class,'vendor_destroy'])->name('vendor_destroy');

Route::post('test_component_store',[All_masterController::class,'test_component_store'])->name('test_component_store');
Route::post('update_test_component',[All_masterController::class,'update_test_component'])->name('update_test_component');
Route::get('test_component_destroy/{id}',[All_masterController::class,'test_component_destroy'])->name('test_component_destroy');

Route::post('fitness_store',[All_masterController::class,'fitness_store'])->name('fitness_store');
Route::post('update_fitness',[All_masterController::class,'update_fitness'])->name('update_fitness');
Route::get('fitness_destroy/{id}',[All_masterController::class,'fitness_destroy'])->name('fitness_destroy');

Route::post('activity_store',[All_masterController::class,'activity_store'])->name('activity_store');
Route::post('update_activity',[All_masterController::class,'update_activity'])->name('update_activity');
Route::get('activity_destroy/{id}',[All_masterController::class,'activity_destroy'])->name('activity_destroy');

Route::post('skill_store',[All_masterController::class,'skill_store'])->name('skill_store');
Route::post('update_skill',[All_masterController::class,'update_skill'])->name('update_skill');
Route::get('skill_destroy/{id}',[All_masterController::class,'skill_destroy'])->name('skill_destroy');

//end of master

Route::get('school',[SchoolController::class,'index'])->name('school');
Route::post('school_create',[SchoolController::class,'school_store'])->name('school_store');
Route::get('school_edit/{id}',[SchoolController::class,'school_edit'])->name('school_edit');
Route::post('update_school',[SchoolController::class,'update_school'])->name('update_school');
Route::get('school_destroy/{id}',[SchoolController::class,'school_destroy'])->name('school_destroy');

//end of school

Route::get('employee',[EmployeeController::class,'index'])->name('employee');
Route::post('employee_create',[EmployeeController::class,'employee_store'])->name('employee_store');
Route::get('employee_edit/{id}',[EmployeeController::class,'employee_edit'])->name('employee_edit');
Route::post('update_employee',[EmployeeController::class,'update_employee'])->name('update_employee');
Route::get('employee_destroy/{id}',[EmployeeController::class,'employee_destroy'])->name('employee_destroy');

//end of emp

Route::get('principal',[PrincipalController::class,'index'])->name('principal');
Route::post('principal_create',[PrincipalController::class,'principal_store'])->name('principal_store');
Route::get('principal_edit/{id}',[PrincipalController::class,'principal_edit'])->name('principal_edit');
Route::post('update_principal',[PrincipalController::class,'update_principal'])->name('update_principal');
Route::get('principal_destroy/{id}',[PrincipalController::class,'principal_destroy'])->name('principal_destroy');

//end of principal

Route::get('ebook',[EbookController::class,'index'])->name('ebook');
Route::post('ebook_create',[EbookController::class,'ebook_store'])->name('ebook_store');
Route::get('ebook_edit/{id}',[EbookController::class,'ebook_edit'])->name('ebook_edit');
Route::post('update_ebook',[EbookController::class,'update_ebook'])->name('update_ebook');
Route::get('ebook_destroy/{id}',[EbookController::class,'ebook_destroy'])->name('ebook_destroy');
Route::get('get_ebook_list',[EbookController::class,'get_ebook_list'])->name('get_ebook_list');

//end of ebook

Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::post('blog_create',[BlogController::class,'blog_store'])->name('blog_store');
Route::get('blog_edit/{id}',[BlogController::class,'blog_edit'])->name('blog_edit');
Route::post('update_blog',[BlogController::class,'update_blog'])->name('update_blog');
Route::get('blog_destroy/{id}',[BlogController::class,'blog_destroy'])->name('blog_destroy');

//end of blog

Route::get('fitness_mantra',[fitness_mantraController::class,'index'])->name('fitness_mantra');
Route::post('fitness_mantra_create',[fitness_mantraController::class,'fitness_mantra_store'])->name('fitness_mantra_store');
Route::get('fitness_mantra_edit/{id}',[fitness_mantraController::class,'fitness_mantra_edit'])->name('fitness_mantra_edit');
Route::post('update_fitness_mantra',[fitness_mantraController::class,'update_fitness_mantra'])->name('update_fitness_mantra');
Route::get('fitness_mantra_destroy/{id}',[fitness_mantraController::class,'fitness_mantra_destroy'])->name('fitness_mantra_destroy');

//end of fitness mantra

Route::get('grade_card',[Grade_CardController::class,'index'])->name('grade_card');
Route::post('grade_card_create',[Grade_CardController::class,'grade_card_store'])->name('grade_card_store');
Route::get('grade_card_edit/{id}',[Grade_CardController::class,'grade_card_edit'])->name('grade_card_edit');
Route::post('update_grade_card',[Grade_CardController::class,'update_grade_card'])->name('update_grade_card');
Route::get('grade_card_destroy/{id}',[Grade_CardController::class,'grade_card_destroy'])->name('grade_card_destroy');

//end of grade_card


Route::get('manage_prop',[ManagePropController::class,'index'])->name('manage_prop');
Route::post('manage_prop_create',[ManagePropController::class,'manage_prop_store'])->name('manage_prop_store');
Route::get('manage_prop_edit/{id}',[ManagePropController::class,'manage_prop_edit'])->name('manage_prop_edit');
Route::get('delete_added_prop_list/{id}',[ManagePropController::class,'delete_added_prop_list'])->name('delete_added_prop_list');
Route::post('update_manage_prop',[ManagePropController::class,'update_manage_prop'])->name('update_manage_prop');
Route::get('manage_prop_destroy/{id}',[ManagePropController::class,'manage_prop_destroy'])->name('manage_prop_destroy');
Route::get('get_prop_list',[ManagePropController::class,'get_prop_list'])->name('get_prop_list');


//end of manage prop

Route::get('issue_prop',[ManagePropController::class,'index'])->name('issue_prop');
Route::post('issue_prop_create',[ManagePropController::class,'issue_prop_store'])->name('issue_prop_store');
Route::get('issue_prop_edit/{id}',[ManagePropController::class,'issue_prop_edit'])->name('issue_prop_edit');
Route::get('delete_issue_added_prop_list/{id}',[ManagePropController::class,'delete_issue_added_prop_list'])->name('delete_issue_added_prop_list');
Route::post('update_issue_prop',[ManagePropController::class,'update_issue_prop'])->name('update_issue_prop');
Route::get('issue_prop_destroy/{id}',[ManagePropController::class,'issue_prop_destroy'])->name('issue_prop_destroy');
Route::get('get_issue_prop_list',[ManagePropController::class,'get_issue_prop_list'])->name('get_issue_prop_list');


//end of issue prop

Route::get('manage_video',[ManageVideoController::class,'index'])->name('manage_video');
Route::post('manage_video_create',[ManageVideoController::class,'manage_video_store'])->name('manage_video_store');
Route::get('manage_video_edit/{id}',[ManageVideoController::class,'manage_video_edit'])->name('manage_video_edit');
Route::post('update_manage_video',[ManageVideoController::class,'update_manage_video'])->name('update_manage_video');
Route::get('manage_video_destroy/{id}',[ManageVideoController::class,'manage_video_destroy'])->name('manage_video_destroy');

//end of video

Route::get('notification',[NotificationController::class,'index'])->name('notification');
Route::post('notification_create',[NotificationController::class,'notification_store'])->name('notification_store');
Route::get('notification_edit/{id}',[NotificationController::class,'notification_edit'])->name('notification_edit');
Route::post('update_notification',[NotificationController::class,'update_notification'])->name('update_notification');
Route::get('notification_destroy/{id}',[NotificationController::class,'notification_destroy'])->name('notification_destroy');


//end of notification


Route::get('sports_news',[Sports_newsController::class,'index'])->name('sports_news');
Route::post('sports_news_create',[Sports_newsController::class,'sports_news_store'])->name('sports_news_store');
Route::get('sports_news_edit/{id}',[Sports_newsController::class,'sports_news_edit'])->name('sports_news_edit');
Route::post('update_sports_news',[Sports_newsController::class,'update_sports_news'])->name('update_sports_news');
Route::get('sports_news_destroy/{id}',[Sports_newsController::class,'sports_news_destroy'])->name('sports_news_destroy');

//end of sports_news

Route::get('yoga_meditation',[Yoga_MeditationController::class,'index'])->name('yoga_meditation');
Route::post('yoga_meditation_create',[Yoga_MeditationController::class,'yoga_meditation_store'])->name('yoga_meditation_store');
Route::get('yoga_meditation_edit/{id}',[Yoga_MeditationController::class,'yoga_meditation_edit'])->name('yoga_meditation_edit');
Route::post('update_yoga_meditation',[Yoga_MeditationController::class,'update_yoga_meditation'])->name('update_yoga_meditation');
Route::get('yoga_meditation_destroy/{id}',[Yoga_MeditationController::class,'yoga_meditation_destroy'])->name('yoga_meditation_destroy');

//end of yoga & meditation

Route::get('sports_shop',[Sports_ShopController::class,'index'])->name('sports_shop');
Route::post('sports_shop_create',[Sports_ShopController::class,'sports_shop_store'])->name('sports_shop_store');
Route::get('sports_shop_edit/{id}',[Sports_ShopController::class,'sports_shop_edit'])->name('sports_shop_edit');
Route::post('update_sports_shop',[Sports_ShopController::class,'update_sports_shop'])->name('update_sports_shop');
Route::get('sports_shop_destroy/{id}',[Sports_ShopController::class,'sports_shop_destroy'])->name('sports_shop_destroy');

//end of shop

Route::get('live_class',[LiveClassController::class,'index'])->name('live_class');
Route::post('live_class_create',[LiveClassController::class,'live_class_store'])->name('live_class_store');
Route::get('live_class_edit/{id}',[LiveClassController::class,'live_class_edit'])->name('live_class_edit');
Route::post('update_live_class',[LiveClassController::class,'update_live_class'])->name('update_live_class');
Route::get('live_class_destroy/{id}',[LiveClassController::class,'live_class_destroy'])->name('live_class_destroy');

//end of live class

Route::get('event',[EventsController::class,'index'])->name('event');
Route::post('event_create',[EventsController::class,'event_store'])->name('event_store');
Route::get('event_edit/{id}',[EventsController::class,'event_edit'])->name('event_edit');
Route::post('update_event',[EventsController::class,'update_event'])->name('update_event');
Route::get('event_destroy/{id}',[EventsController::class,'event_destroy'])->name('event_destroy');

//end of event

Route::get('student-import',[StudentController::class,'student_import'])->name('student-import');
Route::post('student-excel-import',[StudentController::class,'student_excel_import'])->name('student-excel-import');
Route::get('get_student_list',[StudentController::class,'get_student_list'])->name('get_student_list');
Route::get('delete_student_school_code/{school_code}',[StudentController::class,'delete_student_school_code'])->name('delete_student_school_code');

//end of student

Route::get('time_table',[TimeTableController::class,'index'])->name('time_table');
Route::post('time_table_create',[TimeTableController::class,'time_table_store'])->name('time_table_store');
Route::get('time_table_edit/{id}',[TimeTableController::class,'time_table_edit'])->name('time_table_edit');
Route::post('update_time_table',[TimeTableController::class,'update_time_table'])->name('update_time_table');
Route::get('time_table_destroy/{id}',[TimeTableController::class,'time_table_destroy'])->name('time_table_destroy');
Route::get('get_timetable_list',[TimeTableController::class,'get_timetable_list'])->name('get_timetable_list');
Route::get('time_delete/{id}',[TimeTableController::class,'time_delete'])->name('time_delete');

// end of time table

Route::get('leave',[LeaveController::class,'leave'])->name('leave');
Route::post('update_leave_status',[LeaveController::class,'update_leave_status'])->name('update_leave_status');

Route::get('assessment_report',[ReportController::class,'assessment_report'])->name('assessment_report');
Route::get('get_assessment_data',[ReportController::class,'get_assessment_data'])->name('get_assessment_data');
Route::get('emp_report',[ReportController::class,'emp_report'])->name('emp_report');
Route::get('prop_report',[ReportController::class,'prop_report'])->name('prop_report');
Route::get('student_report',[ReportController::class,'student_report'])->name('student_report');
Route::get('get_student_data',[ReportController::class,'get_student_data'])->name('get_student_data');

});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return redirect()->back();
    //return "All cache cleared!";
});


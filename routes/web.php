<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\ProfileController; 
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SchoolSubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;



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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([      
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

// User Management Routes
 
Route::prefix('users')->group(function(){
    
Route::get('/view',[UserController::class,'UserView'])->name('user.view');
Route::get('/add',[UserController::class,'UserAdd'])->name('user.add');
Route::post('/store',[UserController::class,'UserStore'])->name('user.store');
Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('user.edit');
Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('user.update');
Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('user.delete');
});  


//User profile and Change password

Route::prefix('profile')->group(function(){
    
Route::get('/view',[ProfileController::class,'ProfileView'])->name('profile.view');
Route::get('/edit',[ProfileController::class,'ProfileEdit'])->name('profile.edit');
Route::post('/store',[ProfileController::class,'ProfileStore'])->name('profile.store');
Route::get('/password/view',[ProfileController::class,'PasswordView'])->name('password.view');
Route::post('/password/update',[ProfileController::class,'PasswordUpdate'])->name('password.update');
});  


Route::prefix('setups')->group(function(){

//Student Class routes..    
Route::get('student/class/view',[StudentClassController::class,'ViewStudent'])->name('student.class.view');
Route::get('student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
Route::post('student/class/store',[StudentClassController::class,'StudentClassStore'])->name('store.student.class');
Route::get('student/class/edit/{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.class.edit');
Route::post('student/class/update/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('update.student.class');
Route::get('student/class/delete/{id}',[StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');


//Student Year routes..
Route::get('student/year/view',[StudentYearController::class,'ViewYear'])->name('student.year.view');
Route::get('student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add');
Route::post('student/year/store',[StudentYearController::class,'StudentYearStore'])->name('store.student.year');
Route::get('student/year/edit/{id}',[StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');
Route::post('student/year/update/{id}',[StudentYearController::class,'StudentYearUpdate'])->name('update.student.year');
Route::get('student/year/delete/{id}',[StudentYearController::class,'StudentYearDelete'])->name('student.year.delete');


//Student group routes..
Route::get('student/group/view',[StudentGroupController::class,'ViewGroup'])->name('student.group.view');
Route::get('student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
Route::post('student/group/store',[StudentGroupController::class,'StudentGroupStore'])->name('store.student.group');
Route::get('student/group/edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
Route::post('student/group/update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('update.student.group');
Route::get('student/group/delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');


//Fee Category routes..
Route::get('fee/category/view',[FeeCategoryController::class,'ViewFeeCat'])->name('fee.category.view');
Route::get('fee/category/add',[FeeCategoryController::class,'FeeCatAdd'])->name('fee.category.add');
Route::post('fee/category/store',[FeeCategoryController::class,'FeeCatStore'])->name('store.fee.category');
Route::get('fee/category/edit/{id}',[FeeCategoryController::class,'FeeCatEdit'])->name('fee.category.edit');
Route::post('fee/category/update/{id}',[FeeCategoryController::class,'FeeCategoryUpdate'])->name('update.fee.category');
Route::get('fee/category/delete/{id}',[FeeCategoryController::class,'FeeCategoryDelete'])->name('fee.category.delete');


//Fee Category amount routes..
Route::get('fee/amount/view',[FeeAmountController::class,'ViewFeeAmount'])->name('fee.amount.view');
Route::get('fee/amount/add',[FeeAmountController::class,'AddFeeAmount'])->name('fee.amount.add');
Route::post('fee/amount/store',[FeeAmountController::class,'StoreFeeAmount'])->name('store.fee.amount');
Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'EditFeeAmount'])->name('fee.amount.edit');
Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class,'UpdateFeeAmount'])->name('update.fee.amount');
Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class,'DetailsFeeAmount'])->name('fee.amount.details');



//Exam Type routes..
Route::get('exam/type/view',[ExamTypeController::class,'ViewExamType'])->name('exam.type.view');
Route::get('exam/type/add',[ExamTypeController::class,'ExamTypeAdd'])->name('exam.type.add');
Route::post('exam/type/store',[ExamTypeController::class,'ExamTypeStore'])->name('store.exam.type');
Route::get('exam/type/edit/{id}',[ExamTypeController::class,'ExamTypeEdit'])->name('exam.type.edit');
Route::post('exam/type/update/{id}',[ExamTypeController::class,'ExamTypeUpdate'])->name('update.exam.type');
Route::get('exam/type/delete/{id}',[ExamTypeController::class,'ExamTypeDelete'])->name('exam.type.delete');



//Scool Subject routes..
Route::get('school/subject/view',[SchoolSubjectController::class,'ViewSubject'])->name('school.subject.view');
Route::get('school/subject/add',[SchoolSubjectController::class,'SubjectAdd'])->name('school.subject.add');
Route::post('school/subject/store',[SchoolSubjectController::class,'SubjectStore'])->name('store.school.subject');
Route::get('school/subject/edit/{id}',[SchoolSubjectController::class,'SubjectEdit'])->name('school.subject.edit');
Route::post('school/subject/update/{id}',[SchoolSubjectController::class,'SubjectUpdate'])->name('update.school.subject');
Route::get('school/subject/delete/{id}',[SchoolSubjectController::class,'SubjectDelete'])->name('school.subject.delete');



//Assign Subject routes..
Route::get('assign/subject/view',[AssignSubjectController::class,'ViewAssignSubject'])->name('assign.subject.view');
Route::get('assign/subject/add',[AssignSubjectController::class,'AddAssignSubject'])->name('assign.subject.add');
Route::post('assign/subject/store',[AssignSubjectController::class,'StoreAssignSubject'])->name('store.assign.subject');
Route::get('fee/amount/edit/{fee_category_id}',[FeeAmountController::class,'EditFeeAmount'])->name('fee.amount.edit');
Route::post('fee/amount/update/{fee_category_id}',[FeeAmountController::class,'UpdateFeeAmount'])->name('update.fee.amount');
Route::get('fee/amount/details/{fee_category_id}',[FeeAmountController::class,'DetailsFeeAmount'])->name('fee.amount.details');






});
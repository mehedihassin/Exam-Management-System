<?php

use App\Http\Controllers\AllResultController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamRequestController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPictureController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//dashboard route start

Route::prefix('dashboard')->group(function () {
    Route::get('/', [BackendController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
});
//dashboard route end


//profile picture  route start
Route::middleware('auth')->group(function () {
    Route::post('/store', [UserPictureController::class, 'store'])->name('user_picture_store');
    Route::post('/update', [UserPictureController::class, 'update'])->name('user_picture_update');
    Route::get('/remove', [UserPictureController::class, 'remove'])->name('user_picture_remove');
});
//profile picture route end

//subject route start

Route::prefix('subjects')->middleware('auth')->group(function () {
    Route::get('/index', [SubjectController::class, 'index'])->name('subject_index');
    Route::get('/create', [SubjectController::class, 'create'])->name('subject_create');
    Route::post('/store', [SubjectController::class, 'store'])->name('subject_store');
    Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('subject_delete');
    Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject_edit');
    Route::post('/update/{id}', [SubjectController::class, 'update'])->name('subject_update');
    Route::get('/trash', [SubjectController::class, 'trash'])->name('subject_trash');
    Route::get('/restore/{id}', [SubjectController::class, 'restore'])->name('subject_restore');
    Route::get('/remove/{id}', [SubjectController::class, 'remove'])->name('subject_remove');
    Route::get('/show/{id}', [SubjectController::class, 'show'])->name('subject_show');
});


//subject route end

//topic route start

Route::prefix('topics')->middleware('auth')->group(function () {
    Route::get('/index', [TopicController::class, 'index'])->name('topic_index');
    Route::get('/create', [TopicController::class, 'create'])->name('topic_create');
    Route::post('/store', [TopicController::class, 'store'])->name('topic_store');
    Route::get('/delete/{id}', [TopicController::class, 'delete'])->name('topic_delete');
    Route::get('/edit/{id}', [TopicController::class, 'edit'])->name('topic_edit');
    Route::post('/update/{id}', [TopicController::class, 'update'])->name('topic_update');
    Route::get('/trash', [TopicController::class, 'trash'])->name('topic_trash');
    Route::get('/restore/{id}', [TopicController::class, 'restore'])->name('topic_restore');
    Route::get('/remove/{id}', [TopicController::class, 'remove'])->name('topic_remove');
    Route::get('/show/{id}', [TopicController::class, 'show'])->name('topic_show');
});

//topic route end
//question route start

Route::prefix('questions')->middleware('auth')->group(function () {
    Route::get('/index', [QuestionController::class, 'index'])->name('question_index');
    Route::get('/create', [QuestionController::class, 'create'])->name('question_create');
    Route::post('/store', [QuestionController::class, 'store'])->name('question_store');
    Route::get('/delete/{id}', [QuestionController::class, 'delete'])->name('question_delete');
    Route::get('/edit/{id}', [QuestionController::class, 'edit'])->name('question_edit');
    Route::post('/update/{id}', [QuestionController::class, 'update'])->name('question_update');
    Route::get('/trash', [QuestionController::class, 'trash'])->name('question_trash');
    Route::get('/restore/{id}', [QuestionController::class, 'restore'])->name('question_restore');
    Route::get('/remove/{id}', [QuestionController::class, 'remove'])->name('question_remove');
    Route::get('/show/{id}', [QuestionController::class, 'show'])->name('question_show');
});

//question route end

//exam route start

Route::prefix('exams')->middleware('auth')->group(function () {
    Route::get('/index', [ExamController::class, 'index'])->name('exam_index');
    Route::get('/create', [ExamController::class, 'create'])->name('exam_create');
    Route::post('/store', [ExamController::class, 'store'])->name('exam_store');
    Route::get('/edit/{id}', [ExamController::class, 'edit'])->name('exam_edit');
    Route::post('/update/{id}', [ExamController::class, 'update'])->name('exam_update');
    Route::get('/delete/{id}', [ExamController::class, 'delete'])->name('exam_delete');
    Route::get('/trash', [ExamController::class, 'trash'])->name('exam_trash');
    Route::get('/restore/{id}', [ExamController::class, 'restore'])->name('exam_restore');
    Route::get('/remove/{id}', [ExamController::class, 'remove'])->name('exam_remove');
    Route::get('/active/{id}', [ExamController::class, 'active'])->name('exam_active');
    Route::get('/inactive/{id}', [ExamController::class, 'inactive'])->name('exam_inactive');
    Route::get('/list/{id}', [ExamController::class, 'list'])->name('exam_list');
    Route::get('/start/{id}', [ExamController::class, 'start'])->name('exam_start');
    Route::post('/submit', [ExamController::class, 'submit'])->name('exam_submit');
    Route::get('/answer', [ExamController::class, 'answer'])->name('exam_answer');
});
//exam route end

//exam request route start
Route::prefix('exam/requests')->middleware('auth')->group(function () {
    Route::post('/send/{id}', [ExamRequestController::class, 'request'])->name('exam_send_request');
    Route::get('/index', [ExamRequestController::class, 'index'])->name('exam_request_index');
    Route::get('/edit/{id}', [ExamRequestController::class, 'edit'])->name('exam_request_edit');
    Route::patch('/update/{id}', [ExamRequestController::class, 'update'])->name('exam_request_update');
    Route::get('/show/{id}', [ExamRequestController::class, 'show'])->name('exam_request_show');
    Route::get('/accept/{id}', [ExamRequestController::class, 'accept'])->name('exam_request_accept');
    Route::get('/reject/{id}', [ExamRequestController::class, 'reject'])->name('exam_request_reject');
});
//exam request route end


//role route start
Route::prefix('roles')->middleware('auth')->group(function () {
    Route::get('/index', [RoleController::class, 'index'])->name('role_index');
    Route::get('/create', [RoleController::class, 'create'])->name('role_create');
    Route::post('/store', [RoleController::class, 'store'])->name('role_store');
    // Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role_edit');
    // Route::post('/update/{id}', [RoleController::class, 'update'])->name('role_update');
    // Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('role_delete');
});
//role route end

//user route start
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('user_index');
    Route::get('/create', [UserController::class, 'create'])->name('user_create');
    Route::post('/store', [UserController::class, 'store'])->name('user_store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user_edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('user_update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user_delete');
});
//user route end


//pdf route start
Route::prefix('pdfs')->middleware('auth')->group(function () {
    Route::get('/exam_question_paper', [PdfController::class, 'exam_question_paper_export'])->name('exam_question_paper_pdf');
    Route::get('/result_question_paper/{id}', [PdfController::class, 'result_question_paper_export'])->name('result_question_paper_pdf');
});
// pdf route end


//result route start
Route::prefix('results')->middleware('auth')->group(function () {
    Route::get('/index', [ResultController::class, 'index'])->name('result_index');
    Route::get('/show/{id}', [ResultController::class, 'show'])->name('result_show');
});
//result route end


//All result route
Route::prefix('all_results')->middleware('auth')->group(function () {
    Route::get('/index', [AllResultController::class, 'index'])->name('all_result_index');
    Route::get('/show/{id}', [AllResultController::class, 'show'])->name('all_result_show');
});
//all result route end
require __DIR__ . '/auth.php';

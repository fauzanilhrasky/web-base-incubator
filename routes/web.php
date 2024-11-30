<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PDFController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');





Route::get('/pricing', function () {
    return view('components.pricing');
})->name('pricing');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']); // Pastikan ini ada

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // home user
    Route::get('/home', [HomeController::class, 'index'])->middleware('web')->name('home');

    // home admin
    Route::get('/home-admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('superadmin');
    // home mentor
    Route::get('/home-mentor', [App\Http\Controllers\HomeController::class, 'adminMentor'])->name('admin.mentor')->middleware('superadmin');


    // Course
    Route::get('/course-admin', [CourseController::class, 'index'])->name('course.index');
    Route::get('/create-course-admin', [CourseController::class, 'create'])->name('course.create');
    Route::post('/store-course-admin', [CourseController::class, 'store'])->name('course.store');
    Route::get('/show-course-admin/{course}', [CourseController::class, 'show'])->name('course.show');


    // My course user
    Route::post('/assignments/{assignmentId}/submit', [CourseController::class, 'submitAssignment'])->name('assignments.submit');
    Route::get('/show-course/{course}', [CourseController::class, 'showDetail'])->name('course.showdetail');
    Route::get('/assignments/download/{submission}', [CourseController::class, 'download'])->name('assignments.download');
    Route::put('/assignments/update/{assignment}', [CourseController::class, 'updateAssignment'])->name('assignments.update');

    Route::get('courses/{course}/materials/{material}/assignments/{assignment}/review', [CourseController::class, 'reviewSubmissions'])
        ->name('assignments.reviewSubmissions');

    Route::put('/assignments/{submissionId}/update', [CourseController::class, 'updateSubmission'])->name('assignments.updateSubmission');


    Route::get('/edit-course-admin/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::put('/edit-course-admin/{course}', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

    Route::get('/course/{course}/material/create', [CourseController::class, 'createMaterial'])->name('course.material.create');
    Route::post('/course/{course}/material', [CourseController::class, 'storeMaterial'])->name('course.material.store');
    Route::get('/courses/{course}/material/{material}/edit', [CourseController::class, 'editMaterial'])->name('course.material.edit');
    Route::put('/courses/{course}/material/{material}', [CourseController::class, 'updateMaterial'])->name('course.material.update');
    Route::delete('/courses/{course}/material/{material}', [CourseController::class, 'destroyMaterial'])->name('course.material.destroy');

    Route::get('/show-material/{course}', [CourseController::class, 'showMaterial'])->name('CourseMentor.showmaterial');


    // Assigment
    Route::get('/course/{course}/material/{material}/assignment/create', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::post('/course/{course}/material/{material}/assignment/store', [AssignmentController::class, 'store'])->name('assignment.store');

    // Upload User
    Route::get('/upload-course/{course}/material/{material}/assignment/upload', [AssignmentController::class, 'showUpload'])->name('assignment.upload');
    Route::get('courses/{course}/materials/{material}/assignments/{assignment}/edit', [AssignmentController::class, 'edit'])->name('userSubmit.edit');
    Route::put('courses/{course}/materials/{material}/assignments/{assignment}', [AssignmentController::class, 'update'])->name('userSubmit.update');


    // PDF
    Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('generate.pdf');


    Route::get('/course/{course}/material/{material}/assignment/detail-upload', [AssignmentController::class, 'detailUpload'])
        ->name('assignment.detailUpload');


    // user
    Route::get('/detail-course/{course}', [CourseController::class, 'detail'])->name('course.detail');
    Route::get('/assignment/{id}/add', [CourseController::class, 'addSubmissions'])->name('assignments.add');
    Route::get('/assessment-user', [AssignmentController::class, 'assessment'])->name('assessment.user');


    // Mentor
    Route::get('/mentor', [CourseController::class, 'homeMaterial'])->name('mentor');

    // Payment
    Route::get('/course/{id}/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::post('/course/{id}/payment', [PaymentController::class, 'createPayment'])->name('course.payment');
    Route::post('/course/{id}/status', [PaymentController::class, 'updatePaymentStatus'])->name('payment.status');
    Route::post('/payment/{paymentId}/confirm', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');
    Route::get('/payment/{paymentId}/detail_confirm', [PaymentController::class, 'showConfirmDetails'])->name('payment.details');
    Route::get('/payment/pending', [PaymentController::class, 'pendingPayment'])->name('payment.pending');
    Route::get('my-courses', [PaymentController::class, 'myCourses'])->name('my.courses');
    Route::post('/enroll/{courseId}', [CourseController::class, 'enroll'])->name('course.enroll');

    // profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');

    // hak akses
    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
});

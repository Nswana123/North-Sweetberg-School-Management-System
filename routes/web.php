<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\user_group;
use App\Models\permissions;
use App\Models\role_permissions;
use App\Models\User;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StudentCourseController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\LectureClassController;
use App\Http\Controllers\AdmissionController;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
})->name('welcome');

Route::get('/dashboard', function () {
    $user = auth()->user();
    $permissions = $user->user_group->permissions;

    return view('dashboard', compact(
        'permissions',
  
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::post('/update-cart', [CheckoutController::class, 'updateCart']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //user groups
    Route::get('/setting', [SettingsController::class, 'userGroup'])->name('settings.usergroup');
    Route::post('/settings.create-usergroup', [SettingsController::class, 'createUserGroups'])->name('create-usergroup');
    Route::delete('/user-group/{id}', [SettingsController::class, 'DeleteUserGroup'])->name('delete-usergroup');
    Route::get('/settings.user-group/{id}', [SettingsController::class, 'editUserGroup'])->name('settings.editUsergroup');
    Route::put('/user-group/{id}/update', [SettingsController::class, 'updateUserGroup'])->name('settings.update');
    //permissions
    Route::get('/settings', [SettingsController::class, 'userRole'])->name('settings.userRole');
    Route::post('/settings.create-userRole', [SettingsController::class, 'createUserRole'])->name('create-userRole');
    Route::delete('/user-role/{id}', [SettingsController::class, 'DeleteUserRole'])->name('delete-userrole');
    Route::get('/settings.user-role/{id}', [SettingsController::class, 'editUserRole'])->name('settings.editUserRole');
    Route::put('/user-role/{id}/update', [SettingsController::class, 'updateUserRole'])->name('settings.updateRole');
    // User Management

    Route::get('/settings.users', [SettingsController::class, 'user'])->name('settings.user');
    Route::get('/settings.userlist', [SettingsController::class, 'userlist'])->name('settings.userlist');
    Route::post('/settings.create-user', [SettingsController::class, 'createUser'])->name('create-user');
    Route::get('/settings.user/{id}', [SettingsController::class, 'editUser'])->name('settings.editUser');
    Route::post('/users/{id}/update', [SettingsController::class, 'updateUser'])->name('setting.update');
    Route::patch('/settings/{id}/deactivate', [SettingsController::class, 'deactivate'])->name('deactivateUser');
    Route::patch('/settings/{id}/activate', [SettingsController::class, 'activate'])->name('activateUser');
    // System settings
    Route::get('/settings.systemSettings', [SettingsController::class, 'systemSettings'])->name('settings.systemSettings');
    Route::get('/settings.Settings', [SettingsController::class, 'Settings'])->name('settings.Settings');
    Route::post('/settings.create-settings', [SettingsController::class, 'createSettings'])->name('create-settings');
    Route::delete('/system-settings/{id}', [SettingsController::class, 'DeleteSettings'])->name('delete-settings');
    Route::post('/save-role-permissions', [SettingsController::class, 'store'])->name('saveRolePermissions');

        Route::resource('campuses', CampusController::class);
        Route::resource('schools', SchoolController::class);
        Route::delete('campuses/{campus}/programs/{program}', [CampusController::class, 'detach'])
    ->name('campuses.programs.detach');
    Route::resource('departments', DepartmentController::class);

    // routes/web.php
Route::resource('programs', ProgramController::class);
Route::delete('/programs/{program_id}/courses/{course_id}', [ProgramController::class, 'detachCourse'])->name('course-program.detach');
Route::post('/programs/{program}/assign-courses', [ProgramController::class, 'assignCourses'])->name('programs.assignCourses');


Route::resource('courses', CourseController::class);
Route::resource('fees', FeeController::class);
Route::resource('students', StudentController::class);

Route::get('/studentspaymentssummary', [StudentController::class, 'allPayments'])->name('students.paymentStatement');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::get('/payments/{student}', [PaymentController::class, 'transactions'])->name('payments.transactions');
Route::get('/mystatement', [PaymentController::class, 'studentStatement'])->name('payments.student_statement');
Route::get('/register_courses', [StudentCourseController::class, 'showCourseRegistrationForm'])->name('students.register_courses');
Route::post('/registerCourses', [StudentCourseController::class, 'registerCourses'])->name('students.registerCourses');
 Route::get('/registered-students', [AdminCourseController::class, 'registeredStudentsByYear'])->name('students.registered_students_by_year');

     Route::get('/caenter', [ResultsController::class, 'showEnterCAForm'])->name('results.enterCAs');
    Route::post('/casave', [ResultsController::class, 'storeCA'])->name('results.saveCAs');
    Route::get('/caview', [ResultsController::class, 'viewCAMarks'])->name('results.viewCAs');

    // Exam
    Route::get('/examenter', [ResultsController::class, 'showEnterExamForm'])->name('results.enterExam');
    Route::post('/examsave', [ResultsController::class, 'storeExam'])->name('results.saveExam');
    Route::get('/examview', [ResultsController::class, 'viewExamMarks'])->name('results.viewExam');
    Route::get('/resultsfinal', [ResultsController::class, 'viewFinalResults'])->name('results.viewfinal');
    Route::get('/finalstudent/{student}', [ResultsController::class, 'showStudentFinalResults'])->name('results.viewstudentResults');

    Route::post('/caUpload', [ResultsController::class, 'uploadCA'])->name('results.uploadCAPost');
    Route::post('/examUpload', [ResultsController::class, 'uploadExam'])->name('results.uploadExamPost');

        Route::get('results/ca', [ResultsController::class, 'viewCA'])->name('students.resultsCa');
    Route::get('results/final', [ResultsController::class, 'viewFinal'])->name('students.resultsFinal');

        Route::get('/student-exam-slip', [App\Http\Controllers\ResultsController::class, 'SlipView'])->name('students.examSlip');
    Route::get('/student-exam-slip/pdf', [App\Http\Controllers\ResultsController::class, 'SlipexportPdf'])->name('students.pdfexamSlip.pdf');

Route::get('/results/final/pdf/{student}', [ResultsController::class, 'exportFinalResultsPdf'])->name('results.final.pdf');

Route::get('/student/profile', [StudentController::class, 'profile'])->name('students.studentProfile');

Route::get('/students/create', [StudentController::class, 'createStudent'])->name('students.createStudent');
Route::post('/students', [StudentController::class, 'storeStudent'])->name('students.storeStudent');
Route::get('/createPayment', [PaymentController::class, 'createPayment'])->name('students.createPayment');
Route::post('/students/save-payment', [PaymentController::class, 'storePayment'])->name('students.storePayment');
Route::get('/viewPayments', [PaymentController::class, 'viewPayments'])->name('payments.viewPayments');

// lecture functions
    Route::get('classes', [LectureClassController::class, 'index'])->name('classes.index');
    Route::get('classes/create', [LectureClassController::class, 'create'])->name('classes.create');
    Route::post('classes', [LectureClassController::class, 'store'])->name('classes.store');
    Route::get('classes-manage/{class}', [LectureClassController::class, 'manage'])->name('classes.manage');

    // Notes
    Route::post('classes/{class}/notes', [LectureClassController::class, 'uploadNote'])->name('classes.notes.upload');

    // Messages
    Route::post('classes/{class}/message', [LectureClassController::class, 'sendMessage'])->name('classes.message.send');

    // Media
    Route::post('classes/{class}/media', [LectureClassController::class, 'sendMedia'])->name('classes.media.send');

    // Assignments
    Route::post('classes/{class}/assignment', [LectureClassController::class, 'createAssignment'])->name('classes.assignment.create');

    // Tests
    Route::post('classes/{class}/test', [LectureClassController::class, 'createTest'])->name('classes.test.create');

// enrollmetn
Route::get('/admissions', [EnrollmentController::class, 'PendingEnrollment'])->name('enrollment.PendingEnrollment');
Route::get('/admissions/{id}', [EnrollmentController::class, 'showPendingEnrollment'])->name('enrollment.showPendingEnrollment');
Route::post('/admissions/{id}/approve', [EnrollmentController::class, 'approve'])->name('enrollment.approve');
Route::post('/admissions/{id}/reject', [EnrollmentController::class, 'reject'])->name('enrollment.reject');

Route::get('/approvedadmissions', [EnrollmentController::class, 'approvedEnrollment'])->name('enrollment.approvedEnrollment');
Route::get('/rejectedadmissions', [EnrollmentController::class, 'rejectedEnrollment'])->name('enrollment.rejectedEnrollment');

Route::get('/showapprovedadmission/{id}', [EnrollmentController::class, 'showApprovedEnrollment'])->name('enrollment.showApprovedEnrollment');
Route::get('/showRejectedadmission/{id}', [EnrollmentController::class, 'showRejectedEnrollment'])->name('enrollment.showRejectedEnrollment');

});
 Route::get('/enrollment.applynow', [EnrollmentController::class, 'index'])->name('enrollment.applynow');
 Route::get('/get-programs', [EnrollmentController::class, 'getPrograms']);
 Route::post('/admissionSumbit', [AdmissionController::class, 'store'])->name('admission.submit');

require __DIR__.'/auth.php';

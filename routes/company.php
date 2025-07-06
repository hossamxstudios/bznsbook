<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthCompany\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\ATSCompanyControllers\CandidateController;
use App\Http\Controllers\ATSCompanyControllers\JobController;
use App\Http\Controllers\ATSCompanyControllers\InterviewController;
use App\Http\Controllers\ATSCompanyControllers\MemberController;

// Route::middleware('guest')->group(function () {
//     Route::get('/admin/login'        , [AuthenticatedSessionController::class, 'create'])->name('admin.login');
//     Route::post('/admin/login'       , [AuthenticatedSessionController::class, 'store']);
    Route::get('/member/register'     , [RegisteredUserController::class, 'create'])->name('member.register');
    Route::post('/member/register'    , [RegisteredUserController::class, 'store']);
//     Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
//     Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
//     Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
//     Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
// });

// Route::middleware('auth:web')->group(function ()      {
//     Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
// });

Route::middleware('auth:member')->group(function ()      {
    Route::post('/company/logout'                     , [AuthenticatedSessionController::class,       'destroy'])->name('member.logout');
    Route::get ('/company'                            , [PageController::class,                  'companyIndex'])->name('member');

    Route::prefix('company/candidates')->group(function () {
        Route::get('/',                                 [CandidateController::class,                    'index'])->name('company.candidates.index');
        Route::post('/',                                [CandidateController::class,                    'store'])->name('company.candidates.store');
        Route::post('/delete/{id}',                     [CandidateController::class,                  'destroy'])->name('company.candidates.destroy');
        Route::post('/skill',                           [CandidateController::class,              'attachSkill'])->name('company.skill.attach');
        Route::post('/tag',                             [CandidateController::class,                'attachTag'])->name('company.tag.attach');
        Route::post('/note',                            [CandidateController::class,               'attachNote'])->name('company.note.attach');
        Route::post('/attachment',                      [CandidateController::class,         'attachAttachment'])->name('company.attachment.attach');
        Route::post('/experience',                      [CandidateController::class,            'addExperience'])->name('company.experience.attach');
        Route::post('/cv',                              [CandidateController::class,                    'addCv'])->name('company.cv.upload');
        Route::post('/apply-a-job',                     [CandidateController::class,              'applyForJob'])->name('company.job.apply');
    });

    Route::prefix('company/members')->group(function () {
        Route::get('/',                                 [MemberController::class,                   'index'])->name('company.members.index');
        Route::post('/',                                [MemberController::class,                   'store'])->name('company.members.store');
        Route::post('/accept',                          [MemberController::class,                  'accept'])->name('company.members.accept');
        Route::post('/reject',                          [MemberController::class,                  'reject'])->name('company.members.reject');
        Route::post('/convert',                         [MemberController::class,        'postRequestAsJob'])->name('company.members.convert');
    });

    Route::prefix('company/jobs')->group(function () {
        Route::get('/',                                 [JobController::class,                          'index'])->name('company.jobs.index');
        Route::get('/show/{id}',                        [JobController::class,                         'single'])->name('company.jobs.single');
        Route::post('/',                                [JobController::class,                          'store'])->name('company.jobs.store');
        Route::post('/delete',                          [JobController::class,                         'delete'])->name('company.jobs.delete');
        Route::post('/accept',                          [JobController::class,                         'accept'])->name('company.jobs.accept');
        Route::post('/reject',                          [JobController::class,                         'reject'])->name('company.jobs.reject');
        Route::post('/tag',                             [JobController::class,                      'attachTag'])->name('company.jobs.tag.attach');
        Route::post('/note',                            [JobController::class,                     'attachNote'])->name('company.jobs.note.attach');
        Route::post('/attachment',                      [JobController::class,               'attachAttachment'])->name('company.jobs.attachment.attach');
        Route::post('/batch',                           [JobController::class,                       'addBatch'])->name('company.jobs.batch.store');
        Route::post('/push-to-batch',                   [JobController::class,                    'pushToBatch'])->name('company.jobs.batch.push');
        Route::post('/delete-from-batch',               [JobController::class,                    'deleteBatch'])->name('company.jobs.batch.delete');
        Route::post('/delete-application',              [JobController::class,              'deleteApplication'])->name('company.jobs.application.delete');
    });
    Route::get('/api/applications/{pipeline}/stages',   [JobController::class,                      'getStages']);
    Route::get('/api/job-application/update-stage',     [JobController::class,                    'updateStage'])->name('company.job.updateStage');

    Route::prefix('company/interviews')->group(function () {
        Route::get('/',                                 [InterviewController::class,                    'index'])->name('company.interviews.index');
        Route::post('/',                                [InterviewController::class,                    'store'])->name('company.interviews.store');
        Route::post('/update',                          [InterviewController::class,                   'update'])->name('company.interviews.update');
        Route::post('/delete',                          [InterviewController::class,                   'delete'])->name('company.interviews.destroy');
        Route::post('/note',                            [InterviewController::class,               'attachNote'])->name('company.interviews.note.attach');
        Route::post('/attachment',                      [InterviewController::class,         'attachAttachment'])->name('company.interviews.attachment.attach');
    });
    Route::get('/api/company/careers/{id}',             [InterviewController::class,                 'getCareersByCompanyId']);

});




require __DIR__.'/auth.php';

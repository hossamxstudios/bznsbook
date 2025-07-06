<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesAndPermissionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CRMControllers\CompanyController;
use App\Http\Controllers\CRMControllers\ContactController;
use App\Http\Controllers\CRMControllers\DealController;
use App\Http\Controllers\CRMControllers\StageController;
use App\Http\Controllers\CRMControllers\LeadController;
use App\Http\Controllers\CRMControllers\PipelineController;
use App\Http\Controllers\CRMControllers\IndustryController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\CRMControllers\LogController;
use App\Http\Controllers\CRMControllers\NoteController;
use App\Http\Controllers\ATSControllers\CandidateController;
use App\Http\Controllers\ATSControllers\JobRequestController;
use App\Http\Controllers\ATSControllers\JobController;
use App\Http\Controllers\ATSControllers\PipelineController as ATS_PipelineController;
use App\Http\Controllers\ATSControllers\TagController;
use App\Http\Controllers\ATSControllers\InterviewController;
use App\Http\Controllers\ATSControllers\JobOfferController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;

Route::get ('/lead-form'                           , [PageController::class              ,      'leadForm'])->name('admin.leadForm');
Route::post('/lead-form/apply'                     , [PageController::class              , 'applyLeadForm'])->name('admin.leadForm.apply');
Route::get ('/careers'                             , [PageController::class              ,    'careerPage'])->name('admin.career');
Route::get ('/careers/single/{id}'                 , [PageController::class              ,  'careerSingle'])->name('admin.career.show');
Route::post('/careers/apply'                       , [PageController::class              ,   'careerApply'])->name('admin.career.apply');
Route::post('/application/store'                   , [PageController::class              , 'applicationStore'])->name('admin.application.store');

// Route::middleware('guest')->group(function () {
    Route::get('/login'                           , [AuthenticatedSessionController::class ,'create'])->name('admin.login');
    Route::post('/login'                          , [AuthenticatedSessionController::class , 'store']);
    Route::get('/admin/register'                  , [RegisteredUserController::class       ,'create'])->name('admin.register');
    Route::post('/admin/register'                 , [RegisteredUserController::class       , 'store']);

    Route::get('forgot-password'                 , [PasswordResetLinkController::class    , 'create'])->name('password.request');
    Route::post('forgot-password'                , [PasswordResetLinkController::class    ,  'store'])->name('password.email');
    Route::get('reset-password/{token}'          , [NewPasswordController::class          , 'create'])->name('password.reset');
    Route::post('reset-password'                 , [NewPasswordController::class          ,  'store'])->name('password.store');
// });

// Route::middleware('auth:web')->group(function ()      {
//     Route::get('verify-email', EmailVerificationPromptController::class)->name('verification.notice');
//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
// });


Route::middleware('auth:web')->group(function ()      {
    Route::post('/admin/logout'                       , [AuthenticatedSessionController::class, 'destroy'])->name('admin.logout');
    Route::get ('/admin'                              , [PageController::class             , 'adminIndex'])->name('admin.home');
    Route::get ('/admin/ats'                          , [PageController::class               , 'atsIndex'])->name('ats.home');

    Route::prefix('admin/industries')->group(function () {
        Route::get('/',                                 [IndustryController::class,          'index']  )->name('industries.index'); // List all industries
        Route::post('/',                                [IndustryController::class,          'store']  )->name('industries.store'); // Create a new industry
        Route::post('/update/{id}',                     [IndustryController::class,          'update'] )->name('industries.update'); // Update an existing industry
        Route::post('/delete/{id}',                     [IndustryController::class,          'destroy'])->name('industries.destroy'); // Delete an industry
    });

    Route::prefix('admin/companies')->group(function () {
        Route::post('/{id}/services',                   [CompanyController::class,      'updateServices'])->name('company.services.update');
        Route::post('/delete/all',                      [CompanyController::class,          'deleteAll'] )->name('companies.deleteAll'); // List all leads
        Route::get('/',                                 [CompanyController::class,          'index']     )->name('companies.index'); // List all companies
        Route::post('/',                                [CompanyController::class,          'store']     )->name('companies.store'); // Create a new company
        Route::post('/update/{id}',                     [CompanyController::class,          'update']    )->name('companies.update'); // Update an existing company
        Route::post('/delete/{id}',                     [CompanyController::class,          'destroy']   )->name('companies.destroy'); // Delete a company
        Route::get('/trashed',                          [CompanyController::class,          'trashed']   )->name('companies.trashed'); // List soft-deleted companies
        Route::post('/restore/{id}',                    [CompanyController::class,          'restore']   )->name('companies.restore'); // Restore a soft-deleted company
        Route::get('/search',                           [CompanyController::class,          'search']    )->name('companies.search'); // Search companies
        Route::post('/bulkImport',                      [CompanyController::class,          'bulkImport'])->name('companies.bulkImport'); // List all leads
    });

    Route::prefix('admin/contacts')->group(function () {
        Route::post('/delete/all',                      [ContactController::class,          'deleteAll']        )->name('contacts.deleteAll'); // List all leads
        Route::get('/',                                 [ContactController::class,          'index']            )->name('contacts.index'); // List all contacts
        Route::post('/',                                [ContactController::class,          'store']            )->name('contacts.store'); // Create a new contact
        Route::post('/update/{id}',                     [ContactController::class,          'update']           )->name('contacts.update'); // Update an existing contact
        Route::post('/delete/{id}',                     [ContactController::class,          'destroy']          )->name('contacts.destroy'); // Soft-delete a contact
        Route::post('/{id}/assign/company',             [ContactController::class,          'assignCompany']    )->name('contacts.assignCompany');
        Route::post('/bulkImport',                      [ContactController::class,          'bulkImport']       )->name('contacts.bulkImport'); // List all leads
        Route::get('/trashed',                          [ContactController::class,          'trashed']          )->name('contacts.trashed'); // List soft-deleted contacts
        Route::get('/{id}',                             [ContactController::class,          'show']             )->name('contacts.show'); // Show a single contact
        Route::post('/restore/{id}',                    [ContactController::class,          'restore']          )->name('contacts.restore'); // Restore a soft-deleted contact

    });
    Route::get('/api/compaiens/{company}/contacts',     [ContactController::class, 'getContacts']);

    Route::prefix('admin/leads')->group(function () {
        Route::get('/',                                 [LeadController::class,             'index']            )->name('leads.index'); // List all leads
        Route::post('/',                                [LeadController::class,             'store']            )->name('leads.store'); // Create a new lead
        Route::post('/update/{id}',                     [LeadController::class,             'update']           )->name('leads.update'); // Update an existing lead
        Route::post('/delete/{id}',                     [LeadController::class,             'destroy']          )->name('leads.destroy'); // Delete a lead
        Route::post('/{id}/assign/company',             [LeadController::class,             'assignCompany']    )->name('leads.assignCompany');
        Route::post('/{id}/assign/contact',             [LeadController::class,             'assignContact']    )->name('leads.assignContact');
        Route::get('/{id}',                             [LeadController::class,             'show']             )->name('leads.show'); // Show a single lead
    });
    Route::get('/api/pipelines/{pipeline}/stages',  [LeadController::class, 'getStages']);

    Route::prefix('admin/deals')->group(function () {
        Route::get('/',                                 [DealController::class,             'index']            )->name('deals.index'); // List all deals
        Route::post('/',                                [DealController::class,             'store']            )->name('deals.store'); // Create a new deal
        Route::post('/update/{id}',                     [DealController::class,             'update']           )->name('deals.update'); // Update an existing deal
        Route::post('/delete/{id}',                     [DealController::class,             'destroy']          )->name('deals.destroy'); // Soft-delete a deal
        Route::post('/{deal}/assign/company',           [DealController::class,             'assignCompany']    )->name('deals.assignCompany');
        Route::post('/{deal}/assign/contact',           [DealController::class,             'assignContact']    )->name('deals.assignContact');
        Route::get('/markaspaid/{id}',                  [DealController::class,             'markAsPaid']       )->name('deals.markaspaid'); // List all deals
        Route::get('/trashed',                          [DealController::class,             'trashed']          )->name('deals.trashed'); // List soft-deleted deals
        Route::get('/{id?}',                            [DealController::class,             'show']             )->name('deals.show'); // Show a single deal
        Route::post('/restore/{id}',                    [DealController::class,             'restore']          )->name('deals.restore'); // Restore a soft-deleted deal
    });
    Route::get('/apiss/deals/{pipeline}/stages',          [DealController::class, 'getStages']);
    Route::get('/api/companies/{companyId}/contacts',   [DealController::class, 'getContacts']);
    Route::get('/deals/update-stage',                   [DealController::class, 'updateStage'])->name('deals.updateStage');

    Route::prefix('admin/pipelines')->group(function () {
        Route::get('/',                                 [PipelineController::class,         'index']            )->name('pipelines.index'); // List all pipelines
        Route::get('/{id}',                             [PipelineController::class,         'show']             )->name('pipelines.show'); // Show a single pipeline
        Route::post('/',                                [PipelineController::class,         'store']            )->name('pipelines.store'); // Create a new pipeline
        Route::post('/update/{id}',                     [PipelineController::class,         'update']           )->name('pipelines.update'); // Update an existing pipeline
        Route::post('/delete/{id}',                     [PipelineController::class,         'destroy']          )->name('pipelines.destroy'); // Delete a pipeline
    });
    Route::get('/api/pipelines/{pipelineId}/stages', [PipelineController::class, 'getStages']);

    Route::prefix('admin/stages')->group(function () {
        Route::get('/',                                 [StageController::class,            'index']            )->name('stages.index'); // List all stages
        Route::post('/',                                [StageController::class,            'store']            )->name('stages.store'); // Create a new stage
        Route::post('/update/{id}',                     [StageController::class,            'update']           )->name('stages.update'); // Update an existing stage
        Route::post('/delete/{id}',                     [StageController::class,            'destroy']          )->name('stages.destroy'); // Delete a stage
        Route::get('/{id}',                             [StageController::class,            'show']             )->name('stages.show'); // Show a single stage
    });

    Route::prefix('logs')->group(function () {
        Route::get('/',                                 [LogController::class,            'index']            )->name('logs.index'); // List all logs
        Route::get('/{id}',                             [LogController::class,            'show']             )->name('logs.show'); // Show a single log
        Route::post('/',                                [LogController::class,            'store']            )->name('logs.store'); // Create a new log
    });

    Route::prefix('notes')->group(function () {
        Route::get('/',                                 [NoteController::class,            'index']            )->name('notes.index'); // List all notes
        Route::get('/{id}',                             [NoteController::class,            'show']             )->name('notes.show'); // Show a single note
        Route::post('/',                                [NoteController::class,            'store']            )->name('notes.store'); // Create a new note
    });

    Route::prefix('admin/roles')->group(function () {
        Route::get('/',                                 [RolesAndPermissionController::class,            'index']            )->name('roles.index'); // List all roles
        Route::get('/add/roles',                        [RolesAndPermissionController::class,            'add']              )->name('roles.add'); // add_new roles
        Route::get('/edit/{id}',                        [RolesAndPermissionController::class,            'edit']             )->name('roles.update_view');
        Route::post('/',                                [RolesAndPermissionController::class,            'store']            )->name('roles.store'); // Create a new roles
        Route::post('/update/{id}',                     [RolesAndPermissionController::class,            'update']           )->name('roles.update'); // update_an existing role
        Route::post('/delete/{id}',                     [RolesAndPermissionController::class,            'destroy']          )->name('roles.destroy'); // delete_a role
    });

    Route::prefix('admin/users')->group(function () {
        Route::get('/',                                 [UserController::class,                          'index']            )->name('users.index'); // List all users
        Route::post('/',                                [UserController::class,                          'add']              )->name('users.store'); // Create a new roles
        Route::post('/delete',                          [UserController::class,                          'destroy']          )->name('users.destroy'); // delete a user
        Route::post('/change/role/{id}',                [UserController::class,                          'assignRoles']      )->name('users.changeRole'); // update_or Set an existing user's role
    });

    // Route::get('/admin/roles/addpermissons', [RolesAndPermissionController::class, 'addPermissions'])->name('admin.addPermission');
    Route::prefix('admin/sections')->group(function () {
        Route::get('/',                                 [SectionController::class,          'index']  )->name('sections.index'); // List all industries
        Route::post('/',                                [SectionController::class,          'store']  )->name('sections.store'); // Create a new industry
        Route::post('/update/{id}',                     [SectionController::class,          'update'] )->name('sections.update'); // Update an existing industry
        Route::post('/delete/{id}',                     [SectionController::class,          'destroy'])->name('sections.destroy'); // Delete an industry
    });

    Route::prefix('admin/categories')->group(function () {
        Route::get('/',                                 [CategoryController::class,          'index']  )->name('categories.index'); // List all categories
        Route::post('/',                                [CategoryController::class,          'store']  )->name('categories.store'); // Create a new category
        Route::post('/update/{id}',                     [CategoryController::class,          'update'] )->name('categories.update'); // Update an existing category
        Route::post('/delete/{id}',                     [CategoryController::class,          'destroy'])->name('categories.destroy'); // Delete a category
    });

    Route::prefix('admin/subcategories')->group(function () {
        Route::get('/',                                 [SubcategoryController::class,          'index']  )->name('subcategories.index'); // List all subcategories
        Route::post('/',                                [SubcategoryController::class,          'store']  )->name('subcategories.store'); // Create a new subcategory
        Route::post('/update/{id}',                     [SubcategoryController::class,          'update'] )->name('subcategories.update'); // Update an existing subcategory
        Route::post('/delete/{id}',                     [SubcategoryController::class,          'destroy'])->name('subcategories.destroy'); // Delete a subcategory
    });

    Route::prefix('admin/topics')->group(function () {
        Route::get('/',                                 [TopicController::class,             'index'])->name('topics.index');
        Route::post('/',                                [TopicController::class,             'store'])->name('topics.store');
        Route::post('/update/{id}',                     [TopicController::class,             'update'])->name('topics.update');
        Route::post('/delete/{id}',                     [TopicController::class,             'destroy'])->name('topics.destroy');
    });

    Route::prefix('admin/blogs')->group(function () {
        Route::get('/',                                 [BlogController::class,              'index'])->name('blogs.index');
        Route::post('/',                                [BlogController::class,              'store'])->name('blogs.store');
        Route::post('/update/{id}',                     [BlogController::class,              'update'])->name('blogs.update');
        Route::post('/delete/{id}',                     [BlogController::class,              'destroy'])->name('blogs.destroy');
    });

    Route::prefix('admin/clients')->group(function () {
        Route::get('/',                                 [ClientController::class,           'index'])->name('clients.index'); // List all companies
        Route::post('/',                                [ClientController::class,           'store'])->name('clients.store'); // Create a new company
        Route::post('/delete/all',                      [ClientController::class,       'deleteAll'])->name('clients.deleteAll'); // List all leads
        Route::post('/update/{id}',                     [ClientController::class,          'update'])->name('clients.update'); // Update an existing company
        Route::post('/delete/{id}',                     [ClientController::class,         'destroy'])->name('clients.destroy'); // Delete a company
        Route::get('/trashed',                          [ClientController::class,         'trashed'])->name('clients.trashed'); // List soft-deleted companies
        Route::post('/restore/{id}',                    [ClientController::class,         'restore'])->name('clients.restore'); // Restore a soft-deleted company
        Route::get('/search',                           [ClientController::class,          'search'])->name('clients.search'); // Search companies
        Route::post('/bulkImport',                      [ClientController::class,      'bulkImport'])->name('clients.bulkImport'); // List all leads
    });
    
    Route::prefix('admin/subscriptions')->group(function () {
        Route::get('/',                                 [SubscriptionController::class, 'index'])->name('admin.subscriptions.index'); // Subscriptions dashboard
        Route::get('/active',                           [SubscriptionController::class, 'getActiveSubscriptions'])->name('admin.subscriptions.active'); // AJAX: Get active subscriptions
        Route::get('/history',                          [SubscriptionController::class, 'getHistorySubscriptions'])->name('admin.subscriptions.history'); // AJAX: Get history subscriptions
        Route::post('/toggle-paid',                     [SubscriptionController::class, 'togglePaidStatus'])->name('admin.subscriptions.toggle.paid'); // Toggle paid status
        Route::post('/toggle-active',                   [SubscriptionController::class, 'toggleActiveStatus'])->name('admin.subscriptions.toggle.active'); // Toggle active status
    });
    
    Route::prefix('admin/projects')->group(function () {
        Route::get('/',                                  [ProjectController::class,            'index']                 )->name('admin.projects.index');
        Route::get('/create',                           [ProjectController::class,            'create']                )->name('admin.projects.create');
        Route::post('/',                                [ProjectController::class,            'store']                 )->name('admin.projects.store');
        Route::get('/{id}/edit',                        [ProjectController::class,            'edit']                  )->name('admin.projects.edit');
        Route::post('/{id}',                            [ProjectController::class,            'update']                )->name('admin.projects.update');
        Route::post('/toggle-active-status',            [ProjectController::class,            'toggleActiveStatus']    )->name('admin.projects.toggle-active-status');
        Route::post('/toggle-status',                   [ProjectController::class,            'toggleStatus']          )->name('admin.projects.toggle-status');
        Route::post('/{id}/delete',                     [ProjectController::class,            'destroy']               )->name('admin.projects.destroy');
    });
});
require __DIR__.'/auth.php';
require __DIR__.'/company.php';

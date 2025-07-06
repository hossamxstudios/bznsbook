<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AuthClient\RegisteredUserController as clientRegister;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Middleware\UpdateLastSeen;

// Apply UpdateLastSeen middleware to all routes to track user activity
Route::middleware([UpdateLastSeen::class])->group(function() {

    Route::get('/client/register'                                , [clientRegister::class,                 'create'])->name('client.register');
    Route::post('/client/register'                               , [clientRegister::class,                  'store']);
    // Pages
    Route::get('/'                                               , [PageController::class ,              'homePage'])->name('pages.home');
    Route::get('/about'                                          , [PageController::class ,             'aboutPage'])->name('pages.about');
    Route::get('/contact'                                        , [PageController::class ,           'contactPage'])->name('pages.contact');
    Route::get('/pricing'                                        , [PageController::class ,           'selectPlan'])->name('pages.pricing');
    Route::get('/companies'                                      , [PageController::class ,         'companiesPage'])->name('pages.companies');
    Route::get('/companies/{id}'                                 , [PageController::class ,       'companiesSingle'])->name('pages.companies.single');
    Route::get('/library/business-guide'                         , [PageController::class ,  'libraryBusinessGuide'])->name('pages.library.business-guide');
    Route::get('/library/shipping-guide'                         , [PageController::class ,  'libraryShippingGuide'])->name('pages.library.shipping-guide');
    Route::get('/library/middle-east'                            , [PageController::class ,'libraryMiddleEastGuide'])->name('pages.library.middle-east');
    Route::get('/select-plan'                                    , [PageController::class , 'selectPlan'])->name('web.select-plan');

    Route::get('/client/{client}'                                , [ClientController::class,           'publicView'])->name('client.profile.show');
    // client register
    // lead form
    Route::get ('/lead-form'                                     , [PageController::class,               'leadForm'])->name('admin.leadForm');
    Route::post('/lead-form/apply'                               , [PageController::class,          'applyLeadForm'])->name('admin.leadForm.apply');
    // login and register
    Route::get('/login'                                          , [AuthenticatedSessionController::class ,'create'])->name('admin.login');
    Route::post('/login'                                         , [AuthenticatedSessionController::class , 'store']);
    Route::get('/admin/register'                                 , [RegisteredUserController::class,       'create'])->name('admin.register');
    Route::post('/admin/register'                                , [RegisteredUserController::class,        'store']);
    // Auth forgot password
    Route::get('forgot-password'                                 , [PasswordResetLinkController::class,    'create'])->name('password.request');
    Route::post('forgot-password'                                , [PasswordResetLinkController::class,     'store'])->name('password.email');
    Route::get('reset-password/{token}'                          , [NewPasswordController::class,          'create'])->name('password.reset');
    Route::post('reset-password'                                 , [NewPasswordController::class,           'store'])->name('password.store');

    // Client routes
    Route::middleware('auth:client')->group(function ()      {
        Route::get('/profile'                                    , [ClientController::class,              'profile'])->name('client');
        Route::get('/profile/projects'                           , [ClientController::class,             'projects'])->name('client.projects');
        Route::get('/profile/portfolio'                          , [ClientController::class,            'portfolio'])->name('client.portfolio');
        // Client profile update routes
        Route::put('/profile/update'                             , [ClientController::class,        'updateProfile'])->name('client.profile.update');
        Route::put('/profile/address/update'                     , [ClientController::class,        'updateAddress'])->name('client.address.update');
        Route::put('/profile/social/update'                      , [ClientController::class,         'updateSocial'])->name('client.social.update');
        Route::put('/profile/password/update'                    , [ClientController::class,       'updatePassword'])->name('client.password.update');
        Route::post('/profile/picture/update'                    , [ClientController::class, 'updateProfilePicture'])->name('client.picture.update');
        Route::post('/profile/company/update'                    , [ClientController::class,    'updateCompanyInfo'])->name('client.profile.company.update');
        Route::delete('/profile/company/document/{media}'        , [ClientController::class,'deleteCompanyDocument'])->name('client.profile.company.document.delete');
        Route::delete('/profile/delete'                          , [ClientController::class,        'deleteAccount'])->name('client.account.delete');
        // Portfolio CRUD routes
        Route::post('/profile/portfolio/store'                   , [PortfolioController::class,             'store'])->name('client.portfolio.store');
        Route::put('/profile/portfolio/{id}'                     , [PortfolioController::class,            'update'])->name('client.portfolio.update');
        Route::get('/profile/portfolio/{id}'                     , [PortfolioController::class,              'show'])->name('client.portfolio.show');
        Route::get('/profile/portfolio/{id}/services'            , [PortfolioController::class,       'getServices'])->name('client.portfolio.services');
        Route::delete('/profile/portfolio/{id}'                  , [PortfolioController::class,           'destroy'])->name('client.portfolio.delete');
        // Services CRUD routes
        Route::get('/profile/services'                           , [ServiceController::class,               'index'])->name('client.services');
        Route::post('/profile/services/store'                    , [ServiceController::class,               'store'])->name('client.services.store');
        Route::post('/profile/services/update'                   , [ServiceController::class,              'update'])->name('client.services.update');
        Route::delete('/profile/services/delete'                 , [ServiceController::class,             'destroy'])->name('client.services.delete');
        Route::get('/profile/services/{id}'                      , [ServiceController::class,                'show'])->name('client.services.show');
        // Service Requests (Demands)
        Route::get('/services/requested'                         , [DemandController::class,      'requestedServices'])->name('client.services.requested');
        Route::get('/services/requests'                          , [DemandController::class,       'serviceRequests'])->name('client.services.requests');
        Route::get('/services/demand/{id}'                       , [DemandController::class,                  'show'])->name('client.services.demand.show');
        Route::post('/services/demand/{id}/accept'               , [DemandController::class,                'accept'])->name('client.services.demand.accept');
        Route::post('/services/demand/{id}/reject'               , [DemandController::class,                'reject'])->name('client.services.demand.reject');
        Route::post('/services/demand/{id}/complete'             , [DemandController::class,              'complete'])->name('client.services.demand.complete');
        Route::post('/services/demand/{id}/upload-proposal'      , [DemandController::class, 'uploadProposal'])->name('client.services.demand.upload_proposal');
        Route::post('/services/demand/{id}/cancel'               , [DemandController::class,                'cancel'])->name('client.services.demand.cancel');
        Route::post('/services/demand/{id}/review'               , [DemandController::class,              'storeReview'])->name('client.services.review');
        Route::post('/services/{service}/apply', [DemandController::class, 'apply'])->name('client.services.apply');
        // Project seat applications
        Route::post('/projects/{project}/apply', [SeatController::class, 'apply'])->name('projects.apply');
        Route::post('/seats/{seat}/upload-proposal', [SeatController::class, 'uploadProposal'])->name('seats.upload_proposal');
        Route::post('/seats/{seat}/mark-contacted', [SeatController::class, 'markContacted'])->name('seats.mark_contacted');

        Route::get('/profile/material'                           , [ClientController::class,             'material'])->name('client.material');
        Route::get('/profile/subscription'                       , [ClientController::class,         'subscription'])->name('client.subscription');
        Route::get('/profile/company'                            , [ClientController::class,          'companyInfo'])->name('client.company');
        // Projects
        Route::prefix('projects')->name('projects.')->group(function () {
            Route::get('/', [ProjectController::class, 'index'])->name('index');
            Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('show');
        });
        // Client routes
        Route::prefix('client/projects')->name('client.projects.')->group(function () {
            Route::get('/all'                                    , [ProjectController::class,         'myProjects'])->name('index');
            Route::get('/applications'                           , [ProjectController::class,     'myApplications'])->name('applications');
            Route::get('/create'                                 , [ProjectController::class,             'create'])->name('create');
            Route::post('/store'                                 , [ProjectController::class,              'store'])->name('store');
            Route::get('/{project}'                              , [ProjectController::class,               'show'])->name('show');
            Route::get('/{project}/edit'                         , [ProjectController::class,               'edit'])->name('edit');
            Route::put('/{project}'                              , [ProjectController::class,             'update'])->name('update');
            Route::patch('/{project}/status'                     , [ProjectController::class,       'updateStatus'])->name('update-status');
            Route::post('/{project}/winner/{seat}'               , [ProjectController::class,       'selectWinner'])->name('select-winner');
            Route::delete('/delete/{project}'                    , [ProjectController::class,            'destroy'])->name('delete');
            // Batch management within projects
            Route::post('/{project}/batches'                     , [BatchController::class,                'store'])->name('batches.store');
            Route::post('/{project}/batches/request'             , [BatchController::class,              'request'])->name('batches.request');
            // Seat/application management
            Route::post('/{project}/apply'                       , [SeatController::class,                 'apply'])->name('apply');
        });
        // Seat management routes
        Route::post('/seats/{seat}/upload-proposal'              , [SeatController::class,        'uploadProposal'])->name('client.seats.upload_proposal');
        Route::post('/seats/{seat}/mark-contacted'               , [SeatController::class,         'markContacted'])->name('client.seats.mark_contacted');
        // Subscription routes
        Route::post('/subscribe/plan'                            , [ClientController::class,       'subscribePlan'])->name('client.subscribe.plan');
        // Client logout route
        Route::post('/logout'                                    , [ClientController::class,              'logout'])->name('client.logout');
    });
});

require __DIR__.'/auth.php';
// require __DIR__.'/company.php';
require __DIR__.'/admin.php';
require __DIR__.'/web_project_routes.php';

// Server maintenance routes with secure token protection
// Usage: /artisan/optimize-clear?token=your_secure_token
// Usage: /artisan/storage-link?token=your_secure_token
Route::get('/artisan/optimize-clear', function () {
    // Run the command
    try {
        Artisan::call('optimize:clear');
        return 'Optimization cache cleared successfully. <br><pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/artisan/storage-link', function () {
    // Run the command
    try {
        Artisan::call('storage:link');
        return 'Storage link created successfully. <br><pre>' . Artisan::output() . '</pre>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

Route::get('/artisan/fix-permissions', function () {
    // Run the commands
    $output = '';
    try {
        // Change directory permissions to 755
        $dirCommand = 'find ' . base_path() . ' -type d -exec chmod 755 {} \;';
        shell_exec($dirCommand);
        $output .= "Directory permissions set to 755.<br>";

        // Change file permissions to 644
        $fileCommand = 'find ' . base_path() . ' -type f -exec chmod 644 {} \;';
        shell_exec($fileCommand);
        $output .= "File permissions set to 644.<br>";

        return 'Permissions updated successfully.<br><pre>' . $output . '</pre>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});

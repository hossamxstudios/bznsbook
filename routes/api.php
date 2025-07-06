<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRMControllers\CompanyController;
use App\Http\Controllers\CRMControllers\ContactController;
use App\Http\Controllers\CRMControllers\DealController;
use App\Http\Controllers\CRMControllers\PipelineController;
use App\Http\Controllers\CRMControllers\StageController;
use App\Http\Controllers\CRMControllers\LeadController;



Route::middleware('auth:user')->group(function () {});

// Route::prefix('companies')->group(function () {
//     Route::get('/',                                 [CompanyController::class,          'index'])->name('companies.index'); // List all companies
//     Route::get('/trashed',                          [CompanyController::class,          'trashed'])->name('companies.trashed'); // List soft-deleted companies
//     Route::get('/{id}',                             [CompanyController::class,          'show'])->name('companies.show'); // Show a single company
//     Route::post('/',                                [CompanyController::class,          'store'])->name('companies.store'); // Create a new company
//     Route::post('/update/{id}',                     [CompanyController::class,          'update'])->name('companies.update'); // Update an existing company
//     Route::post('/delete/{id}',                     [CompanyController::class,          'destroy'])->name('companies.destroy'); // Delete a company
//     Route::post('/restore/{id}',                    [CompanyController::class,          'restore'])->name('companies.restore'); // Restore a soft-deleted company
//     Route::get('/search',                           [CompanyController::class,          'search'])->name('companies.search'); // Search companies
// });

// Route::prefix('contacts')->group(function () {
//     Route::get('/',                                 [ContactController::class,          'index'])->name('contacts.index'); // List all contacts
//     Route::get('/trashed',                          [ContactController::class,          'trashed'])->name('contacts.trashed'); // List soft-deleted contacts
//     Route::get('/{id}',                             [ContactController::class,          'show'])->name('contacts.show'); // Show a single contact
//     Route::post('/',                                [ContactController::class,          'store'])->name('contacts.store'); // Create a new contact
//     Route::post('/update/{id}',                     [ContactController::class,          'update'])->name('contacts.update'); // Update an existing contact
//     Route::post('/delete/{id}',                     [ContactController::class,          'destroy'])->name('contacts.destroy'); // Soft-delete a contact
//     Route::post('/restore/{id}',                    [ContactController::class,          'restore'])->name('contacts.restore'); // Restore a soft-deleted contact
// });

// Route::prefix('leads')->group(function () {
//     Route::get('/',                                 [LeadController::class,             'index'])->name('leads.index'); // List all leads
//     Route::get('/{id}',                             [LeadController::class,             'show'])->name('leads.show'); // Show a single lead
//     Route::post('/',                                [LeadController::class,             'store'])->name('leads.store'); // Create a new lead
//     Route::post('/update/{id}',                     [LeadController::class,             'update'])->name('leads.update'); // Update an existing lead
//     Route::post('/delete/{id}',                     [LeadController::class,             'destroy'])->name('leads.destroy'); // Delete a lead
// });

// Route::prefix('deals')->group(function () {
//     Route::get('/',                                 [DealController::class,             'index'])->name('deals.index'); // List all deals
//     Route::get('/trashed',                          [DealController::class,             'trashed'])->name('deals.trashed'); // List soft-deleted deals
//     Route::get('/{id}',                             [DealController::class,             'show'])->name('deals.show'); // Show a single deal
//     Route::post('/',                                [DealController::class,             'store'])->name('deals.store'); // Create a new deal
//     Route::post('/update/{id}',                     [DealController::class,             'update'])->name('deals.update'); // Update an existing deal
//     Route::post('/delete/{id}',                     [DealController::class,             'destroy'])->name('deals.destroy'); // Soft-delete a deal
//     Route::post('/restore/{id}',                    [DealController::class,             'restore'])->name('deals.restore'); // Restore a soft-deleted deal
// });

// Route::prefix('pipelines')->group(function () {
//     Route::get('/',                                 [PipelineController::class,         'index'])->name('pipelines.index'); // List all pipelines
//     Route::get('/{id}',                             [PipelineController::class,         'show'])->name('pipelines.show'); // Show a single pipeline
//     Route::post('/',                                [PipelineController::class,         'store'])->name('pipelines.store'); // Create a new pipeline
//     Route::post('/update/{id}',                     [PipelineController::class,         'update'])->name('pipelines.update'); // Update an existing pipeline
//     Route::post('/delete/{id}',                     [PipelineController::class,         'destroy'])->name('pipelines.destroy'); // Delete a pipeline
// });

// Route::prefix('stages')->group(function () {
//     Route::get('/',                                 [StageController::class,            'index'])->name('stages.index'); // List all stages
//     Route::get('/{id}',                             [StageController::class,            'show'])->name('stages.show'); // Show a single stage
//     Route::post('/',                                [StageController::class,            'store'])->name('stages.store'); // Create a new stage
//     Route::post('/update/{id}',                     [StageController::class,            'update'])->name('stages.update'); // Update an existing stage
//     Route::post('/delete/{id}',                     [StageController::class,            'destroy'])->name('stages.destroy'); // Delete a stage
// });

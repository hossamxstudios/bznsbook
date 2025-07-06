<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\SeatController;
use Illuminate\Support\Facades\Route;

// Public project routes
// Route::prefix('projects')->name('projects.')->group(function () {
//     Route::get('/', [ProjectController::class, 'index'])->name('index');
//     Route::get('/{project:slug}', [ProjectController::class, 'show'])->name('show');
// });

// Client project routes (authenticated)
Route::middleware(['auth:client'])->prefix('client')->name('client.')->group(function () {
    // Project management
    // Route::prefix('projects')->name('projects.')->group(function () {
    //     Route::get('/', [ProjectController::class, 'myProjects'])->name('index');
    //     Route::get('/applications', [ProjectController::class, 'myApplications'])->name('applications');
    //     Route::get('/create', [ProjectController::class, 'create'])->name('create');
    //     Route::post('/', [ProjectController::class, 'store'])->name('store');
    //     Route::get('/{project}', [ProjectController::class, 'show'])->name('show');
    //     Route::get('/{project}/edit', [ProjectController::class, 'edit'])->name('edit');
    //     Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
    //     Route::delete('/{project}', [ProjectController::class, 'destroy'])->name('delete');
    //     Route::patch('/{project}/status', [ProjectController::class, 'updateStatus'])->name('update-status');
    //     Route::post('/{project}/winner/{seat}', [ProjectController::class, 'selectWinner'])->name('select-winner');

    //     // Batch management within projects
    //     Route::post('/{project}/batches', [BatchController::class, 'store'])->name('batches.store');
    //     Route::post('/{project}/batches/request', [BatchController::class, 'request'])->name('batches.request');

    //     // Seat/application management
    //     Route::post('/{project}/apply', [SeatController::class, 'apply'])->name('apply');
    // });

    // Batch management
    Route::prefix('batches')->name('batches.')->group(function () {
        Route::put('/{batch}', [BatchController::class, 'update'])->name('update');
        Route::post('/{batch}/approve', [BatchController::class, 'approve'])->name('approve');
    });

    // Seat management
    Route::prefix('seats')->name('seats.')->group(function () {
        Route::patch('/{seat}/status', [SeatController::class, 'updateStatus'])->name('update-status');
        Route::delete('/{seat}/cancel', [SeatController::class, 'cancel'])->name('cancel');
    });
});

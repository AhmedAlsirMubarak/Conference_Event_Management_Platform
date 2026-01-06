<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\ExhibitorController;
use App\Http\Controllers\NotificationController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\StrategicCommitteeController;
use App\Http\Controllers\TechnicalCommitteeController;
use App\Http\Controllers\StrategicSpeakerController;
use App\Http\Controllers\TechnicalSpeakerController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ClimateLeadersController;

// Language Switcher - Switch language and persist to session/cookie
Route::get('/lang/{locale}', function($locale) {
    // Validate and set locale
    if(in_array($locale, ['ar', 'en'])) {
        // Store in session
        session(['locale' => $locale]);
        
        // Set app locale immediately 
        app()->setLocale($locale);
        
        // Redirect with cookie attached
        $response = redirect()->back();
        $response->cookie('locale', $locale, 60 * 24 * 365);
        
        return $response;
    }
    
    return redirect()->back();
})->name('lang.switch');



// Home 100 climate leaders  Route
Route::get('/100climateleaders', function () {
    return view('100climateleaders');
})->name('100climateleaders');

// Public Climate Leaders Nomination Form
Route::post('/climate-leaders', [ClimateLeadersController::class, 'store'])->name('climate-leaders.store');

// Home  Route
Route::get('/home', function () {
    return view('Home');
})->name('home');

Route::get('/', function () {
    return view('Home');
});

Route::fallback(fn() => view('404'))->name('404');
    
Route::post('/login', [AuthController::class, 'login'])
    ->name('login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');
Route::get('/login', [AuthController::class, 'getLoginPage'])
    ->name('login.page');

Route::post('/contacts', [ContactController::class, 'create'])->name('create');



// Admin Routes
Route::group(['middleware' => ['auth', IsAdmin::class]], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/search', [DashboardController::class, 'globalSearch'])->name('admin.search');
    
    Route::get('/contacts', [ContactController::class, 'getAllContacts'])->name('getAllContacts');
    Route::get('/contacts/search', [ContactController::class, 'search'])->name('searchContacts');
    Route::get('/contacts/export/excel', [ContactController::class, 'exportExcel'])->name('exportExcel');
    Route::get('/contacts/{id}', [ContactController::class, 'getcontactById'])->name('getcontactById');
    Route::post('/contacts/{id}/notes', [ContactController::class, 'updateAdminNotes'])->name('updateAdminNotes');
    Route::delete('/contacts/{id}', [ContactController::class, 'delete'])->name('deleteContact');
    Route::get('/sponsors/search', [SponsorController::class, 'search'])->name('sponsors.search');
    Route::resource('sponsors', SponsorController::class);
    Route::get('/exhibitors/search', [ExhibitorController::class, 'search'])->name('exhibitors.search');
    Route::resource('exhibitors', ExhibitorController::class);

    // Export Routes (Admin) - Must come BEFORE resource routes
    Route::get('/strategic_speakers/export', [StrategicSpeakerController::class, 'export'])->name('strategic_speakers.export');
    Route::get('/technical_speakers/export', [TechnicalSpeakerController::class, 'export'])->name('technical_speakers.export');
    Route::get('/strategic_committees/export', [StrategicCommitteeController::class, 'export'])->name('strategic_committees.export');
    Route::get('/technical_committees/export', [TechnicalCommitteeController::class, 'export'])->name('technical_committees.export');

    Route::resource('strategic_committees', StrategicCommitteeController::class);
    Route::resource('technical_committees', TechnicalCommitteeController::class);
    Route::resource('strategic_speakers', StrategicSpeakerController::class);
    Route::resource('technical_speakers', TechnicalSpeakerController::class);

    // Climate Leaders Routes
    Route::get('/climate-leaders/search', [ClimateLeadersController::class, 'search'])->name('climateLeaders.search');
    Route::get('/climate-leaders/export', [ClimateLeadersController::class, 'exportExcel'])->name('climateLeaders.export');
    Route::post('/climate-leaders/{id}/notes', [ClimateLeadersController::class, 'updateAdminNotes'])->name('climate-leaders.notes');
    Route::resource('climate-leaders', ClimateLeadersController::class, ['except' => ['store']]);

    // Session Management Routes
    Route::get('/sessions', [SessionController::class, 'adminSessions'])->name('sessions.index');
    Route::get('/sessions/my-sessions', [SessionController::class, 'mySessions'])->name('sessions.my');
    Route::delete('/sessions/{session}/terminate', [SessionController::class, 'terminateSession'])->name('sessions.terminate');
    Route::post('/sessions/terminate-others', [SessionController::class, 'terminateOtherSessions'])->name('sessions.terminateOthers');
    Route::get('/sessions/{session}', [SessionController::class, 'show'])->name('sessions.show');
    Route::get('/sessions/activity/{userId?}', [SessionController::class, 'activityHistory'])->name('sessions.activity');
    Route::get('/sessions-suspicious', [SessionController::class, 'suspiciousSessions'])->name('sessions.suspicious');
    Route::get('/sessions/export/logs', [SessionController::class, 'exportLogs'])->name('sessions.export');
    Route::post('/sessions/clear-old', [SessionController::class, 'clearOldSessions'])->name('sessions.clearOld');
    
    // Admin Notification Routes
    Route::get('/notifications', [NotificationController::class, 'adminIndex'])->name('admin.notifications.index');
    Route::get('/api/notifications', [NotificationController::class, 'getAll'])->name('admin.notifications.all');
    Route::post('/api/notifications/mark-all-read', [NotificationController::class, 'markAllAsReadAdmin'])->name('admin.notifications.markAllRead');
    Route::delete('/api/notifications/{id}', [NotificationController::class, 'delete'])->name('admin.notifications.delete');
});

// User Routes
Route::group(['middleware' => 'auth', 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/search', [UserController::class, 'globalSearch'])->name('search');
    
    // Contacts routes - search BEFORE show to avoid {id} conflict
    Route::get('/contacts', [UserController::class, 'indexContacts'])->name('contacts.index');
    Route::get('/contacts/search', [UserController::class, 'searchContacts'])->name('contacts.search');
    Route::get('/contacts/{id}', [UserController::class, 'showContact'])->name('contacts.show');
    Route::post('/contacts/{id}/notes', [UserController::class, 'updateNotes'])->name('contacts.updateNotes');
    
    // Sponsors routes - search BEFORE show to avoid {id} conflict
    Route::get('/sponsors', [UserController::class, 'indexSponsors'])->name('sponsors.index');
    Route::get('/sponsors/search', [UserController::class, 'searchSponsors'])->name('sponsors.search');
    Route::get('/sponsors/{id}', [UserController::class, 'showSponsor'])->name('sponsors.show');
    
    // Exhibitors routes - search BEFORE show to avoid {id} conflict
    Route::get('/exhibitors', [UserController::class, 'indexExhibitors'])->name('exhibitors.index');
    Route::get('/exhibitors/search', [UserController::class, 'searchExhibitors'])->name('exhibitors.search');
    Route::get('/exhibitors/{id}', [UserController::class, 'showExhibitor'])->name('exhibitors.show');
    
    Route::get('/export', [UserController::class, 'exportContacts'])->name('export');
    Route::get(uri: '/technical-committees', action: [UserController::class, 'listTechnicalCommittees'])->name(name: 'technical_committees.index');
    Route::get(uri: '/technical-committees/{id}', action: [UserController::class, 'showTechnicalCommittee'])->name(name: 'technical_committees.show');
    Route::get(uri: '/strategic-committees', action: [UserController::class, 'listStrategicCommittees'])->name(name: 'strategic_committees.index');
    Route::get(uri: '/strategic-committees/{id}', action: [UserController::class, 'showStrategicCommittee'])->name(name: 'strategic_committees.show');
    Route::get(uri: '/strategic-speakers', action: [UserController::class, 'listStrategicSpeakers'])->name(name: 'strategic_speakers.index');
    Route::get(uri: '/strategic-speakers/{id}', action: [UserController::class, 'showStrategicSpeaker'])->name(name: 'strategic_speakers.show');
    Route::get(uri: '/technical-speakers', action: [UserController::class, 'listTechnicalSpeakers'])->name(name: 'technical_speakers.index');
    Route::get(uri: '/technical-speakers/{id}', action: [UserController::class, 'showTechnicalSpeaker'])->name(name: 'technical_speakers.show');

    // Climate Leaders Routes (User)
    Route::get('/climate-leaders', [ClimateLeadersController::class, 'userIndex'])->name('climate-leaders.index');
    Route::get('/climate-leaders/{id}', [ClimateLeadersController::class, 'userShow'])->name('climate-leaders.show');
    Route::post('/climate-leaders/{id}/notes', [ClimateLeadersController::class, 'updateAdminNotes'])->name('climate-leaders.notes');
    Route::get('/climate-leaders/export/csv', [ClimateLeadersController::class, 'exportExcel'])->name('climate-leaders.export');

    // Export Routes (User)
    Route::get('/export/strategic-speakers', [UserController::class, 'exportStrategicSpeakers'])->name('strategic_speakers.export');
    Route::get('/export/technical-speakers', [UserController::class, 'exportTechnicalSpeakers'])->name('technical_speakers.export');
    Route::get('/export/strategic-committees', [UserController::class, 'exportStrategicCommittees'])->name('strategic_committees.export');
    Route::get('/export/technical-committees', [UserController::class, 'exportTechnicalCommittees'])->name('technical_committees.export');
    
    // User Notification Routes
    Route::get('/notifications', [NotificationController::class, 'userIndex'])->name('notifications.index');
    Route::get('/api/notifications', [NotificationController::class, 'getAll'])->name('notifications.all');
    Route::get('/api/notifications/unread', [NotificationController::class, 'getUnread'])->name('notifications.unread');
    Route::post('/api/notifications/mark-all-read', [NotificationController::class, 'markAllAsReadUser'])->name('notifications.markAllRead');
    Route::delete('/api/notifications/{id}', [NotificationController::class, 'delete'])->name('notifications.delete');
});
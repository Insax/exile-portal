<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\ManagePortalController;
use App\Http\Controllers\PoptabsOverviewController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TerritoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserSettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::view('dashboard', 'dashboard')
	->name('dashboard')
	->middleware(['auth', 'verified', 'twoFactor']);

Route::prefix('portal')->middleware(['auth', 'verified', 'twoFactor', 'can: portal.manage'])->controller(ManagePortalController::class)->group(function () {
    Route::get('/', 'home')->name('portal.home');
});

Route::prefix('settings')->middleware(['auth', 'verified'])->controller(UserSettingsController::class)->group(function () {
    Route::get('/', 'home')->name('settings.home');
});

Route::prefix('accounts')->middleware(['auth', 'verified', 'twoFactor'])->controller(AccountController::class)->group(function () {
    Route::get('/', 'home')->name('account.home');
    Route::get('/view/{account}', 'viewAccount')->name('account.view');
});

Route::prefix('territories')->middleware(['auth', 'verified', 'twoFactor'])->controller(TerritoryController::class)->group(function () {
    Route::get('/', 'listTerritories')->name('territory.list');
    Route::get('/view/{territory}', 'viewTerritory')->name('territory.view');
});

Route::prefix('clans')->middleware(['auth', 'verified', 'twoFactor'])->controller(ClanController::class)->group(function () {
    Route::get('/', 'listClans')->name('clan.list');
    Route::get('/view/{clan}', 'viewClan')->name('clan.view');
});

Route::prefix('users')->middleware(['auth', 'verified', 'twoFactor', 'can:users.manage'])->controller(UserController::class)->group(function () {
    Route::get('/manage', 'manageUsers')->name('users.manage');
});

Route::prefix('poptabs')->middleware(['auth', 'verified', 'twoFactor'])->controller(PoptabsOverviewController::class)->group(function () {
    Route::get('/', 'listPoptabs')->name('poptabs.list');
});

Route::prefix('logs')->middleware(['auth', 'verified', 'twoFactor'])->controller(LogsController::class)->group(function () {
    Route::get('/', 'listLogs')->name('logs.list');
});

Route::prefix('roles')->middleware(['auth', 'verified', 'twoFactor'])->controller(RoleController::class)->group(function () {
    Route::get('/', 'listRoles')->name('roles.list');
});

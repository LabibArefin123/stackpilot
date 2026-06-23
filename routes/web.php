<?php

use App\Http\Controllers\WelcomePageController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SystemUserController;
use App\Http\Controllers\BanUserController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SystemProblemController;
use App\Http\Controllers\Auth\LoginController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
//Welcome Section
Route::get('/', [WelcomePageController::class, 'index'])->name('welcome');
//Contact Section
Route::get('/contact', [WelcomePageController::class, 'contact'])->name('contact');

Route::post('/system-problem/store', [WelcomePageController::class, 'system_problem_store'])->name('system_problem.store');
Route::post('/contact/store', [WelcomePageController::class, 'contactStore'])->name('contact.store');
Route::get('/user_profile', function () {
    return view('user_profile');
})->middleware(['auth', 'verified'])->name('profile');

//Route::group(['middleware' => ['auth', 'permission']], function () {
Route::group(['middleware' => 'auth'], function () {

    // Profile Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/system_dashboard', [DashboardController::class, 'system_index'])->name('dashboard.system');
    Route::get('/global-search', [DashboardController::class, 'globalSearch'])->name('global.search');
    Route::get('/search/result', [DashboardController::class, 'searchResult'])->name('search.result');


    //Profile Section
    Route::get('/user_profile', [ProfileController::class, 'user_profile_show'])->name('user_profile_show');
    Route::get('/user_profile_edit', [ProfileController::class, 'user_profile_edit'])->name('user_profile_edit');
    Route::put('/user_profile_update', [ProfileController::class, 'user_profile_update'])->name('user_profile_update');

    //Setting Management
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::post('/permissions/delete-selected', [PermissionController::class, 'deleteSelected'])->name('permissions.deleteSelected');
    Route::resource('system_users', SystemUserController::class);
    Route::resource('ban_users', BanUserController::class);
    Route::resource('system_problems', SystemProblemController::class);
    Route::resource('contact_requests', ContactRequestController::class);
    Route::post('/system-users/{user}/change-password', [SystemUserController::class, 'updatePassword'])->name('system_users.password.update');
    
    //Setting Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::get('/settings/password_policy', [SettingController::class, 'password_policy'])->name('settings.password_policy');
    Route::get('/settings/2fa', [SettingController::class, 'show2FA'])->name('settings.2fa');
    Route::post('/settings/toggle-2fa', [SettingController::class, 'toggle2FA'])->name('settings.toggle2fa');
    Route::get('/settings/2fa/resend', [SettingController::class, 'resend'])->name('settings.2fa.resend');
    Route::post('/settings/2fa/verify', [SettingController::class, 'verify'])->name('settings.2fa.verify');
    Route::get('/settings/timeout', [SettingController::class, 'showTimeout'])->name('settings.timeout');
    Route::post('/settings/timeout', [SettingController::class, 'updateTimeout'])->name('settings.timeout.update');
    Route::get('/settings/database-backup', [SettingController::class, 'databaseBackup'])->name('settings.database.backup');
    Route::post('/settings/database-backup/download', [SettingController::class, 'downloadDatabase'])->name('settings.database.backup.download');
    Route::get('/settings/logs', [SettingController::class, 'logs'])->name('settings.logs');
    Route::post('/settings/logs/clear', [SettingController::class, 'clearLogs'])->name('settings.clearLogs');
    Route::get('/settings/maintenance', [SettingController::class, 'maintenance'])->name('settings.maintenance');
    Route::post('/settings/maintenance', [SettingController::class, 'maintenanceUpdate'])->name('settings.maintenance.update');
    Route::get('/settings/language', [SettingController::class, 'language'])->name('settings.language');
    Route::post('/settings/language/update', [SettingController::class, 'updateLanguage'])->name('settings.language.update');
    Route::get('/settings/datetime', [SettingController::class, 'dateTime'])->name('settings.datetime');
    Route::post('/settings/datetime/update', [SettingController::class, 'updateDateTime'])->name('settings.datetime.update');
    Route::get('/settings/theme', [SettingController::class, 'theme'])->name('settings.theme');
    Route::post('/settings/theme/update', [SettingController::class, 'updateTheme'])->name('settings.theme.update');
});

require __DIR__ . '/auth.php';
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/');
})->name('logout');